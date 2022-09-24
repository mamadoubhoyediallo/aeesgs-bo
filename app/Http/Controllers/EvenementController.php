<?php

namespace App\Http\Controllers;

use App\Models\CategoryEvenement;
use App\Models\Evenement;
use App\Models\Organisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EvenementController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:api');
    }
    public function index()
    {
        try {
            $evenement = Evenement::orderBy('id', 'desc')->with('category_evenements')
                                    ->orderBy('id', 'desc')->with('organisateurs')->get();
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
            'organisateurs_id' => ['required'],
            'libelle' => ['required'],
            'description' => ['required'],
            'adresse' => ['required'],
            'photo' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'date' => ['required'],
        ]);
        if ($validation->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validation->errors()->all(),
            ]);
        }else{
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('posts/', $filename);
            } else {
                $filename = null;
            }
//            $filename = $request->file('photo')->move('posts');
            $result = Evenement::create([
                'category_evenements_id' => $request->category_evenements_id,
                'organisateurs_id' => $request->organisateurs_id,
                'libelle' => $request->libelle,
                'description' => $request->description,
                'adresse' => $request->adresse,
                'photo' => $filename,
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
}
