<?php

use App\Models\Commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\CommandeResource;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/commande/{id}",function(int $id){
    return new CommandeResource(Commande::findOrFail($id));
});

Route::post("/commande/{id}",function(int $id,Request $request){
    // return new CommandeResource();
    Commande::where("id",$id)->update(["etat_id"=>$request->etat_id]);
    return response()->json(["message"=>"Updated successfully"],200);

});