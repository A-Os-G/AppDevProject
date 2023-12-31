<?php

namespace App\Livewire\Admin\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\Volt\Compilers\ProtectedProperties;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    Protected $paginationTheme = "bootstrap";
    public $name,$slug,$status,$brand_id;

    public function rules(){
        return [
            'name' => 'required|string',
            'slug' => 'required|string',
            'status' => 'nullable',
        ];
    }
    public function resetInput(){
        $this->name = Null;
        $this->slug = Null;
        $this->status = Null;
        $this->brand_id = Null;
    }
    public function storeBrand(){

        $validatedData = $this->validate();
        Brand::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand Added Successfully');
        $this->resetInput();

    }
    public function editBrand(int $brand_id) {
        
        $this->brand_id = $brand_id;
        $brand = Brand::findOrFail($brand_id);
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->status = $brand->status;

    }
    public function updateBrand() {

        $validatedData = $this->validate();
        Brand::findOrFail($this->brand_id)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'status' => $this->status == true ? '1':'0',
        ]);
        session()->flash('message','Brand Updated Successfully');
        $this->resetInput();
    }
    public function deleteBrand($brand_id){
        $this->brand_id = $brand_id;

    }

    public function destoryBrand(){
        Brand::findOrFail($this->brand_id)->delete();
        session()->flash('message','Brand Deleted Successfully');
        $this->resetInput();
    }
    

    public function render()
    {
        $brands = Brand::orderBy('id','desc')->paginate(10);
        return view('livewire.admin.brand.index',['brands' => $brands])->extends('layouts.admin')->section('pagecontent');
    }
}
