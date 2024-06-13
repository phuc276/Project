<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;


class Comments extends Model
{
    use HasFactory;



     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $table = 'comments';

     protected $fillable = [
        'cmt',
        'id_blog',
        'id_user',
        'avatar',
        'name',
        'level',

    ];

    public $timestamps = true;

}
