
<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="storeBrand">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="">Brand Name</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Brand Slug</label>
                        <input type="text"  wire:model.defer="slug"class="form-control">
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror

                    </div>

                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" wire:model.defer="status">
                        @error('status') <small class="text-danger">{{$message}}</small> @enderror

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Update brand Modal -->
<div wire:ignore.self class="modal fade" id="updateBrandModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="updateBrand">
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="">Brand Name</label>
                        <input type="text" wire:model.defer="name" class="form-control">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="">Brand Slug</label>
                        <input type="text"  wire:model.defer="slug"class="form-control">
                        @error('slug') <small class="text-danger">{{$message}}</small> @enderror

                    </div>

                    <div class="mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" wire:model.defer="status" style="width:70px;height=70px;">
                        @error('status') <small class="text-danger">{{$message}}</small> @enderror

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>

<!-- Delet brand Modal -->
<div wire:ignore.self class="modal fade" id="deleteBrandModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">delete Brand</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent="destoryBrand">
                <div class="modal-body">
                    <h4>Are you sure you want to delete this brand?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-danger" data-bs-dismiss="modal">Delete</button>
                </div>
            </form>

        </div>
    </div>
</div>
