<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(["create","store"]);
        $this->middleware('isMe')->only(["create"]);
    }

    public function create()
    {
        return view("resquest-respond.form");
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|min:3|max:50',
            'price' => 'required|integer|min:1|max:10000',
            'stock' => 'required|integer|min:1|max:10'
        ]);

        $item = new Item();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();

        return redirect()->route("form.create")->with("status", $request->name . " is added");
    }

    public function destroy($id) {
        $currentItem = Item::find($id);
        $currentItem->delete();
        return redirect()->route("form.create")->with("deleteStatus", $currentItem->name. " is deleted");
    }

    public function edit($id) {
        $currentItem = Item::find($id);
        return view("resquest-respond.edit",compact('currentItem'));
    }

    public function update(Request $request,$id) {
        $currentItem = Item::find($id);
        $currentItem->name = $request->name;
        $currentItem->price = $request->price;
        $currentItem->stock = $request->stock;
        $currentItem->update();
        return redirect()->route('form.create')->with('updateStatus',$currentItem->name . " is updated");
    }
}
