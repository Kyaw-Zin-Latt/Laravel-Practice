<?php

namespace App\Http\Controllers;

use App\Article;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->hasFile('photo')){
            return redirect()->back()->withErrors(['photo.*' => "photo is required"]);
        }
        $request->validate([
            "photo.*" => "mimes:jpg,png,jpeg",
        ]);


        $fileNameArr = [];

        foreach ($request->file('photo') as $f) {
            $dir = "/public/article";
            $newFileName = uniqid()."_article.".$f->getClientOriginalExtension();
            array_push($fileNameArr,$newFileName);
            Storage::putFileAs($dir,$f,$newFileName);
        }


        foreach ($fileNameArr as $f){
            $photo = new Photo();
            $photo->article_id = $request->article_id;
            $photo->location = $f;
            $photo->save();
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        $photo->delete();
        return redirect()->back();
    }
}
