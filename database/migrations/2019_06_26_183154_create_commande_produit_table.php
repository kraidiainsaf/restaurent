<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandeProduitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes()->nullable();
            $table->integer('quantité')->nullable();
            $table->unsignedInteger('produit_id')->nullable();
            $table->unsignedInteger('commande_id')->nullable();
            $table->timestamps();


            $table->foreign('produit_id')
            ->references('id')->on('produits')
            ->onDelete('cascade');
            
            $table->foreign('commande_id')
            ->references('id')->on('commandes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commande_produit');
    }
}
