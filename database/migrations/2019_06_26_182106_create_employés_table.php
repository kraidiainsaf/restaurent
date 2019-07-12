<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployésTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employés', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->softDeletes()->nullable();
            $table->string('type')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('employés');
        
    }
}
