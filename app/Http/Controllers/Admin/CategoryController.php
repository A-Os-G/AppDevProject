<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile\getClientOriginalExtension;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index');
    } 
    public function create() {

        return view('admin.category.create');

    }
//     public function store(CategoryFormRequest $request) {

//         dd('heer');
    
//         $validatedData = $request->validated();
//         $category = new Category;
//         $category->name = $validatedData['name'];
//         $category->slug = Str::slug($validatedData['slug']); 
//         $category->description = $validatedData['description']; 

//         dd($category);
        
//         if ($request->hasFile('image')){
//             $file = $request->file('image');
//             $ext = $file->getClientOrginialExtension();
//             $filename = time().'.'.$ext;  
//             $file->move('pics/category/',$filename);  
//             $category->image = $filename;
//         }      
//         $category->meta_title = $validatedData['meta_title']; 
//         $category->meta_keyword = $validatedData['meta_keyword']; 
//         $category->meta_description = $validatedData['meta_description'];
//         $category->status = $request->status == true ? '1':'0'; 

//         $category->save();
//         dd($category);

//         return redirect('admin/category');


//     }

public function store(Request $request) {
    
    // $request->validate(
    //     [
    //         'name' => ['required','string'],
    //         'slug' => ['required','string'],
    //         'descritpion' => ['required'],
    //         'image' => [/*'nullabe'*/'mimes:jpg,jpeg,png'],
    //         'meta_title' => ['required','string'],
    //         'meta_keyword' => ['required','string'],
    //         'meta_description' => ['required','string']
    //         ]);
    // dd("here");

    $category = new Category;
    $category->name = $request->name;
    $category->slug = $request->slug; 
    $category->description =  $request->description; 
        
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;  
            $file->move('pics/category/',$filename);  
            $category->image = $filename;
        }    


        $category->meta_title =  $request->meta_title; 
        $category->meta_keyword =  $request->meta_keyword; 
        $category->meta_description =  $request->meta_description;
        $category->status = $request->status == true ? '1':'0'; 
        
        $category->save();
        
        return redirect()->back();


    }
}


