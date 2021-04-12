<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
	protected $fillable = ['description', 'product_image', 'gender', 'item_number', 'price', 'description2', 'color'];
	protected $dates = ['created_at', 'updated_at'];
}
