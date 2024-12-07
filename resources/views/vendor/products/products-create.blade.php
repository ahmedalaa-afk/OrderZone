<x-show-modal id="createModal" title="New Product">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form wire:submit.prevent="submit" method="post">
        <div class="row">
            <div class="col-6">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" wire:model="title">
                @error('title')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-12 mt-3">
                <label for="description">Description:</label>
                <textarea id="description" class="form-control" rows="2" style="resize: none"
                    wire:model="description"></textarea>
                @error('description')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6 mt-3">
                <label for="category">Category:</label>
                <select name="" class="form-control" id="Category" wire:model='category'>
                    @foreach ($categories as $category)
                    <option value="{{$category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6 mt-3">
                <label for="brand">Brand:</label>
                <select name="" class="form-control" id="Brand" wire:model='brand'>
                    @foreach ($brands as $brand)
                    <option value="{{$brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
                @error('brand')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6 mt-3">
                <label for="price">price:</label>
                <input type="number" class="form-control" min="1" id="price" wire:model="price">
                @error('price')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-12 mt-3">
                <label for="photos">Photos:</label>
                <input type="file" class="form-control" name="photos" id="photos" multiple wire:model="photos">

                @error('photos')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                @error('photos.*')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6 mt-3">
                <label for="size">size:</label>
                <select name="" class="form-control" id="size" wire:model='size'>
                    @foreach ($sizes as $size)
                    <option value="{{$size->id }}">{{ $size->size }}</option>
                    @endforeach
                </select>
                @error('size')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6 mt-3">
                <label for="color">Color:</label>
                <select name="" class="form-control" id="color" wire:model='color'>
                    @foreach ($colors as $color)
                    <option value="{{$color->id }}">{{ $color->color }}</option>
                    @endforeach
                </select>
                @error('color')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <div class="col-6 mt-3">
                <label for="tag">Tag:</label>
                <select name="" class="form-control" id="tag" wire:model='tag'>
                    @foreach ($tags as $tag)
                    <option value="{{$tag->id }}">{{ $tag->tag }}</option>
                    @endforeach
                </select>
                @error('tag')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="col-6 mt-3">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" min="1" id="quantity" wire:model="quantity">
                @error('quantity')
                    <span class="text-danger">{{$message}}</span>
                @enderror
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