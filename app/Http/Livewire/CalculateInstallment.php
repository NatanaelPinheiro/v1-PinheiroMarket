<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CalculateInstallment extends Component
{
    public $prod_price;
    public $prod_installment;
    public $installment_portion;

    public function render()
    {
        return <<<'blade'
        <span>
        {{ $this->get_calculated_installment() }}
        </span>
        blade;
    }

    public function calculate_installment(){
        switch($this->prod_installment){
            case '2x':
            $this->installment_portion = $this->prod_price /2;
            break;
            case '3x':
            $this->installment_portion = $this->prod_price /3;
            break; 
            case '4x':
            $this->installment_portion = $this->prod_price /4;
            break; 
            case '5x':
            $this->installment_portion = $this->prod_price /5;
            break; 
            case '10x':
            $this->installment_portion = $this->prod_price /10;
            break; 
            default:
            $this->installment_portion = $this->prod_price;
            break;
        }
    }

    public function get_calculated_installment(){
        $this->calculate_installment();
        return number_format($this->installment_portion, 2, ',', '.');
    }
}
