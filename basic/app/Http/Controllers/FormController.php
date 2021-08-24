<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    public function create(){
        return view("resquest-respond.form");
    }

    public function store(Request $request){

        return $request->validate([
            'name' => 'required|min:3|max:50',
            'price' => 'required|integer|min:1|max:10000',
            'stock' => 'required|integer|min:1|max:10'
        ]);

        $name = $request->name;
        $price = $request->price;
        $stock = $request->stock;

        return view("resquest-respond.respond",compact('name','price','stock'));
    }
}
