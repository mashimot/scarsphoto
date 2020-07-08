<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMediasRoutes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias_routes', function (Blueprint $table) {
            $table->bigIncrements('media_route_id');
            $table->string('media_route_name');
            $table->boolean('media_route_has_galleries')->default(0);
            $table->string('media_route_description');
            $table->timestamps();
            $table->unique(['media_route_name']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medias_routes');
    }
}
