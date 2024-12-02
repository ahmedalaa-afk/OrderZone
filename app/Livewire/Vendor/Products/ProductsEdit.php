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
    public $slug, $product;
    public $title, $description, $price, $category, $total, $quantity, $photos, $color, $brand, $size, $tag;
    public function editProduct($slug)
    {
        $this->slug = $slug;
        $this->product = Product::where('slug', $this->slug)->first();
        if ($this->product) {
            $this->title = $this->product->title;
            $this->description = $this->product->description;
            $this->price = $this->product->price;
            $this->category = $this->product->categories->pluck('id')->toArray();
            $this->color = $this->product->colors;
            $this->brand = $this->product->brand->id;
            $this->size = $this->product->size->id;
            $this->tag = $this->product->tag->id;
            $this->photos = ProductPhotos::where('product_id', $this->product->id)->get();
        }
    }
    public function rules()
    {
        return [
            'product.title' => 'nullable|min:5',
            'product.description' => 'nullable|min:10',
            'product.category' => 'nullable|string',
            'product.price' => 'nullable|numeric',
            'product.quantity' => 'nullable|numeric',
            'product.photos' => 'nullable',
            'product.photos.*' => 'mimes:png,jpg,jpeg',
            'product.brand' => 'nullable|string|exists:brands,id',
            'product.color' => 'nullable|string|exists:colors,id',
            'product.size' => 'nullable|string|min:1|max:2|exists:sizes,id',
            'product.tag' => 'nullable|string|exists:tags,id',
        ];
    }
    public function submit()
    {
        $data = $this->validate($this->rules());
        if ($data) {
            // Update Product
            $this->product->update([
                'title' => $data['title'],
                'slug' => $this->slug,
                'description' => $data['description'],
                'price' => $data['price'],
                'total' => $data['price'],
                'quantity' => $data['quantity'],
                'vendor_id' => Auth::guard('vendor')->user()->id,
                'tag_id' => $data['tag'],
            ]);
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

        $this->reset(['title', 'description', 'price', 'total', 'category', 'quantity', 'photos']);
        $this->dispatch('editProduct');
        $this->dispatch('refreshProducts')->to(ProductsData::class);
    }
    public function render()
    {
        $this->product = Product::where('slug', $this->slug)->first();
        return view('vendor.products.products-edit', ['product' => $this->product]);
    }
}
