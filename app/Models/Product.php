<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Product extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'products';

    protected $fillable = [
        'id_user',
        'name', 
        'price',
        'id_category',
        'id_brand',
        'status',
        'sale',
        'company',
        'image',
        'detail',
   
    ];

  
    public $timestamps = true;
}
