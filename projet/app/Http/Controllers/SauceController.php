<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SauceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sauces = Sauce::all();
        return view('sauces.index', compact('sauces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sauces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You need to be logged in to add a sauce.');
        }

        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'description' => 'required|string',
            'mainPepper' => 'required|string|max:255',
            'imageUrl' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'heat' => 'required|integer|min:1|max:10',
        ]);

        // Gestion de l'upload d'image
        $imageName = time().'.'.$request->imageUrl->extension();
        $imagePath = $request->imageUrl->storeAs('sauces', $imageName, 'public');
        $imageUrl = asset('storage/'.$imagePath);

        // Création et enregistrement de la sauce
        Sauce::create([
            'name' => $request->input('name'),
            'manufacturer' => $request->input('manufacturer'),
            'description' => $request->input('description'),
            'mainPepper' => $request->input('mainPepper'),
            'imageUrl' => $imageUrl,
            'heat' => $request->input('heat'),
            'userId' => Auth::id(), // Get the authenticated user's ID
            'likes' => 0,
            'dislikes' => 0,
        ]);

        return redirect()->route('sauces.index')->with('success', 'Sauce ajoutée avec succès!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sauce = Sauce::findOrFail($id);
        return view('sauces.show', compact('sauce'));
    }

}
