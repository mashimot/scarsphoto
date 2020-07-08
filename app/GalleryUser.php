<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryUser extends Model
{
    //
    protected $table = 'galleries_users';
    protected $primaryKey = 'gallery_user_id';
    protected $fillable = [
        'gallery_user_name',
        'gallery_user_description',
        'gallery_user_pos',
        'banner_media_id',
        'user_id'
    ];
}
