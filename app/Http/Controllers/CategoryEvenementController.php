<?php

namespace App\Http\Controllers;

use App\Models\CategoryEvenement;
use Illuminate\Http\Request;

class CategoryEvenementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function add(Request $request){
        $request->validate([
            'libelle' => 'required',
        ]);
        $categoryEvenement = CategoryEvenement::create([
            'libelle' => $request->libelle,
        ]);
        return response()->json([
            'message' => 'successfully registered',
            'categoryEvenement' => $categoryEvenement
        ]);
    }
    public function findAll(){
        $categoryEvenement = CategoryEvenement::all();
        return $categoryEvenement;
    }
    public function show($id)
    {
        $categoryEvenement = CategoryEvenement::find($id);
        return response()->json([
            'status' => 'success',
            'categoryEvenement' => $categoryEvenement,
        ]);
    }
    public function update(Request $request, $id){
        $request->validate([
            'libelle' => 'required|string|max:255',
        ]);

        $categoryEvenement = CategoryEvenement::find($id);
        $categoryEvenement->libelle = $request->libelle;
        $categoryEvenement->save();

        return response()->json([
            'status' => 'success',
            'message' => 'categoryEvenement updated successfully',
            'categoryEvenement' => $categoryEvenement,
        ]);
    }
    public function destroy($id)
    {
        $categoryEvenement = CategoryEvenement::find($id);
        $categoryEvenement->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'categoryEvenement deleted successfully',
            '$categoryEvenement' => $categoryEvenement,
        ]);
    }
}
