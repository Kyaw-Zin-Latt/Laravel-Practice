<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::latest("id")->paginate("5");
        return view("category.index",compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            "title" => "required|min:3|max:200|unique:categories,title",
            "photo" => "required|mimetypes:image/jpeg,image/png,image/jpg|file|max:2500",
            "icon" => "required|mimetypes:image/jpeg,image/png,image/jpg|file|max:2500",
        ]);

        $dir="public/category/photo/";
        $newNamePhoto = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();
        $request->file("photo")->storeAs($dir,$newNamePhoto);

        $dir="public/category/icon/";
        $newNameIcon = uniqid()."_photo.".$request->file("icon")->getClientOriginalExtension();
        $request->file("icon")->storeAs($dir,$newNameIcon);

        $category = new Category();
        $category->title = $request->title;
        $category->category_photo = $newNamePhoto;
        $category->category_icon = $newNameIcon;
        if ($request->publish){
            $category->publish = $request->publish;
        }
        $category->user_id = Auth::id();
        $category->save();

        return redirect()->route("category.index")->with("message","<b>$request->title</b> is added.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view("category.edit",compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            "title" => "required|min:3|max:200|unique:categories,title,".$category->title,
            "photo" => "mimetypes:image/jpeg,image/png,image/jpg|file|max:2500",
            "icon" => "mimetypes:image/jpeg,image/png,image/jpg|file|max:2500",
        ]);

        if (isset($request->photo)) {
            $dir="public/category/photo/";
            Storage::delete($dir.$category->category_photo);

            $dir="public/category/photo/";
            $newNamePhoto = uniqid()."_photo.".$request->file("photo")->getClientOriginalExtension();
            $request->file("photo")->storeAs($dir,$newNamePhoto);

        } else {
            $newNamePhoto = $category->category_photo;
        }

        if (isset($request->icon)) {
            $dir="public/category/icon/";
            Storage::delete($dir.$category->category_icon);

            $dir="public/category/icon/";
            $newNameIcon = uniqid()."_photo.".$request->file("icon")->getClientOriginalExtension();
            $request->file("icon")->storeAs($dir,$newNameIcon);
        } else {
            $newNameIcon = $category->category_icon;
        }

        $category->title = $request->title;
        $category->category_photo = $newNamePhoto;
        $category->category_icon = $newNameIcon;
        if ($request->publish){
            $category->publish = $request->publish;
        }
        $category->user_id = Auth::id();
        $category->update();

        return redirect()->route("category.index")->with("message","<b>$request->title</b> is updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $dir="public/category/photo/";
        Storage::delete($dir . $category->category_photo);

        $dir="public/category/icon/";
        Storage::delete($dir . $category->category_icon);

        $category->delete();

        return redirect()->route("category.index")->with("message","<b>$category->title</b> is deleted.");

    }
}
