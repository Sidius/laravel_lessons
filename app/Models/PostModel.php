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

//    protected $fillable = ['title'];
    protected $fillable = ['title', 'content'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function rubric()
    {
        return $this->belongsTo(Rubric::class, 'rubric_id', $this->primaryKey);
//        return $this->belongsTo(Rubric::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'post_tag', 'post_id');
    }

}
