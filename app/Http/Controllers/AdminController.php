<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function view_category(){
        $categories = Category::all();
        return view('admin.category',['categories'=>$categories]);
    }
    public function store(Request $request){
        //dd($request->all());
        $category = new Category();
        $category->create($request->all());
        return redirect()->back()->with('success','Сохранено!');
    }
}
