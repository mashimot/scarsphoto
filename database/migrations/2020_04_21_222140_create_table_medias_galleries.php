<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMediasGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias_galleries', function (Blueprint $table) {
            $table->bigIncrements('media_gallery_id');
            $table->unsignedBigInteger('media_id');
            //$table->unsignedBigInteger('gallery_id');
            $table->unsignedBigInteger('media_route_id');
            $table->unsignedBigInteger('gallery_user_id');
            $table->bigInteger('media_gallery_pos');
            $table->unique(['media_id', 'gallery_user_id']);            
            //$table->unique(['media_id', 'gallery_id']);
            $table->timestamps();
        });
        Schema::table('medias_galleries', function (Blueprint $table)
        {
            $table->foreign('media_id')->references('media_id')->on('medias');
            //$table->foreign('gallery_id')->references('gallery_id')->on('galleries');
            $table->foreign('media_route_id')->references('media_route_id')->on('medias_routes');
            $table->foreign('gallery_user_id')->references('gallery_user_id')->on('galleries_users');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medias_galleries');
    }
}
