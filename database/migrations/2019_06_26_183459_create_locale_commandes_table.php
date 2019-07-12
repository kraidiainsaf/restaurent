<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocaleCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locale_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes()->nullable();
            $table->string('order_servie')->nullable();
            $table->timestamps();
            $table->foreign('id')
            ->references('id')->on('produits')
            ->onDelete('cascade');
            $table->unsignedInteger('table_id')->nullable();
            $table->foreign('table_id')
            ->references('id')->on('tables')
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
        Schema::dropIfExists('locale_commandes');
    }
}
