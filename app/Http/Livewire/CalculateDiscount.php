<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalculateDiscount extends Component
{
    public $discount;
    public $price;
    public $discount_translated;
    public $price_after_discount;
    public $price_format;

    public function render()
    {
        return <<<'blade'
        <div>
        R$ {{ $this->CalculateDiscount() }} <span>/unidade</span>
        </div>
        blade;
    }

    public function translateDiscount(){
        switch($this->discount){
            case '5%':
            return $this->discount_translated = 0.05;
            break;
            case '10%':
            return $this->discount_translated = 0.1;
            break;
            case '20%':
            return $this->discount_translated = 0.2;
            break;
            case '30%':
            return $this->discount_translated = 0.3;
            break;
            case '40%':
            return $this->discount_translated = 0.4;
            break;
            case '50%':
            return $this->discount_translated = 0.5;
            break;
            default:
            return $this->discount_translated = 0;
            break;
        }            
    }

    public function CalculateDiscount(){
        $discount_translated = $this->translateDiscount();
        $this->price_after_discount = $this->price - ($this->price * $discount_translated);
        return $this->price_format = number_format($this->price_after_discount, 2, ',', '.');
    }
}
