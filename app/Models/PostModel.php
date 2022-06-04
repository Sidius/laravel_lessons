<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// php artisan make:model Post
// php artisan make:model Post -m
class PostModel extends Model
{
    use HasFactory;

//    protected $table = 'post_models';
//    protected $primaryKey = 'post_id';
//    public $incrementing = false;
//    protected $keyType = 'string';
//    public $timestamps = false;

    protected $attributes = [
        'content' => 'Lorem ipsum...',
    ];


}
