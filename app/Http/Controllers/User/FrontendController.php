<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use PhpParser\Builder\Function_;

class FrontendController extends Controller
{
    public function categories(){
        $categories = Category::where('status','0')->get();
        return view('contents.shop', compact('categories'));
    }

    public function products($category_slug){
        $category = Category::where('slug', $category_slug)->first(); 
        if($category){
            $products = $category->products()->get();
            return view('contents.products', compact('products', 'category'));
        }else{
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug){
        $category = Category::where('slug', $category_slug)->first(); 
        if($category){
            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();
            if($product){
                return view('contents.views', compact('product', 'category'));
            }else{
                return redirect()->back();
            }

            
        }else{
            return redirect()->back();
        }
    }
}
