<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {

        $articles = Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            $q->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(["user","category"])->orderBy("id","desc")->paginate(5);

        return view("welcome",compact('articles'));
    }

    public function detail($slug) {

        $article = Article::where("slug",$slug)->first();
        if (empty($article)){
            return abort("404");
        }
        return view("blog.detail",compact("article"));
    }

    public function baseOnCategory($slug) {
        $articles = Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            $q->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->where("category_slug","=",$slug)->with(["user","category"])->orderBy("id","desc")->paginate(5);
        return view("welcome",compact('articles'));
    }

    public function baseOnUser($id) {
        $articles = Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            $q->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->where("user_id",$id)->with(["user","category"])->orderBy("id","desc")->paginate(5);
        return view("welcome",compact('articles'));
    }

    public function baseOnDate($id) {
        $articles = Article::whereDate("created_at",$id)->when(isset(request()->search),function ($q){
            $search = request()->search;
            $q->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(["user","category"])->orderBy("id","desc")->paginate(5);
        return view("welcome",compact('articles'));
    }
}
