<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sauce;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SaucesController extends Controller
{
    // Affiche toutes les sauces
    public function index()
    {
        $sauces = Sauce::all();
        return response()->json([
            'success'=>true,
            'data'=>$sauces]);
    }

    // Affiche une sauce en particulier
    public function show($id)
    {
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return response()->json([
                'success'=>false,
                'message'=>'La sauce n\'a pas été trouvée'], 404);
             // Gérer le cas où la sauce n'existe pas
        }

        return response()->json([
            'success'=>true,
            'data'=>$sauce]);
    }


    // Enregistre une nouvelle sauce
    public function store(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'description' => 'required|string',
            'mainPepper' => 'required|string|max:255',
            'imageUrl' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'heat' => 'required|integer|min:1|max:10',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success'=>false,
                'message'=>$validator->errors()], 400);
        }
        if (request()->has('imageUrl') && $request->file('image')->isValid()) {
            $fichier = $request->file('imageUrl');
            $imageUrl = $fichier->store('sauces', 'public');
        }

        // Création et enregistrement de la sauce
        $sauce = Sauce::create([
            'userId' => Auth::user()->id, 
            'name' => $request->input('name'),
            'manufacturer' => $request->input('manufacturer'),
            'description' => $request->input('description'),
            'mainPepper' => $request->input('mainPepper'),
            'imageUrl' => $imageUrl,
            'heat' => $request->input('heat'),
        ]);

        return response()->json([
            'success'=>true,
            'data'=>$sauce,
            'message'=>'Sauce ajoutée avec succès!']);
    }

    // Méthode pour mettre à jour une sauce
    public function update(Request $request, $id)
    {
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return response()->json([
                'success'=>false,
                'message'=>'La sauce n\'a pas été trouvée'], 404);
        }

        // Validation des données
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'manufacturer' => 'required|string|max:255',
            'description' => 'required|string',
            'mainPepper' => 'required|string|max:255',
            'imageUrl' => 'image|mimes:jpeg,png,jpg|max:2048',
            'heat' => 'required|integer|min:1|max:10',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }
        $sauce->update($request->all());

        return response()->json([
            'success'=>true,
            'data'=>$sauce,
            'message'=>'Sauce mise à jour avec succès!']);
    }


    // Méthode pour supprimer une sauce
    public function destroy($id)
    {
        // Récupération de la sauce
        $sauce = Sauce::find($id);

        if (!$sauce) {
            return response()->json([
                'success'=>false,
                'message'=>'La sauce n\'a pas été trouvée'], 404);
        }

        // Suppression de la sauce
        $sauce->delete();

        return response()->json([
            'success'=>true,
            'message'=>'Sauce supprimée avec succès!']);
    }
    
}