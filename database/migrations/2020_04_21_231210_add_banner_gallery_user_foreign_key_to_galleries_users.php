<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBannerGalleryUserForeignKeyToGalleriesUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galleries_users', function ($table) {
           $table->unsignedBigInteger('banner_media_id')->nullable()->after('gallery_user_id');
           $table->foreign('banner_media_id')->references('media_id')->on('medias');
        });    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galleries_users', function ($table) {
            $table->dropForeign(['banner_media_id']);
            $table->dropColumn(['banner_media_id']);
        });
    }
}
