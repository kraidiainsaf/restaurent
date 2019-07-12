<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('web_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes()->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
            $table->foreign('id')
            ->references('id')->on('produits')
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
        Schema::dropIfExists('web_commandes');
    }
}
