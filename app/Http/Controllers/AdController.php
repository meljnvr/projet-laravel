<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\AdImage;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('sort') && $request->sort == 'price') {
            $ads = Ad::orderBy('price')->get();
        } else {
            $ads = Ad::all();
        }
        return view('ads.index', ['ads' => $ads]);
        
    }
    
    public function show(string $id)
    {
        $ad = Ad::find($id);
        return view('ads.show', ['ad' => $ad]);
    }
    public function create()
    {
        $users = User::all();
        return view('ads.create', ['users' => $users]);
    }

    public function store(AdRequest $request)
    {
        $req = $request->all();
        $req['author_id'] = Auth::user()->id;
        //conversion de la checkbox en boolean
        $req['open_to_discussion'] = $request->has('open_to_discussion');
        
        $ad = Ad::create($req);if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('uploads','public');
                AdImage::create([
                    'ad_id' => $ad->id,
                    'file_path' => $imagePath,
                ]);
            }
        }
        return redirect(route('ads.show', $ad->id));
    }

    public function edit(string $id)
    {
        $ad = Ad::find($id);

        // accès à la page d'édit seulement si l'annonce appartient au user connecté ou admin
        $this->authorize('update', $ad);

        $users = User::all();
        return view('ads.edit', ['ad' => $ad, 'users' => $users]);
    }

    public function update(AdRequest $request, string $id)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:64'],
            'description' => 'required',
            'category' => 'required',
            'price' => 'required',
            'place' => 'required',
            'state' => 'required',
            'delivery' => 'required',
            'open_to_discussion' => 'filled',
        ]);

        $ad = Ad::find($id);

        // maj des images
        if ($request->has('update_images')) {
            foreach ($request->file('update_images') as $imageId => $imageData) {
                $image = AdImage::find($imageId);
                if (isset($imageData["'img_update'" ]) ) {
                    $file = $imageData["'img_update'" ];
                    $path = $file->store('uploads','public');
                    Storage::delete($image->file_path); // Supprimer l'ancienne image
                    $image->update(['file_path' => $path]);
                }
            }
        }
        

        // suppr des images
        if ($request->has('delete_images')) {
            foreach ($request->input('delete_images') as $imageId => $value) {
                $image = AdImage::find($imageId);
                Storage::delete($image->file_path); 
                $image->delete();
            }
        }

        // ajout images
        if ($request->hasFile('new_images')) {
            foreach ($request->file('new_images') as $file) {
                $path = $file->store('uploads','public');
                AdImage::create(['ad_id' => $ad->id, 'file_path' => $path]);
            }
        }


        $req = $request->all();

        //conversion de la checkbox en boolean
        $req['open_to_discussion'] = $request->has('open_to_discussion');

        $ad->update($req);
        return redirect(route('ads.show', $ad->id));
    }

    public function destroy(string $id)
    {
        $ad = Ad::find($id);

        // possibilité de delete seulement si l'annonce appartient au user connecté ou admin
        $this->authorize('delete', $ad);

        foreach ($ad->images as $image) {
        Storage::disk('public')->delete($image->img_url);
        $image->delete();
    }

        $ad->delete();
        return redirect(route('ads.index'));
    }
    
}
