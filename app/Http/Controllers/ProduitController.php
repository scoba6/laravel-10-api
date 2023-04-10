<?php

namespace App\Http\Controllers;

use App\Http\Resources\Produit as ResourcesProduit;
use App\Http\Resources\ProduitResource;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{

    /**
     * @OA\Get(
     *     path="/produit",
     *     summary="Listing de tous les produits",
     *     @OA\Parameter(
     *         description="Parameter with mutliple examples",
     *         in="path",
     *         name="id",
     *         required=true,
     *  
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function index()
    {
        return ResourcesProduit::collection(Produit::all());
        //return ResourcesProduit::collection();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Produit::create($request->all())) {
            return response()->json(['success' => 'Produit créée avec succès'], 200);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return new ResourcesProduit($produit);
    }

    /**
     * @OA\Put(
     *     path="/users/{id}",
     *     summary="Updates a user",
     *     @OA\Parameter(
     *         description="Parameter with mutliple examples",
     *         in="path",
     *         name="id",
     *         required=true,
     *         @OA\Schema(type="string"),
     *         @OA\Examples(example="int", value="1", summary="An int value."),
     *         @OA\Examples(example="uuid", value="0006faf6-7a61-426c-9034-579f2cfcfa83", summary="An UUID value."),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="OK"
     *     )
     * )
     */
    public function update(Request $request, Produit $produit)
    {
        if ($produit->update($request->all())) {
            return response()->json(['success' => 'Produit mis a jour avec succès'], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        if($produit->delete()){
            return response()->json(['suppression' => 'Produit supprime'], 200);

        };
    }
}
