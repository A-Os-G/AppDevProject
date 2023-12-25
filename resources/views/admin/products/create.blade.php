@extends('layouts.admin')

@section('pagecontent')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card-header">
            <h4> Add Products
                <a href="{{ url('admin/products') }}" class="btn btn-danger text-white btn-sm float-end">Back</a>
            </h4>
        </div>

        <div class="card-body">
            <form action="{{  url('admin/products')  }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                <option value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Product Name</label>
                            <input type="text" name="name" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Product Slug</label>
                            <input type="text" name="slug" class="form-control"/>
                        </div>
                        
                        <div class="mb-3">
                            <label>Select Brand</label>
                            <select name="brand" class="form-control">
                                @foreach ($brands as $b)
                                <option value="{{ $b->name }}">{{ $b->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>Small Description</label>
                            <textarea type="text" name="small_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Description</label>
                            <textarea type="text" name="description" class="form-control" rows="4"></textarea>
                        </div>
                            
                    </div>

                    <div class="tab-pane fade border p-3" id="seotag" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                        <div class="mb-3">
                            <label>Meta title</label>
                            <input type="text" name="meta_title" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Meta Description</label>
                            <textarea type="text" name="meta_description" class="form-control" rows="4"></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Meta keyword</label>
                            <textarea type="text" name="meta_keyword" class="form-control" rows="4"></textarea>
                        </div>

                    </div>

                    <div class="tab-pane fade border p-3" id="details" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                        <div class="mb-3">
                                <label>Original Price</label>
                                <input type="text" name="original_price" class="form-control"/>
                            </div>
                        <div class="mb-3">
                            <label>Selling Price</label>
                            <input type="text" name="selling_price" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Quantity</label>
                            <input type="number" name="quantity" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label>Trending</label>
                            <input type="checkbox" name="trending"/>
                        </div>
                        <div class="mb-3">
                            <label>Status</label>
                            <input type="checkbox" name="status"/>
                        </div>
                    </div>

                    <div class="tab-pane fade border p-3" id="image" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label >Upload Product Images</label>
                                <input type="file" name="image" id="image" class="form-control"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection