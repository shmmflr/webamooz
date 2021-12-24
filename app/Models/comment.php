<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        'status',
        'post_id',
        'user_id',
        'comment_id',
    ];

    protected $with = ['replace']; //هرجا والد رو بردی فرزندشم بنداز توش ببر

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function replace()
    {
        return $this->hasMany(comment::class);
    }
    public function jalaliDate()
    {
        $date = $this->created_at;
        return verta($date)->format('%d-%B-%Y - H:i');
    }
}