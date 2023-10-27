<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        // trie les annonces
        if ($request->has('sort') && $request->sort == 'increasing') {
            $ads = Ad::orderBy('price')->get();
        } else if ($request->has('sort') && $request->sort == 'decreasing') {
            $ads = Ad::orderBy('price', 'desc')->get();
        }else {
            $ads = Ad::all();
        }
        return view('public.index', ['ads' => $ads]);
    }

    public function show(string $id)
    {
        $ad = Ad::find($id);
        return view('public.show', ['ad' => $ad]);
    }
}
