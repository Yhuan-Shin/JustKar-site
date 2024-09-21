<?php

namespace App\Livewire;

use App\Models\Sales;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Livewire\Component;

class SalesChartFilter extends Component
{
    public $chartData; 
    public $chartLabels; 
    public $selectedPeriod = 'month'; // Default period

    public function mount()
    {
        $this->updateChartData();
    }

    public function updatedSelectedPeriod()
    {
        $this->updateChartData();
    }

    public function updateChartData()
    {
        switch ($this->selectedPeriod) {
            case 'day':
                $sales = Sales::whereDate('created_at', today())
                    ->selectRaw('product_name, SUM(total_price) as total_price')
                    ->groupBy('product_name')
                    ->get();
                break;

            case 'week':
                $sales = Sales::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                    ->selectRaw('product_name, SUM(total_price) as total_price')
                    ->groupBy('product_name')
                    ->get();
                break;

            case 'month':
                $sales = Sales::whereMonth('created_at', date('m'))
                    ->selectRaw('product_name, SUM(total_price) as total_price')
                    ->groupBy('product_name')
                    ->get();
                break;

            case 'year':
                $sales = Sales::whereYear('created_at', date('Y'))
                    ->selectRaw('product_name, SUM(total_price) as total_price')
                    ->groupBy('product_name')
                    ->get();
                break;
        }

        $this->chartData = $sales->pluck('total_price')->toArray();
        $this->chartLabels = $sales->pluck('product_name')->toArray();
    }

    public function render()
    {
        $chart = (new LarapexChart())->pieChart()
            ->setTitle('Sales Data.')
            ->setSubtitle('Selected Period: ' . ucfirst($this->selectedPeriod))
            ->addData($this->chartData) 
            ->setLabels($this->chartLabels);

        return view('livewire.sales-chart-filter', [
            'chart' => $chart 
        ]);
    }
}

