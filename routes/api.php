<?php

use App\Models\Commande;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CommandeResource;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\AuthenticationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get("/products", function () {
    return response()->json(Produit::all());
});
// Route::post('login', [AuthenticationController::class, 'login']);
// Route::post('register', [AuthenticationController::class, 'register']);
// 
// Route::middleware('auth:sanctum')->group(function () {
//     Route::resource('clients', ClientController::class);
// });

// Route::get("/commande/{id}",function(int $id){
//     return new CommandeResource(Commande::findOrFail($id));
// })->middleware("auth:sanctum");

// Route::post("/commande/{id}",function(int $id,Request $request){
//     // return new CommandeResource();
//     Commande::where("id",$id)->update(["etat_id"=>$request->etat_id]);
//     return response()->json(["message"=>"Updated successfully"],200);

// })->middleware("auth:sanctum");