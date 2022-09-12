<?php

namespace App\Http\Controllers;

use App\Models\CategoryEvenement;
use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvenementController extends Controller
{
    public function index()
    {
        try {
            $evenement = Evenement::orderBy('id', 'desc')->with('category_evenements')->get();
            if ($evenement) {
                return response()->json([
                    'success' => true,
                    'evenement' => $evenement,
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    public function add(Request $request){
        $validation = Validator::make($request->all(), [
            'category_evenements_id' => ['required'],
            'libelle' => ['required'],
            'description' => ['required'],
            'adresse' => ['required'],
            'photo' => ['required'],
            'date' => ['required'],
        ]);
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all(),
            ]);
        }else{
            $result = Evenement::create([
                'category_evenements_id' => $request->category_evenements_id,
                'libelle' => $request->libelle,
                'description' => $request->description,
                'adresse' => $request->adresse,
                'photo' => $request->photo,
                'date' => $request->date,
            ]);
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => 'Evenemet Add Successfully'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => "Some Problem"
                ]);
            }
            }
        }
    public function findAllEvent(){

    }
}
