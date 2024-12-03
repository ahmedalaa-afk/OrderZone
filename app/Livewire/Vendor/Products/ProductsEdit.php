<?php

namespace App\Livewire\Vendor\Products;

use App\Http\Traits\makeSlug;
use App\Models\Product;
use App\Models\ProductPhotos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductsEdit extends Component
{
    use WithFileUploads;
    use makeSlug;
    protected $listeners = ['editProduct'];
    public $product;
    public $title, $description, $price, $category, $total, $quantity, $photos, $color, $brand, $size, $tag;
    public function editProduct($slug)
    {
        $this->product = Product::where('slug', $slug)->first();
        if ($this->product) {
            $this->title = $this->product->title;
            $this->description = $this->product->description;
            $this->price = $this->product->price;
            $this->category = $this->product->categories->pluck('id')->toArray();
            $this->color = $this->product->color_id;
            $this->brand = $this->product->brand_id;
            $this->size = $this->product->size_id;
            $this->tag = $this->product->tag_id;
            $this->photos = $this->product->photos;
            $this->quantity = $this->product->quantity;
        }

        $this->resetValidation();
        $this->dispatch('editProductModal');
    }
    public function rules()
    {
        return [
            'title' => 'nullable',
            'description' => 'nullable',
            'category' => 'nullable',
            'price' => 'nullable',
            'quantity' => 'nullable',
            'photos' => 'nullable',
            'photos.*' => 'nullable',
            'brand' => 'nullable',
            'color' => 'nullable',
            'size' => 'nullable',
            'tag' => 'nullable',
        ];
    }
    public function messages()
    {
        return [
            'photos.*' => 'The photo field is required',
        ];
    }

    public function submit()
    {
        $data = $this->validate($this->rules(), $this->messages());
        if ($data) {
            // update Product
            $this->product->update([
                'title' => $data['title'] ?? $this->product->title,
                'slug' => $this->product->slug,
                'description' => $data['description'] ?? $this->product->description,
                'price' => $data['price'] ?? $this->product->price,
                'total' => $data['price'] ?? $this->product->total,
                'quantity' => $data['quantity'] ?? $this->product->quantity,
                'vendor_id' => $this->product->vendor_id,
                'color_id' => $data['color'] ?? $this->product->color_id,
                'tag_id' => $data['tag'] ?? $this->product->tag_id,
                'size_id' => $data['size'] ?? $this->product->size_id,
                'brand_id' => $data['brand'] ?? $this->product->brand_id,
            ]);
            dd($data);
            // attach category to pivot table with product
            $this->product->categories()->attach($data['category']);
            // Photo Upload
            $path = 'vendors/' . str_replace(' ', '', Auth::guard('vendor')->user()->name) . '/' . 'products/images/' . str_replace(' ', '', $this->title) . '/';
            foreach ($data['photos'] as $photo) {
                $extension_file = $photo->getClientOriginalExtension();
                $file_name = uuid_create() . '.' . $extension_file;
                $photo->storeAs($path, $file_name, 'public');
                $newPath = $path . $file_name;
                ProductPhotos::create([
                    'photo' => $newPath,
                    'product_id' => $this->product->id
                ]);
            }
        }
        // Product Brand
        $this->product->brands()->attach($data['brand']);

        $this->reset(['title', 'description', 'price', 'total', 'category', 'quantity', 'photos', 'tag', 'color', 'size', 'brand']);
        $this->dispatch('editProductModal');
        $this->dispatch('refreshProducts')->to(ProductsData::class);
    }
    public function render()
    {
        return view('vendor.products.products-edit');
    }
}
