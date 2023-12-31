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
            <form action="{{  url('admin/category') }}" method="POST" enctype='multipart/form-data'>
                @csrf

                <div class="row">
                    
                    <div class="col-md-6 mb-3">
                        <label >Name</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control"/>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label >description</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control"/>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label>Status</label><br/>
                        <input type="checkbox" name="status" />
                    </div>

                    <div class="col-md-12">
                        <h4>Tags</h4>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Title</label>
                        <input type="text" name="meta_title" class="form-control"/>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Keyword</label>
                        <textarea name="meta_keyword" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label>Meta Descritpion</label>
                        <textarea name="meta_description" class="form-control" rows="3"></textarea>
                    </div>

                    <div class="col-md-12 mb-3">
                        <button type="submit" class="btn btn-primary float-end">Save</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</div>
@endsection