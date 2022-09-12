<?php

namespace App\Http\Controllers;

use App\Models\CategoryEvenement;
use Illuminate\Http\Request;

class CategoryEvenementController extends Controller
{
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
    public function findAllCategoryEvent(){
        $categoryEvenement = CategoryEvenement::all();
        return $categoryEvenement;
    }
}
