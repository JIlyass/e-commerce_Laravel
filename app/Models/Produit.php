<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $fillable=["nomPr","description","prixA","PrixOrigin","prixV","qteS","categorie_id"];

    public function categorie(){
        return $this->belongsTo(Categorie::class,"categorie_id");
    }

    public function produitsImages(){
        return $this->hasMany(ProduitImage::class,"produit_id");
    }
}
