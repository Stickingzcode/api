<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //by extending Model, this class already has access to inbuilt functions: create, find, findOrFail, delete, all.
    use HasFactory;
    protected $fillable = ['title', 'content'];
//    fillable allows batch or bulk passing of fields
}
