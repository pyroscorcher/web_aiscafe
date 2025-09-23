<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news'; // your table name
    protected $primaryKey = 'id_news'; // primary key
    public $timestamps = false; // if you don’t have created_at / updated_at

    protected $fillable = [
        'title',
        'content',
        'date',
        'photo_news',
    ];
}
