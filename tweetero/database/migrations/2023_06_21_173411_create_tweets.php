<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTweets extends Migration
{
    /**
2     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cadastro_id');
            $table->foreign('cadastro_id')->references('id')->on('cadastros');
            $table->string('tweet', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tweets', function (Blueprint $table) {
           $table->dropForeign('tweets_cadastro_id_foreign');
        });
        Schema::dropIfExists('tweets');
    }
}
