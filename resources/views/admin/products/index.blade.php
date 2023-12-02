@extends('layouts.admin')

@section('pagecontent')

<div class="row">
    <div class="col-md-12 grid-margin">
        @if(session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="card-header">
            <h4>Products
                <a href="{{ url('admin/products/create') }}" class="btn text-white btn-sm float-end btn-primary">Add Products</a>
            </h4>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category_id</th>
                        <th>Name</th>
                        <th>selling_price</th>
                        <th>quantity</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>
                            @if($p->category)
                                {{ $p->category->name }}
                            @else
                                No Category
                            @endif
                        </td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->selling_price }}</td>
                        <td>{{ $p->quantity }}</td>
                        <td>{{ $p->status == '1' ? 'Hidden':'visiable' }}</td>
                        <td>
                            <a href="{{ url('admin/products/'. $p->id.'/edit') }}" class="btn btn-success">Edit</a>
                            <a href="{{ url('admin/products/'. $p->id.'/delete') }}" onclick="return confirm('Are you Sure, you want to delete this data?')"class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">No Products Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection