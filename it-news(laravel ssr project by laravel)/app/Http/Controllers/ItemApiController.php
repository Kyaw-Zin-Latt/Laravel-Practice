<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ItemApiController extends Controller
{

    public function index($search = "") {
        $articles = Article::when(isset($search),function ($q) use ($search) {
//            $search = request()->search;
            $q->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(["user","category"])->orderBy("id","desc")->paginate(5);

        return response($articles,200);
    }

    public function search($search) {
        $articles = Article::when(isset($search),function ($q) use ($search) {
//            $search = request()->search;
            $q->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(["user","category"])->orderBy("id","desc")->paginate(5);

        return response($articles,200);
    }

    public function show($id) {
        $article = Article::find($id);
        return response("$article",200);
    }

    public function store(Request $request) {
        $v = Validator::make($request->all(),[
            "category" => "required|exists:categories,id",
            "title" => "required|min:5|max:100",
            "description" => "required|min:20",
        ]);

        if ($v->fails()) {
            return response($v->errors(),400);
        }

        $article = new Article();
        $article->category_id = $request->category;
        $article->user_id = $request->category;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->save();


        return response($request,200);
    }

    public function delete($id) {
        $article = Article::find($id);
        $article->delete();

        return response($article->title,200);

    }

    public function update(Request $request,$id) {

        $v = Validator::make($request->all(),[
            "category" => "required|exists:categories,id",
            "title" => "required|min:5|max:100",
            "description" => "required|min:20",
        ]);

        if ($v->fails()) {
            return response($v->errors(),400);
        }

        $article = Article::find($id);
        $article->category_id = $request->category;
        $article->user_id = $request->category;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->update();


        return response($article,200);

    }

    public function baseOnCategory($id) {
        $articles = Article::when(isset(request()->search),function ($q){
            $search = request()->search;
            $q->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->where("category_id","=",$id)->with(["user","category"])->orderBy("id","desc")->paginate(5);
        return response($articles,200);
    }


}
