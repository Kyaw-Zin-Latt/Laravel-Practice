<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * To make slug start
         */

//        $articles = Article::all();
//        $categories = Category::all();

//        foreach ($articles as $a){
//            $a->slug = Str::slug($a->title);
//            $a->update();
//        }


//        foreach ($articles as $a){
//            foreach ($categories as $c){
//                if ($a->category_id == $c->id){
//                    $a->category_slug = $c->slug;
//                    $a->update();
//                }
//            }
//        }


        /**
         * To make slug start
         */

        $articles = Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            $q->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(["user","category"])->orderBy("id","desc")->paginate(5);

        return view("article.index",compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("article.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "category" => "required|exists:categories,id",
            "title" => "required|min:5|max:100",
            "description" => "required|min:20",
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->slug = Str::slug($request->title);
        $article->description = $request->description;
        $article->user_id = Auth::id();
        $article->category_id = $request->category;
        $article->save();

        return  redirect()->route("article.index")->with("message","<b>$request->title</b> is added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view("article.show",compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view("article.edit",compact("article"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "category" => "required|exists:categories,id",
            "title" => "required|min:5|max:100",
            "description" => "required|min:20",
        ]);

        $article->title = $request->title;
        $article->description = $request->description;
        $article->category_id = $request->category;
        $article->update();

        return  redirect()->route("article.index")->with("message","<b>$request->title</b> is updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return  redirect()->back()->with("message","<b>$article->title</b> is deleted");

    }


}
