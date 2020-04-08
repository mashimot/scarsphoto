<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMediasCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('category_id');
            $table->primary(['media_id', 'category_id']);
            $table->timestamps();
        });
        Schema::table('medias_categories', function (Blueprint $table)
        {
            $table->foreign('media_id')->references('media_id')->on('medias');
            $table->foreign('category_id')->references('category_id')->on('categories');
        });        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medias_categories');
    }
}
