<?php

namespace App\Livewire;
use App\Models\Products;
use Livewire\Component;

class ProductsDisplay extends Component
{

    public function render()
    {
        $products = Products::where('archived', false)
                            // ->whereNotNull('price')
                            ->get();
        return view('livewire.products-display' , ['products' => $products]);
    }
}
