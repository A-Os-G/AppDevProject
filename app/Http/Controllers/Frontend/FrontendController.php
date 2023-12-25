<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function categories(){
        $categories = Category::all();  
        return view('frontend.collections.category.index',compact('categories'));
    }
}
