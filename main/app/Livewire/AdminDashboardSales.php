<?php

namespace App\Livewire;
use App\Models\Sales;
use Livewire\Component;

class AdminDashboardSales extends Component
{
    public $dailySales;
    public $totalSales;
    public $totalSoldTires;
    public $mostSoldProductName;
    public function mount(){
        $this->dailySales = 0;
        $this->totalSoldTires = 0;
        $this->mostSoldProductName = 0;
        $this->totalSales = 0;
    }
    public function refresh(){
        $this->render();
    }
    public function render()
    {
        $sales = Sales::all();
        $this->mostSoldProductName = $sales->max('product_name');
        $this->totalSoldTires = $sales->sum('quantity');
        $this->totalSales = $sales->sum('total_price');
        $this->dailySales = $sales->filter(function ($sale) {
            return $sale->created_at->isToday();
        })->sum('total_price');
                return view('livewire.admin-dashboard-sales', [
            'totalSales' => $this->totalSales
            , 'totalSoldTires' => $this->totalSoldTires
            , 'mostSoldProduct' => $this->mostSoldProductName
            , 'dailySales' => $this->dailySales
        ]);
    }

}
