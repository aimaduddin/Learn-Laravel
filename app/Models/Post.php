<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $table = 'posts'; this is to let the model use custom name table

    // protected $primaryKey = ''; custom primary key

    // protected $timestamps = false; to disable the timestamps inside database

    // protected $dateTime = 'U'; change timestamps format in db

    // protected $attributes = [ defining default value for attributes
    //     'is_published' => true
    // ]
}
