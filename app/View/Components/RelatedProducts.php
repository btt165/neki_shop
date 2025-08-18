<?php

namespace App\View\Components;

use App\Models\Product;
use Illuminate\View\Component;

class RelatedProducts extends Component
{
    public $productId;
    public $relatedProducts; 

    public function __construct($productId)
    {   
        $this->productId = $productId;
        
        if($productId){
            $currentProduct = Product::find($productId);
        
            if($currentProduct){
                $this->relatedProducts = Product::where('category_id', $currentProduct->category_id)
                    ->where('id', '!=', $productId)
                    ->with('category')
                    ->limit(10)
                    ->get();
                return;
            } 
        }

        $this->relatedProducts = Product::with('category')
        ->inRandomOrder()
        ->limit(10)
        ->get();
    }

    

    public function render()
    {
        return view('components.related-products');
    }
}
