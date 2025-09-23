<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id_product';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'product_name','price','description','photo_product'
    ];
}
