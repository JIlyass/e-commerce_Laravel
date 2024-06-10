<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Type\Integer;

use function Laravel\Prompts\select;

class productsController extends Controller
{
    public function index(Request $req){
        

        // $db_produits=Categorie::find($req->idCat)->produits;
        $db_produits=DB::select('select * from produits pr join produits_images pi on pr.id=pi.produit_id');
        $db_cat=Categorie::all();
        // dd($db_produits);
        return view('products.index',compact("db_produits","db_cat"));
    }
    public function addToPanier(Request $req){
        dd('hello from addToPanier'.$req->idPr);
    }
    public function singleProduct(Request $req){
        $produit=DB::select("select * from produits pr join produits_images pi on pr.id=pi.produit_id where pi.isOfficiel=1 and pr.id=? ",[$req->idPr]);
        $dbPrd = DB::select("select * from produits pr join produits_images pi on pr.id=pi.produit_id where pi.isOfficiel=1 and pr.categorie_id=? ",[$produit[0]->categorie_id]);
        $nomCat = Categorie::find($produit[0]->categorie_id)->nomCat;
        return view('products.single-product',compact("produit","dbPrd","nomCat"));
    }
}
