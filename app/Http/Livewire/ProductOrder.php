<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductOrder extends Component
{
    public $category = 'all';
    public $order_asc_desc = 'default';
    public $products;

    public function render()
    {
        $this->orderBy();
        return view('livewire.product-order');
    }

    public function orderBy(){

        if($this->category == 'all'){
            switch($this->order_asc_desc){
                case 'qty_asc':
                $this->products = Product::orderBy('qty', 'asc')->get();
                break;
                case 'qty_desc':
                $this->products = Product::orderBy('qty', 'desc')->get();
                break;
                case 'price_asc':
                $this->products = Product::orderBy('price', 'asc')->get();
                break;
                case 'price_desc':
                $this->products = Product::orderBy('price', 'desc')->get();
                break;
                default:
                $this->products = Product::all();
                break;
            }
        }else{
            switch($this->order_asc_desc){
                case 'qty_asc':
                $this->products = Product::where('food_category', $this->category)->orderBy('qty', 'asc')->get();
                break;
                case 'qty_desc':
                $this->products = Product::where('food_category', $this->category)->orderBy('qty', 'desc')->get();
                break;
                case 'price_asc':
                $this->products = Product::where('food_category', $this->category)->orderBy('price', 'asc')->get();
                break;
                case 'price_desc':
                $this->products = Product::where('food_category', $this->category)->orderBy('price', 'desc')->get();
                break;
                default:
                $this->products = Product::where('food_category', $this->category)->get();
                break;
            }
        }
        return $this->products;
    }
}
