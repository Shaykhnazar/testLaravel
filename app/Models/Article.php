<?php

namespace App\Models;

use App\Exceptions\MismatchException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\True_;

class Article extends Model
{
    use SoftDeletes;
    protected $table = 'articles';
    protected $fillable = ['title', 'text'];

    /**
     * Relation with article's user
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class, 'user_article', 'article_id','user_id');
    }
    public function checkAuthor(User $user){
        try {
            $author = User::findOrFail($user->id);
            $is_author = $this->users()->where('user_id',$author->id)->get();
            if ($this->attributes['deleted_at'])
                return null;

            if ($is_author != null)
                return true;
            else
                return false;

        } catch (MismatchException $exception) {
            return $exception->render();
        }


    }
}
