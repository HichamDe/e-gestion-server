<?php


use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::resource("commandes", CommandeController::class);

Route::middleware(['guest'])->group(function () {
    Route::get('/', [HomeController::class, "index"])->name("index");
    Route::post('/add-panier', [HomeController::class, "addPanier"])->name("add-panier");
    Route::get('/show-panier', [HomeController::class, "showPanier"])->name("show-panier");
    Route::get('/clear-panier', [HomeController::class, "clearPanier"])->name("clear-panier-item");
    Route::post('/remove-panier-item', [HomeController::class, "removePanier"])->name("remove-panier-item");
});

Route::middleware(['auth'])->group(function () {
    
    Route::view('profile', 'profile')->name('profile');
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get("/categories/search", [CategorieController::class, "search"])->name("categories.search");
    Route::get("/produits/search", [ProduitController::class, "search"])->name("produits.search");
    
    Route::resource("categories", CategorieController::class);
    Route::resource("produits", ProduitController::class);
    
    Route::post('/get-next-etats/{id}',[CommandeController::class ,"commandeEtat"])->name("get-next-etats"); 
    Route::post('/set-etat/{id}',[CommandeController::class ,"setEtat"])->name("set-etat"); 

});






// Route::get('/', [HomeController::class, "index"])->name("index");




// Route::get('/produits', [ProduitController::class, 'filter'])->name('produits.filter');
// Route::get('/produits/filter', [ProduitController::class, 'index'])->name('produits.index');
require __DIR__ . '/auth.php';