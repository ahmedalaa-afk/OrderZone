<?php

namespace App\Livewire\Vendor\Products;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductPhotos;
use App\Notifications\NewProductCreatedNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Http\Traits\makeSlug;

class ProductsCreate extends Component
{
    use WithFileUploads;
    use makeSlug;
    public $title, $description, $price, $category, $total, $quantity, $photos;
    public function rules()
    {
        return [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'category' => 'required|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'photos' => 'required',
            'photos.*' => 'mimes:png,jpg,jpeg'
        ];
    }
    public function submit()
    {
        $data = $this->validate($this->rules());
        $slug = $this->slugable(new Product(), $data['title']);
        if ($data) {
            // Create Product
            $product = Product::create([
                'title' => $data['title'],
                'slug' => $slug,
                'description' => $data['description'],
                'price' => $data['price'],
                'total' => $data['price'],
                'quantity' => $data['quantity'],
                'vendor_id' => Auth::guard('vendor')->user()->id,
            ]);
            // attach category to pivot table with product
            $product->categories()->attach($data['category']);
            // Photo Upload
            $path = 'products/images/' . str_replace(' ', '', $this->title) . '/';
            foreach ($data['photos'] as $photo) {
                $extension_file = $photo->getClientOriginalExtension();
                $file_name = uuid_create() . '.' . $extension_file;
                $photo->storeAs($path, $file_name, 'public');
                $newPath = $path . $file_name;
                ProductPhotos::create([
                    'photo' => $newPath,
                    'product_id' => $product->id
                ]);
            }
        }
        // Send Notification to Product Managers
        $admins = Admin::role('product_manager')->where('status', 'active')->get();
        Notification::send($admins, new NewProductCreatedNotification($product,Auth::guard('vendor')->user()));

        $this->reset(['title', 'description','price','total','category','quantity','photos']);
        $this->dispatch('createProduct');
        $this->dispatch('refreshProducts')->to(ProductsData::class);
    }
    public function render()
    {
        return view('vendor.products.products-create', ['categories' => Category::all()]);
    }
}
