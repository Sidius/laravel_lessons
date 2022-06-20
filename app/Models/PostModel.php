<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use IntlDateFormatter;

// php artisan make:model Post
// php artisan make:model Post -m (create also migration file)
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
    protected $fillable = ['title', 'content', 'rubric_id'];
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

    public function getPostDateDiff()
    {
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    public function getPostDate()
    {
        $formatter = new IntlDateFormatter(config('app.locale'), IntlDateFormatter::FULL, IntlDateFormatter::FULL);
        $formatter->setPattern('d MMM y');
        return $formatter->format(new \DateTime($this->created_at));
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = Str::title($value);
    }

    public function getTitleAttribute($value)
    {
        return Str::upper($value);
    }
}
