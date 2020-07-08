<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableGalleriesUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galleries_users', function (Blueprint $table) {
            $table->bigIncrements('gallery_user_id');
            $table->string('gallery_user_name', 128);
            $table->string('gallery_user_description', 128)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->bigInteger('gallery_user_pos');
            $table->unique(['gallery_user_name', 'user_id']);
            $table->foreign('user_id')->references('id')->on('users');     
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
        Schema::dropIfExists('galleries_users');
    }
}
