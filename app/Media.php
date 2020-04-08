<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    //
    protected $table = 'medias';
    protected $primaryKey = 'media_id';
    protected $fillable = [
        'media_title',
        'media_comment',
        'media_url',
        'media_has_parental_control',
        'media_type_id',
        'user_id'
    ];    
}
