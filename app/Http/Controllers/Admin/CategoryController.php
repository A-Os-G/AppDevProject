<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile\getClientOriginalExtension;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

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
        $category->status = $request->status == true ? '0':'1'; 
        
        $category->save();
        
        return redirect('admin/category')->with('message',"Category Added Successfully");


    }

    public function edit(Category $category) {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $category){

        $category = Category::findOrFail($category);

        $category->name = $request->name;
        $category->slug = $request->slug; 
        $category->description =  $request->description; 
            
        if ($request->hasFile('image')){
            
            $path ='pics/category/'.$category->image;
                if(File::exists($path)){
                    File::delete($path);
                }

                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time().'.'.$ext;  
                $file->move('pics/category/',$filename);  
                $category->image = $filename;
            }    
    
    
            $category->meta_title =  $request->meta_title; 
            $category->meta_keyword =  $request->meta_keyword; 
            $category->meta_description =  $request->meta_description;
            $category->status = $request->status == true ? '0':'1'; 
            
            $category->update();
            
            return redirect('admin/category')->with('message',"Category Updated Successfully");
    
        
    }
}


