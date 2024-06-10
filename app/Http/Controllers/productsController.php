<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function singleProduct(Request $req){
        $produit=DB::select("select * from produits pr join produits_images pi on pr.id=pi.produit_id where pi.isOfficiel=1 and pr.id=? ",[$req->idPr]);
        $dbPrd = DB::select("select * from produits pr join produits_images pi on pr.id=pi.produit_id where pi.isOfficiel=1 and pr.categorie_id=? ",[$produit[0]->categorie_id]);
        $nomCat = Categorie::find($produit[0]->categorie_id)->nomCat;
        return view('products.single-product',compact("produit","dbPrd","nomCat"));
    }
    
    public function addToPanier(Request $req){
        // test
        $test =DB::select('select * from paniers where produit_id=? and user_id=?',[$req->idPr,Auth::user()->id]);
        if(count($test)>0){
            DB::table('paniers')->where("produit_id",$req->idPr)->where("user_id",Auth::user()->id)->update([
                "produit_id"=>$req->idPr,
                "user_id"=>Auth::user()->id,
                "qte"=>($test[0]->qte+1)
            ]);
        }else{
             DB::table('paniers')->insert([
            "produit_id"=>$req->idPr,
            "user_id"=>Auth::user()->id,
            "qte"=>1
            ]);
        }
       
        return to_route('produtcs.cart');
    }

    public function cart(){
        $db_cart=DB::select('select * from produits pr join paniers p on p.produit_id=pr.id join produits_images pi on pr.id=pi.produit_id  where pi.isOfficiel=1 and p.user_id=? ',[Auth::user()->id]);
        // dd($db_cart);
        return view('products.cart',compact("db_cart"));
    }
}
