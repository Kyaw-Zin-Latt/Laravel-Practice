<?php

namespace App\Http\Controllers;

use App\Article;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Auth::user()->role == 0) {
        //     $articles = Article::with(['getUser', 'getPhotos'])->latest()->paginate(5);
        // } else {
        //     $articles = Article::where("user_id", "=", Auth::id())->latest()->paginate(5);
        // }

        $articles = Article::when(Auth::user()->role != 0, function ($query) {
            $query->where("user_id", Auth::id());
        })->with(['getUser', 'getPhotos'])->latest()->paginate(5);

        return view("article.index", compact('articles'));
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

        if (!$request->hasFile('photo')) {
            return redirect()->back()->withErrors(['photo.*' => "photo is required"]);
        }
        $request->validate([
            "title" => "required|min:10",
            "description" => "required|min:30",
            "photo.*" => "mimes:jpg,png,jpeg",
        ]);


        $fileNameArr = [];

        foreach ($request->file('photo') as $f) {
            $dir = "/public/article";
            $newFileName = uniqid() . "_article." . $f->getClientOriginalExtension();
            array_push($fileNameArr, $newFileName);
            Storage::putFileAs($dir, $f, $newFileName);
        }




        $article = new Article();
        $article->title = $request->title;
        $article->description = $request->description;
        $article->user_id = Auth::id();
        $article->save();

        foreach ($fileNameArr as $f) {
            $photo = new Photo();
            $photo->article_id = $article->id;
            $photo->location = $f;
            $photo->save();
        }

        return redirect()->route("article.index")->with("addStatus", $article->title . " is added");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view("article.edit", compact("article"));
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
            "title" => "required|min:10",
            "description" => "required|min:30",
        ]);

        $article->title = $request->title;
        $article->description = $request->description;
        $article->update();

        return redirect()->route("article.index")->with("addStatus", $article->title . " is updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {

        if (Gate::allows('article-delete', $article)) {
            //delete from local file
            foreach ($article->getPhotos as $p) {
                $dir = "/public/article/";
                Storage::delete($dir . $p->location);
            }

            //delete from db
            if (isset($article->getPhotos)) {
                $toDel = $article->getPhotos->pluck('id');
                Photo::destroy($toDel);
            }

            //delete article
            $article->delete();
            return redirect()->route("article.index")->with("deleteStatus", $article->title . " is deleted");
        } else {
            return abort(404);
        }
    }

    public function search(Request $request)
    {
        $key = $request->key;
        $articles = Article::where("title", "LIKE", "%$key%")->orWhere("description", "LIKE", "%$key%")->paginate(5);
        return view("article.index", compact("articles"));
    }
}
