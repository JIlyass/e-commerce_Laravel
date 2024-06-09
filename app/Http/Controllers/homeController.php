<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index()
    {
       
        $categories = Categorie::with('produits')->get();

        
        $categories = $categories->map(function ($category) {
            $category->produits = $category->produits->take(3);
            return $category;
        });

        return view('welcome', compact('categories'));
    }
}
