<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Menggunakan middleware 'auth' untuk semua metode kecuali 'show'
        $this->middleware('auth')->except('show');
    }

    public function index()
    {
        $pokemons = Pokemon::paginate(20);
        return view('pokemon.index', compact('pokemons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'required|numeric|between:0,999999.99',
            'height' => 'required|numeric|between:0,999999.99',
            'hp' => 'required|integer|max:9999',
            'attack' => 'required|integer|max:9999',
            'defense' => 'required|integer|max:9999',
            'is_legendary' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('photo')->store('images/public');

            $validated['photo'] = $imagePath;
           }

           Pokemon::create([
            'name' => $validated['name'],
            'species' => $validated['species'],
            'primary_type' => $validated['primary_type'],
            'weight' => $validated['weight'],
            'height' => $validated['height'],
            'hp' => $validated['hp'],
            'attack' => $validated['attack'],
            'defense' => $validated['defense'],
            'is_legendary' => $request->has('is_legendary') ? true : false,
            'photo' => $validated['photo'] ?? null,
           ]);

           return redirect()->route('pokemon.index')->with('success', 'Pokemon added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemon.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemon.edit' , compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|max:100',
            'primary_type' => 'required|string|max:50',
            'weight' => 'required|numeric|between:0,999999.99',
            'height' => 'required|numeric|between:0,999999.99',
            'hp' => 'required|integer|max:9999',
            'attack' => 'required|integer|max:9999',
            'defense' => 'required|integer|max:9999',
            'is_legendary' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:png,jpg,jpeg,gif,svg|max:2048',
            ]);

            $imagePath = $request->file('photo')->store('images','public');

            if ($pokemon->photo){
                Storage::delete($pokemon->photo);
            }

            $validated['photo'] = $imagePath;
           }
        $pokemon->update([
            'name' => $validated['name'],
            'species' => $validated['species'],
            'primary_type' => $validated['primary_type'],
            'weight' => $validated['weight'],
            'height' => $validated['height'],
            'hp' => $validated['hp'],
            'attack' => $validated['attack'],
            'defense' => $validated['defense'],
            'is_legendary' => $request->has('is_legendary') ? true : false,
            'photo' => $validated['photo'] ?? $pokemon->photo,
        ]);
           return redirect()->route('pokemon.index')->with('success', 'Pokemon Update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->photo){
            Storage::delete($pokemon->photo);
        }
        $pokemon->delete();
        return redirect()->route('pokemon.index')->with('success', 'pokemon Deleted successfully!');
    }
}
