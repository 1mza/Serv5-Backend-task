<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class SearchProduct extends Component
{
    public string $search = '';
    public $products;

    public function updateSearch($value)
    {
        $this->search = $value;
    }

    public function render()
    {
        $searchedColumns = ['title', 'price', 'details', 'brand'];
        if (strlen($this->search) >= 1) {
            $this->products = Product::where(function ($query) use ($searchedColumns) {
                foreach ($searchedColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $this->search . '%');
                }
            })->get();
        } else {
            $this->products = [];
        }
        return view('livewire.search-product', ['products' => $this->products]);
    }
}
