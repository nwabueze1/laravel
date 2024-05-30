<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable=[
        "title",
        "content",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user's image.
     */
    public function photo(): MorphOne
    {
        return $this->morphOne(Photo::class, 'imageable');
    }

    public function comments():MorphMany
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function tags():MorphToMany
    {
        return $this->morphToMany(Tag::class, "taggable");
    }
}
