<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaGallery extends Model
{    
    //
    protected $table = 'medias_galleries';
    protected $primaryKey = 'media_gallery_id';
    protected $uniqueKey = ['media_id', 'gallery_user_id'];
    protected $fillable = [
        'media_id',
        'gallery_user_id',
        'media_gallery_pos',
        'media_route_id'
    ];    
}
