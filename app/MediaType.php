<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    //
    protected $table = 'media_types';
    protected $primaryKey = 'media_type_id';
    protected $fillable = [
        'media_type_short_name',
        'media_type_name'
    ];
}
