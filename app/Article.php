<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $table = "articles";

     protected $fillable = [
        'title',
        'main_description',
        'article',
        'tags',
        'user_id',
        'count_of_like'
    ];

    protected $dates = ['date'];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

}
