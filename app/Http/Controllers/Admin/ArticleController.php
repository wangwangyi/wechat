<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Article;

class ArticleController extends CommonController
{
    public function __construct()
    {
        parent::__construct();
        view()->share(['_article' => 'open active','_art' =>'block','_articles' => 'active']);
    }

    function index()
    {
        $articles = Article::get();
        return view('admin.article.index')->with('articles',$articles);
    }

    function create()
    {
        return view('admin.article.create');
    }

    function store(Request $request)
    {
        Article::create($request->all());
        return redirect(route('admin.article.index'))->with('msg', '新增成功！');
    }

    function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.edit')->with('article',$article);
    }

    function update(Request $request)
    {
        $article = Article::find($request->id);
        $article -> update($request->all());
    }

    function destroy($id)
    {
        Article::destroy($id);
        return redirect(route('admin.article.index'));
    }

}
