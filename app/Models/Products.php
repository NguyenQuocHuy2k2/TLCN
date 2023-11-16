<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['name', 'manu_id', 'type_id', 'description', 'price', 'discount_price', 'feature' , 'pro_image'];
}
