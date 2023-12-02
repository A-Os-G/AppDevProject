




<div>
    @include('livewire.admin.brand.modal-form')

    <div class= "row">
            <div class="col-md-12">

                @if(session('message'))
                <div class="alert alert-success">{{session('message')}}</div>
                @endif
                
                <div class="card">
                    <div class="card-header">
                        <h3>Brands List
                            <a href="#" data-bs-toggle="modal" data-bs-target="#addBrandModal" class="btn btn-primary btn-sm float-end text-white">Add Brands</a>
                        </h3>
                    </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($brands as $b)
                            <tr>
                                <td>{{ $b->id }}</td>
                                <td>{{ $b->name }}</td>
                                <td>{{ $b->slug }}</td>
                                <td>{{ $b->status == '1' ? 'Hidden':'visiable' }}</td>
                                <td>
                                    <a href="#" wire:click="editBrand({{ $b->id }})" data-bs-toggle="modal" data-bs-target="#updateBrandModel"  class="btn btn-success">Edit</a>
                                    <a href="#" wire:click="deleteBrand({{ $b->id }})" data-bs-toggle="modal" data-bs-target="#deleteBrandModel" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Brands Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div> {{ $brands->links() }}</div>
                </div>

            </div>
        </div>
    </div>
</div>
