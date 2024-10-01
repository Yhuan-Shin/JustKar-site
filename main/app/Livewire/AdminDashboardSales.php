<?php

namespace App\Livewire;
use App\Models\Sales;
use Livewire\Component;

class AdminDashboardSales extends Component
{
    public $dailySales;
    public $totalSales;
    public $mostSoldProductType;
    public $mostSoldProductName;
    public function mount(){
        $this->dailySales = 0;
        $this->mostSoldProductType = null;
        $this->mostSoldProductName = null;
        $this->totalSales = 0;
    }
    public function refresh(){
        $this->render();
    }
    public function render()
    {
        $sales = Sales::all();
        $mostSoldProduct = Sales::groupBy('product_name')
        ->selectRaw('product_name, SUM(quantity) as total_quantity')
        ->orderByDesc('total_quantity')
        ->first();  
        
        $this->mostSoldProductName = $mostSoldProduct ? $mostSoldProduct->product_name : 'N/A';

        $this->mostSoldProductType = Sales::groupBy('product_type')
        ->selectRaw('product_type, SUM(quantity) as total_quantity')
        ->orderByDesc('total_quantity')
        ->first();

        $this->mostSoldProductType = $this->mostSoldProductType ? $this->mostSoldProductType->product_type : 'N/A';

        $this->totalSales = $sales->sum('total_price');
        $this->dailySales = $sales->filter(function ($sale) {
            return $sale->created_at->isToday();
        })->sum('total_price');
                return view('livewire.admin-dashboard-sales', [
            'totalSales' => $this->totalSales
            , 'mostSoldProductType' => $this->mostSoldProductType
            , 'mostSoldProduct' => $this->mostSoldProductName
            , 'dailySales' => $this->dailySales
        ]);
    }

}
