<div>
    <div class="mb-3">
        <input type="search" class="form-control w-25" wire:model.live="search" id="" placeholder="Search...">
    </div>
    @if (count($products) > 0)
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Quantity</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        {{ $product->slug }}
                    </td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->total }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        <a class="btn btn-danger" href="#" wire:click.prevent="$dispatch('deleteProduct',{slug:'{{$product->slug}}'})">
                            <i class="bx bx-trash me-1"></i> Delete
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