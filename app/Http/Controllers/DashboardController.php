<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitRequest;
use App\Models\Categorie;
use App\Models\Produit;
use App\Models\ProduitImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Ramsey\Uuid\Type\Integer;

class DashboardController extends Controller
{
    public function index(){

         return view('dashboard.index');

    }
    public function ListesProduits(Request $req){
         // $db_produits=Produit::all()->map(function($pr){
         //    return [
         //       "detail"=> $pr ,
         //       "images"=> $pr->produitsImages
         //    ];
         // });
           //it's work but there is a problem while foreach on data

           $categorie=$req->categorie;
           $db_produits=DB::select('select * from produits pr join produits_images pi on pr.id=pi.produit_id where pi.isOfficiel=1');   
           if($categorie && $categorie!="-1"){
                $db_produits=DB::select('select * from produits pr join produits_images pi on pr.id=pi.produit_id where pi.isOfficiel=1 and pr.categorie_id=?',[$categorie]);   
            }
           $db_categories=Categorie::all();
        return view('dashboard.gest_produits.index',compact('db_produits','db_categories','categorie'));

    }


    public function create(){
        $db_categories=Categorie::all();
        return view("dashboard.gest_produits.create",compact('db_categories'));
    }


    public function store(ProduitRequest $req){
        DB::table('produits')->insert([
            "nomPr"=>$req->nomPr,
            "description"=>$req->description,
            "prixA"=>$req->prixA,
            "PrixOrigin"=>$req->PrixOrigin,
            "prixV"=>$req->prixV,
            "qteS"=>$req->qteS,
            "categorie_id"=>$req->categories_id,
        ]);
        $id_newPr=(DB::table("produits")->orderBy("id","desc")->first()->id);

        $imgOff_path = "imgOff_".now()->valueOf().".".$req->imageO->extension();
        ProduitImage::insert([
            "produit_id"=>$id_newPr,
            "path"=>$imgOff_path,
            "isOfficiel"=>true
        ]);
        $req->imageO->storeAs('images',$imgOff_path,"public");

        if($req->images){
            foreach ($req->images as $img) {
                $img_path = "img_".now()->valueOf().".".$img->extension();
                ProduitImage::insert([
                    "produit_id"=>$id_newPr,
                    "path"=>$img_path,
                    "isOfficiel"=>false
                ]);
                $img->storeAs('images',$img_path,"public");
            }
        }
       
        return to_route("dashboard.produits.listesProduits");
    }



    public function show_produit(Request $req){
        // dd('hello');
        $pr=Produit::find($req->id);
        $imgs=$pr->produitsImages;
        // dd($imgs);
        $cat=$pr->categorie->nomCat;
        $all_cat=Categorie::all();
        return view('dashboard.gest_produits.show',compact("pr","imgs","cat","all_cat"));
    }
}
