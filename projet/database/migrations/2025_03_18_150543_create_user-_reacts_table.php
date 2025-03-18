<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserReactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reacts_sauce', function (Blueprint $table) {
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('sauceId');

            // Clé primaire
            $table->primary(['userId', 'sauceId']);

            // Clés étrangères
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('sauceId')->references('idSauce')->on('sauces');

            $table->boolean('reaction')->nullable();
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user-_reacts');
    }

}