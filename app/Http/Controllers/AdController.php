<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\AdRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::all();
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
        $ad = Ad::create($req);
        return redirect(route('ads.show', $ad->id));
    }

    public function edit(string $id)
    {
        $ad = Ad::find($id);

        // accès à la page d'édit seulement si l'annonce appartient au user connecté
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
        $req = $request->all();

        //conversion de la checkbox en boolean
        $req['open_to_discussion'] = $request->has('open_to_discussion');

        $ad->update($req);
        return redirect(route('ads.index'));
    }

    public function destroy(string $id)
    {
        $ad = Ad::find($id);

        // possibilité de delete seulement si l'annonce appartient au user connecté
        $this->authorize('delete', $ad);

        $ad->delete();
        return redirect(route('ads.index'));
    }
    
}
