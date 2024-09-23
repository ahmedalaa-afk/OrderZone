<x-show-modal id="createModal" title="New Product">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form wire:submit.prevent="submit" method="post">
        <div class="row">
            <div class="col-6">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" wire:model="title">
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>
            <div class="col-12 mt-3">
                <label for="description">Description:</label>
                <textarea id="description" class="form-control" rows="2" style="resize: none"
                    wire:model="description"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
            <div class="col-6 mt-3">
                <label for="category">Category:</label>
                <select name="" class="form-control" id="Category" wire:model='category'>
                    @foreach ($categories as $category)
                    <option value="{{$category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
            </div>
            <div class="col-6 mt-3">
                <label for="price">price:</label>
                <input type="number" class="form-control" min="1" id="price" wire:model="price">
                <x-input-error :messages="$errors->get('price')" class="mt-2" />
            </div>
            <div class="col-12 mt-3">
                <label for="photos">Photos:</label>
                <input type="file" class="form-control" name="photos" id="photos" multiple wire:model="photos">

                <x-input-error :messages="$errors->get('photos')" class="mt-2" />
                <x-input-error :messages="$errors->get('photos.*')" class="mt-2" />
            </div>

            <div class="col-6 mt-3">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" min="1" id="quantity" wire:model="quantity">
                <x-input-error :messages="$errors->get('quantity')" class="mt-2" />
            </div>
            <div class="modal-footer">
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