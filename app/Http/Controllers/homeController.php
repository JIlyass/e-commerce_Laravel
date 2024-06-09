<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index(){
        //  $db=DB::select("select * from categories cat inner join produits pr on cat.id=pr.categorie_id inner join produits_images pi on pr.id=pi.produit_id where isOfficiel=1");
        //  $db_prd=Produit::all();
         $db_prd=DB::select("select * from produits prd join produits_images pi on prd.id=pi.produit_id where isOfficiel=1");
         $db_cat=Categorie::all();
        return view('home',compact("db_prd","db_cat"));
    }
}
