<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Rubric
 * @package App
 * @mixin Builder
 */
class Rubric extends Model
{
    use HasFactory;

    // $rubric = Rubric::query()->find(1);
    // $rubric->post;
    public function post()
    {
//        return $this->hasOne('App\PostModel');
        return $this->hasOne(PostModel::class);
    }
    public function posts()
    {
        return $this->hasMany(PostModel::class, 'rubric_id', 'id');
//        return $this->hasMany(PostModel::class);
    }
}
