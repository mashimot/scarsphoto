<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaCategory extends Model
{    
    //
    protected $table = 'medias_categories';
    protected $uniqueKey = ['media_id', 'category_id'];
    protected $fillable = [
        'media_id',
        'category_id'
    ];    
}
