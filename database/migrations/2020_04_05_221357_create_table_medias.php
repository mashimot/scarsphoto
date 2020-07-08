<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->bigIncrements('media_id');
            $table->string('media_title', 64);
            $table->string('media_comment');
            $table->string('media_url', 2048);
            $table->boolean('media_nsfw');
            $table->unsignedBigInteger('media_type_id');
            $table->unsignedBigInteger('user_id');
            $table->unique(['media_id', 'user_id', 'media_type_id']);
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('media_type_id')->references('media_type_id')->on('media_types');
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
        Schema::dropIfExists('medias');
    }
}

