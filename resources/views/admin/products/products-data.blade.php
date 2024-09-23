<div>
    <div class="mb-3 row">
        <div class="col-4">

            <input type="search" class="form-control" wire:model.live="search" id="" placeholder="Search...">
        </div>
        <div class="col-8">
            <div class="btn-group">
                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    {{$this->key == '' ? SortBy : ucfirst($this->key)}}

                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#"
                            wire:click.prevent="$dispatch('sortProducts',{key:'title'})">Title</a></li>
                    <li><a class="dropdown-item" href="#"
                            wire:click.prevent="$dispatch('sortProducts',{key:'price'})">Price</a></li>
                    <li><a class="dropdown-item" href="#"
                            wire:click.prevent="$dispatch('sortProducts',{key:'created_at'})">Created_at</a></li>

                </ul>
            </div>
        </div>
    </div>
    @if (count($products) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->total }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a class="btn btn-md btn-primary" href="#"
                            wire:click.prevent="$dispatch('changeStatus',{slug:'{{$product->slug}}'})">
                            <i class='bx bxs-info-circle'></i> {{$product->status}}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-md btn-primary" href="#"
                            wire:click.prevent="$dispatch('productDetails',{slug:'{{$product->slug}}'})">
                            <i class='bx bxs-info-circle'></i> Details
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
    @else
    <div class="text-danger">No Products.</div>
    @endif
</div>