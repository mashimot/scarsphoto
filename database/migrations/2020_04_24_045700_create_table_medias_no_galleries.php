<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMediasNoGalleries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias_no_galleries', function (Blueprint $table) {
            $table->unsignedBigInteger('media_route_id');
            $table->unsignedBigInteger('media_id');
            $table->bigInteger('media_no_galleries_pos');
            $table->unique(['media_id', 'media_route_id']);
            $table->timestamps();
        });
        Schema::table('medias_no_galleries', function (Blueprint $table)
        {
            $table->foreign('media_id')->references('media_id')->on('medias');
            $table->foreign('media_route_id')->references('media_route_id')->on('medias_routes');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medias_no_galleries', function($table) {
            $table->dropForeign('media_id'); //
            $table->dropForeign('media_route_id'); //
        });
        Schema::dropIfExists('medias_no_galleries');
    }
}
