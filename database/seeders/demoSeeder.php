<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class demoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            "nomCat"=>"Software",
            "description"=>"tous ce qui'est Software",
        ]);
        DB::table('categories')->insert([
            "nomCat"=>"Hardware",
            "description"=>"tous ce qui'est Hardware",
        ]);
        DB::table('produits')->insert([
            "nomPr"=>"VPN",
            "description"=>"VPN tres puissant !! ", 
            "prixA"=>"150", 
            "PrixOrigin"=>"250", 
            "prixV"=>"199", 								
            "qteS"=>"10", 								
            "categorie_id"=>"1", 								
        ]);
        DB::table('produits')->insert([
            "nomPr"=>"PC",
            "description"=>"Nice pc", 
            "prixA"=>"4000", 
            "PrixOrigin"=>"5500", 
            "prixV"=>"4999", 								
            "qteS"=>"10", 								
            "categorie_id"=>"2", 								
        ]);
        DB::table('produits_images')->insert([
            "produit_id"=>"1",
            "path"=>"img_demo_vpn.jpeg",
            "isOfficiel"=>true								
        ]);
        DB::table('produits_images')->insert([
            "produit_id"=>"2",
            "path"=>"img_demo_pc.jpeg",
            "isOfficiel"=>true								
        ]);
    }
}
