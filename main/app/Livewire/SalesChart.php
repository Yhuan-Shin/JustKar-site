<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\Sales;
use IcehouseVentures\LaravelChartjs\Facades\Chartjs;
use Illuminate\Support\Facades\DB;
class SalesChart extends Component
{
    public $categories;
    public $brands;
    public $salesData;

    public function mount()
    {
        // Fetch sales data aggregated by brand and category
        $salesData = Sales::select('brand', 'category', DB::raw('SUM(total_price) as total_price'))
            ->groupBy('brand', 'category')
            ->get();

        // Prepare categories and data
        $this->categories = $salesData->pluck('category')->unique();
        $this->brands = $salesData->pluck('brand')->unique();
        $this->salesData = $salesData->groupBy('brand')->map(function ($items) {
            return $items->pluck('total_price', 'category')->toArray();
        });
    }
    public function refresh()
    {
        $this->render();
        
    }
    public function render()
    {
        return view('livewire.sales-chart', [
            'categories' => $this->categories,
            'brands' => $this->brands,
            'salesData' => $this->salesData
        ]);
    }
}
