<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class productsController extends Controller
{
    public function index(Request $req){
        $db_produits=Categorie::find($req->idCat)->produits;
        // dd($db_produits);
        return view('products.index');
    }
}
