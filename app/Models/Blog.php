<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Blog extends Model
{
    use HasFactory;


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $table = 'blog';

     protected $fillable = [
        'title',
        'image',
        'description',
        'created_at',
        


    ];


    public $timestamps = true;
}
