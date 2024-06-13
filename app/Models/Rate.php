<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Rate extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'rate';

    protected $fillable = [
        'rate',
        'id_blog', 
        'id_user',
   
    ];

  
    public $timestamps = true;
}
