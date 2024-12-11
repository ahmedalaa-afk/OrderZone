<?php

namespace App\Livewire\Vendor\Products;

use App\Http\Traits\makeSlug;
use App\Models\Product;
use App\Models\ProductPhotos;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProductsUpdate extends Component
{
    use makeSlug, WithFileUploads;
    protected $listeners = ['editProduct'];
    public $product;
    public $title, $description, $price, $category, $total, $quantity, $photos, $color, $brand, $size, $tag;
    public function rules()
    {
        return [
            'title' => 'nullable|min:5',
            'description' => 'nullable|min:10',
            'category' => 'nullable',
            'price' => 'nullable|numeric',
            'quantity' => 'nullable|numeric',
            'photos' => 'nullable',
            'photos.*' => 'mimes:png,jpg,jpeg',
            'brand' => 'nullable|string|exists:brands,id',
            'color' => 'nullable|exists:colors,id',
            'size' => 'nullable|string|min:1|exists:sizes,id',
            'tag' => 'nullable|exists:tags,id',
        ];
    }
    public function editProduct($slug)
    {
        $this->product = Product::where('slug', $slug)->first();
        $this->title = $this->product->title;
        $this->description = $this->product->description;
        $this->price = $this->product->price;
        $this->category = $this->product->category_id;
        $this->color = $this->product->color_id;
        $this->brand = $this->product->brand_id;
        $this->size = $this->product->size_id;
        $this->tag = $this->product->tag_id;
        $this->quantity = $this->product->quantity;
        $this->dispatch('updateProductModal');
    }
    public function submit()
    {
        $data = $this->validate($this->rules());
        if ($data) {
            $this->product->update([
                'title' => $data['title'] ?? $this->product->title,
                'slug' => $this->product->slug,
                'description' => $data['description'] ?? $this->product->description,
                'price' => $data['price'] ?? $this->product->price,
                'total' => $data['price'] ?? $this->product->price,
                'quantity' => $data['quantity'] ?? $this->product->quantity,
                'color_id' => $data['color'] ?? $this->product->color_id,
                'tag_id' => $data['tag'] ?? $this->product->tag_id,
                'size_id' => $data['size'] ?? $this->product->size_id,
                'category_id' => $data['category'] ?? $this->product->category_id,
                
            ]);
            // Photo Upload
            if (!empty($data['photos'])) {
                $this->product->photos()->delete();

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
            $this->product->brands()->sync($data['brand']);

            $this->reset(['title', 'description', 'price', 'total', 'category', 'quantity', 'photos']);
            $this->dispatch('updateProductModal');
            $this->dispatch('refreshProducts')->to(ProductsData::class);
        }
    }
    public function render()
    {
        return view('vendor.products.products-update');
    }
}
