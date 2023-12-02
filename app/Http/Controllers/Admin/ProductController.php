<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use  App\Models\Brand;
use  App\Models\Product;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\File;
use Livewire\WithFileUploads;
 
class ProductController extends Controller
{
    use WithFileUploads;
    public function index(){
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function create(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.products.create', compact('categories','brands'));

    }

    public function store(Request $request){

        
        $category = Category::findOrFail($request->category_id);
        
        $product = $category->products()->create([
            'category_id' => $request->category_id,
            'name'=> $request->name,
            'slug'=> $request->slug,
            'brand'=> $request->brand,
            'small_description'=> $request->small_description,
            'description'=> $request->description,
            'original_price'=> $request->original_price,
            'selling_price'=> $request->selling_price,
            'quantity'=> $request->quantity,
            'trending'=> $request->trending == true ? '1' : '0',
            'status'=> $request->status == true ? '1' : '0',
            'meta_title'=> $request->meta_title,
            'meta_keyword'=> $request->meta_keyword,
            'meta_description'=> $request->meta_description,
        ]);

            if($request->hasFile('image')){
                $uploadPath = 'pics/product/';
                $i = 1;
                foreach($request->file("image") as $key => $imageFile) {
                    $extention = $imageFile[$key]->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile[$key]->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }
            
        return redirect('admin/products')->with('message',"Product Added Successfully");
    }

    public function edit(int $product_id){
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($product_id);
        return view('admin.products.edit',compact('categories','brands','product'));
    }
    public function update(Request $request, int $product_id){

        $product = Product::where('id', $product_id)->first();

        if($product){
            $product->update([
                'category_id' => $request->category_id,
                'name'=> $request->name,
                'slug'=> $request->slug,
                'brand'=> $request->brand,
                'small_description'=> $request->small_description,
                'description'=> $request->description,
                'original_price'=> $request->original_price,
                'selling_price'=> $request->selling_price,
                'quantity'=> $request->quantity,
                'trending'=> $request->trending == true ? '1' : '0',
                'status'=> $request->status == true ? '1' : '0',
                'meta_title'=> $request->meta_title,
                'meta_keyword'=> $request->meta_keyword,
                'meta_description'=> $request->meta_description,
            ]);

            if($request->hasFile('image')){
                $uploadPath = 'pics/product/';
                $i = 1;
                foreach($request->file("image") as $key => $imageFile) {
                    $extention = $imageFile[$key]->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile[$key]->move($uploadPath, $filename);
                    $finalImagePathName = $uploadPath.$filename;

                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }   
            return redirect('admin/products')->with('message',"Product Updated Successfully");
        }else{
            return redirect('admin/products')->with('message','No Such Product Id Found');
        }
    }
    public function destroy(int $product_id){
        $product = Product::findOrFail($product_id);
        $product->delete();
        return redirect('admin/products')->with('message','Product Deleted');

        
    }


}
