<?php
namespace App\Livewire;
use App\Models\Sales;
use Livewire\Component;
use Illuminate\Support\Carbon;

class SalesChartFilter extends Component
{
    public $chartData; 
    public $chartLabels; 
    public $selectedPeriod = 'month'; // Default period

    public function mount()
    {
        $this->updateChartData();
    }

    public function updatedSelectedPeriod($value)
    {
        $this->selectedPeriod = $value;
        $this->updateChartData();
    }

    public function updateChartData()
    {
        $sales = Sales::selectRaw('product_name, SUM(total_price) as total_price')
            ->groupBy('product_name');

        switch ($this->selectedPeriod) {
            case 'day':
                $sales->whereDate('created_at', Carbon::today());
                break;

            case 'week':
                $sales->whereBetween('created_at', [
                    Carbon::now()->startOfWeek(),
                    Carbon::now()->endOfWeek()
                ]);
                break;

            case 'month':
                $sales->whereMonth('created_at', Carbon::now()->month);
                break;

            case 'year':
                $sales->whereYear('created_at', Carbon::now()->year);
                break;
        }

        $sales = $sales->get();

        $this->chartData = $sales->pluck('total_price')->toArray();
        $this->chartLabels = $sales->pluck('product_name')->toArray();
    }

    public function render()
    {
        return view('livewire.sales-chart-filter', [
            'labels' => $this->chartLabels,
            'data' => $this->chartData
        ]);
    }
}


