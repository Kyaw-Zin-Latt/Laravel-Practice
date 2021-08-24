<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function detail($id){
        return view("detail",compact('id'));
    }
}
