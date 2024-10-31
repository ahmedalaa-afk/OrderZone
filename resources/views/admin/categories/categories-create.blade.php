<x-show-modal id="createCategoryModal" title="New Category">
    <form wire:submit.prevent="submit" method="post">
        <div class="row">
            <div class="col-6">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" wire:model="name" wire:model='name'>
                @include('admin.error', ['property' => 'name'])
            </div>
            <div class="col-6">
                <label for="category">Parent:</label>
                <select name="parent" class="form-control" id="Category" wire:model="parent_id">
                    <option value="null">Select Parent Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @include('admin.error', ['property' => 'parent_id'])
            </div>
            <div class="col-6 mt-3">
                <label for="category">Department:</label>
                <select name="department" class="form-control" id="Department" wire:model="department_id">
                    <option value="null">Select Department</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @include('admin.error', ['property' => 'department_id'])
            </div>

            <div class="modal-footer mt-3">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">
                    <span class="text-center" wire:loading.remove>
                        Create
                    </span>
                    <div class="text-center" wire:loading wire:target='submit'>
                        <span class="spinner-border spinner-border-sm text-white" role="status">
                            <span class="visually-hidden"> Loading...</span>
                        </span>
                    </div>
                </button>
            </div>
        </div>
    </form>
</x-show-modal>