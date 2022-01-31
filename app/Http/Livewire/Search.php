<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Search extends Component
{
    public $searchProduct;
    public $products;
    public $category = 'all';

    protected $rules = [
        'searchProduct' => 'string|nullable',
    ];

    public function render()
    {
        $this->validate();
        $searchProduct = '%' . $this->searchProduct . '%';
        
        if($this->category){
            if($this->category == 'all'){
                $this->products = Product::where('name', 'like', $searchProduct)->get();
            }else{
                $this->products = Product::where('food_category', $this->category)->get();
            }

            if(!empty($this->searchProduct)){
                $this->category = 'all';
                $this->products = Product::where('name', 'like', $searchProduct)->get();
            }
        }else{
            $this->products = Product::where('name', 'like', $searchProduct)->get();
        }



    return view('livewire.search');
}

}
