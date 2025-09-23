<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews'; // your table name
    protected $primaryKey = 'id_review';
    public $timestamps = false;

    protected $fillable = [
        'name_review',
        'comment',
        'rate',
    ];
}
