<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    
    public function up(): void
    {   Schema::disableForeignKeyConstraints();
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string("nomPr");
            $table->string("description");
            $table->decimal("prixA");
            $table->decimal("PrixOrigin")->nullable();
            $table->decimal("prixV");
            $table->unsignedBigInteger("qteS");
            $table->foreignId("categorie_id")->constrained("categories","id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
