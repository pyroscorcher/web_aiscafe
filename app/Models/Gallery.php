<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $primaryKey = 'id_photo';

    protected $fillable = [
        'photo_name',
        'photo',
    ];
}
