<?php

namespace App\Http\Controllers;

use App\Models\Organisateur;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function add(Request $request){
        $request->validate([
            'libelle' => 'required',
        ]);
        $organisateur = Organisateur::create([
            'libelle' => $request->libelle,
        ]);
        return response()->json([
            'message' => 'successfully registered',
            'oraganisateur' => $organisateur
        ]);
    }
    public function findAllOrga(){
        $organisateur = Organisateur::all();
        return $organisateur;
    }
}
