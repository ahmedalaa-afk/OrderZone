<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class DiscountEnded extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'discount-ended';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if dicount time ended on products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::whereHas('discount',function($query){
            $query->where('end_at','<',now());
        })->get();
        
        foreach ($products as $product){
            $product->discount->delete();
            $product->total = $product->price;
            $product->save();
        }
    }
}
