<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Validate;

class TvaCalculator extends Component
{
    public $price_types = ['HT', 'TTC'];
    public $rates = [20, 10, 8.5, 5, 2.1];

    public $amount = 0;
    public $selected_price_type = 'HT'; 
    public $selected_rate = 20;
    public $result_price = 0;
    public $tva_amount = 0;

    public function rules()
    {
        return [
            'amount' => 'required|numeric|gt:0',
            'selected_price_type' => 'required|in:' . implode(',', $this->price_types),
            'selected_rate' => 'required|numeric|in:' . implode(',', $this->rates),
        ];
    }

    public function calculate()
    {
        $this->validate();

        if ($this->selected_price_type === 'HT') {
            $this->tva_amount = $this->amount * $this->selected_rate / 100;
            $this->result_price = $this->amount + $this->tva_amount;
        } else {
            $this->result_price = $this->amount / (1 + $this->selected_rate / 100);
            $this->tva_amount = $this->amount - $this->result_price;
        }
    }

    public function render()
    {
        return view('livewire.tva-calculator');
    }
}
