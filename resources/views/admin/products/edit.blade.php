@extends('layouts.admin')

@section('pagecontent')

<div class="row">
    <div class="col-md-12">
        <div class="card-header">
            <h4> Edit Products
                <a href="{{ url('admin/products') }}" class="btn btn-danger text-white btn-sm float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{  url('admin/products/'.$product->id)  }}" method="POST" enctype="mulipart/form-data">
                @csrf
                @method('PUT')
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag" type="button" role="tab" aria-controls="seotag" aria-selected="false">SEO Tags</button>
                        <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
                        <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Image</button>
                    </div>
                </nav>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade border p-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                        <div class="mb-3 mt-3">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $c)
                                    <option value="{{ $c->id }}" {{ $c->id == $product->category_id ? 'selected' : '' }} >{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" value="{{$product->name}}" name="name" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Product Slug</label>
                            <input type="text" name="slug" value="{{$product->slug}}" class="form-control"/>
                        </div>
                        
                        <div class="mb-3">
                            <label>Select Brand</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $b)
                                <option value="{{ $b->name }}" {{ $b->name == $product->$b ? 'selected' : '' }}>{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Small Description</label>
                            <textarea type="text" name="small_description" class="form-control" rows="4">{{$product->small_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control" rows="4">{{$product->description}}</textarea>
                        </div>
                            
                    </div>

                    <div class="tab-pane fade border p-3" id="seotag" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                        <div class="mb-3">
                            <label>Meta title</label>
                            <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea type="text" name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta keyword</label>
                            <textarea type="text" name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                        </div>

                    </div>

                    <div class="tab-pane fade border p-3" id="details" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="mb-3">
                                <label>Original Price</label>
                                <input type="text" name="original_price" value="{{$product->original_price}}" class="form-control"/>
                            </div>
                        <div class="mb-3">
                            <label>Selling Price</label>
                            <input type="text" name="selling_price" value="{{$product->selling_price}}" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Quantity</label>
                            <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Trending</label>
                            <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked' : ''}} />
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status" {{$product->status == '1' ? 'checked' : ''}}/>
                        </div>
                    </div>

                    <div class="tab-pane fade border p-3" id="image" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                            <label >Upload Product Images</label>
                            <input type="file" name="image[]" multiple class="form-control">
                        </div>
                        <div>
                            @if($product->productImages)
                                @foreach($product->productImages as $image)
                            <img src="{{ asset('$image->image') }}" alt="Img" style="width: 80px; height:80px;" class="me-4 border">
                                @endforeach
                            @else
                            <h5>No Image Added</h5>
                            @endif
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection