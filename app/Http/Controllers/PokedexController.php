<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class PokedexController extends Controller
{
    public function index()
    {
        // Mengambil data Pokemon dengan paginasi
        $pokemons = Pokemon::paginate(9); // Ganti angka sesuai kebutuhan
        return view('pokedex', compact('pokemons'));
    }
}
