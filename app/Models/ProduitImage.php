<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitImage extends Model
{
    use HasFactory;
    protected $table="produits_images";
    protected $fillable=["produit_id","path","isOfficiel"];

    public function produit(){
        return $this->belongsTo(Produit::class,"produit_id");
    }
}
