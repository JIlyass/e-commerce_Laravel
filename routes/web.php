<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\designController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\productsController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;



//Dashboard - produits routes 
Route::middleware(AdminMiddleware::class)
    ->prefix("dashboard")
    ->name('dashboard.produits.')
    ->controller(DashboardController::class)
    ->group(function(){
        
        Route::get('produits',"ListesProduits")->name('listesProduits');
        Route::post('produits',"ListesProduits")->name('listesProduits');
        Route::get('produits/create',"create")->name('create');
        Route::post('produits/create',"store")->name('store');
        Route::get('produits/{id}/show',"show_produit")->name('show');
});
// Dashboard index Route
Route::get('/dashboard',[DashboardController::class,"index"])->middleware(AdminMiddleware::class)->name("dashboard.index");

// Dashboard design Route
Route::prefix("dashboard/design")
->name("dashboard.design.")
->controller(designController::class)
->group(function(){
    Route::get('',"index")->name("index");
});

// home controller
Route::get("/",[homeController::class,"index"])->name('home.index');

// Auth Routes
Route::controller(AuthController::class)
    ->prefix('auth')
    ->name('auth.')
    ->group(function (){

        Route::get('profile','profile')->name("profile");
        Route::get('register','register')->name("register");
        Route::post('register','to_register')->name('register');
        Route::get('login','login')->name("login");
        Route::post('login','to_login')->name('login');
        Route::delete('logout','logout')->name('logout');

    });

Route::get('login',[AuthController::class,'login'])->name("login");
// Route::resource("products",productsController::class);
Route::get("/produits",[productsController::class,"index"])->name("produtcs.index");
Route::get("/produits/{idPr}",[productsController::class,"addToPanier"])->middleware("auth")->name("produtcs.addToPanier");
Route::get("/produits/single-product/{idPr}",[productsController::class,"singleProduct"])->name("produtcs.single-product");


Route::get("/about",function(){
    return view('about');
});
Route::get("/contact",function(){
    return view('contact');
});
