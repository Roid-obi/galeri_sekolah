<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'created_by',
        'image',
        'content',
        'slug',
        'is_pinned',
        'views'
    ];


    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $attributes = [
        'content' => '',
        'image' => '',
        'is_pinned'=> 0,
        'views'=> 0

    ];

}
