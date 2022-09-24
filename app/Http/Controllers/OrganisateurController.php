<?php

namespace App\Http\Controllers;

use App\Models\Organisateur;
use Illuminate\Http\Request;

class OrganisateurController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
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
    public function findAll(){
        $organisateur = Organisateur::all();
        return $organisateur;
    }
    public function show($id)
    {
        $organisateur = Organisateur::find($id);
        return response()->json([
            'status' => 'success',
            'organisateur' => $organisateur,
        ]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $organisateur = Organisateur::find($id);
        $organisateur->libelle = $request->libelle;
        $organisateur->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Organisateur updated successfully',
            'organisateur' => $organisateur,
        ]);
    }
    public function destroy($id)
    {
        $organisateur = Organisateur::find($id);
        $organisateur->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'organisateur deleted successfully',
            'organisateur' => $organisateur,
        ]);
    }
}
