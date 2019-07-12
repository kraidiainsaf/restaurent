<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes()->nullable();
            $table->time('de')->nullable();
            $table->time('a')->nullable();

            $table->timestamp('date')->nullable();
            $table->timestamps();
            $table->unsignedInteger('client_id')->nullable();
            $table->foreign('client_id')
            ->references('id')->on('clients')
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
        Schema::dropIfExists('reservations');
    }
}
