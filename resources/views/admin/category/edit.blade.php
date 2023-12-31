@extends('layouts.admin')

@section('pagecontent')

<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card-header">
            <h4> Add Category
                <a href="{{ url('admin/category') }}" class="btn btn-primary text-white btn-sm float-end btn-danger">BACK</a>
            </h4>
        </div>
        <div class="card-body">
            <form action="{{  url('admin/category/'.$category->id) }}" method="POST" enctype='multipart/form-data'>
                @csrf
                @method('PUT')

                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label >Name</label>
                        <input type="text" name="name"  value="{{ $category->name }}" class="form-control"/>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" value="{{ $category->slug }}" class="form-control"/>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label >description</label>
                        <textarea name="description" class="form-control" rows="3">{{ $category->description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" value="{{ $category->image }}" class="form-control"/>
                        <img src="{{ url($category->image) }}" width="100px" height="100px">

                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label><br/>
                        <input type="checkbox"  name="status" {{ $category->status == '1' ? 'checked' : '' }} />
                    </div>

                    <div class="col-md-12">
                        <h4>Tags</h4>
</br>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" value="{{ $category->meta_title }}" class="form-control"/>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3">{{ $category->meta_keyword }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Descritpion</label>
                        <textarea name="meta_description" class="form-control" rows="3">{{ $category->meta_description }}</textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
@endsection