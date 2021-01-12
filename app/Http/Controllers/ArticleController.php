<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    /**
     * Get list of articles
     */
    public function index()
    {
        $articles = Article::where('deleted_at','=',null)->get();
        return view('article.index',compact('articles'));
    }


    /**
     * Show form to create new article
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a new article
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:articles',
            'text'=>'required|string',
        ]);
        $data=[
            'title'=>$request->title,
            'text'=>$request->text,
        ];
        Article::create($data);

        return redirect()->route('article.index' )->with('success','Статья успешно cоздана!');
    }

    /**
     * Show one article
     */
    public function show()
    {
        return view('article.show');
    }


    /**
     * The method to soft delete the article
     * @param $id
     */
    public function softDelete($id)
    {
        $article = Article::findOrFail($id);
        $article->deleted_at = now();
        $article->save();
    }

    /**
     * The method to restore soft deleted the article
     * @param $id
     */
    public function restore($id)
    {
        $article = Article::findOrFail($id);
        $article->deleted_at = null;
        $article->save();
    }
}
