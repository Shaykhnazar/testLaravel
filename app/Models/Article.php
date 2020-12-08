<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['title', 'text'];

    public function users(){
        return $this->belongsToMany(User::class, 'user_article', 'article_id','user_id');
    }
}
