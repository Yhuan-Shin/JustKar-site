<?php

namespace App\Livewire;
use App\Models\Inventory;
use Livewire\Component;

class InventoryUpdate extends Component
{
    public $filter;
    public $search;
    public $selectedItems = []; // Array to store selected items
    public $selectAll = false;  // Boolean to track "select all" checkbox
    public $archived = false; // Toggle between active and archived views

    public function mount($filter = null, $search = null, $archived = false)
    {
        $this->filter = $filter;
        $this->search = $search;
        $this->archived = $archived;
    }
    public function refresh()
    {
        // Re-run the render method logic to refresh the inventory data
        $this->render();
        
    }
    public function updatedSelectAll($value)
    {
        // If select all is checked, select all items, otherwise clear the selection
        if ($value) {
            $this->selectedItems = Inventory::where('archived', false)->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }
    public function archiveSelected()
    {
        // Check if any items are selected
        if (empty($this->selectedItems)) {
            session()->flash('error', 'No items selected. Please select items to archive.');
            return;
        }

        // Archive all selected items
        Inventory::whereIn('id', $this->selectedItems)->update(['archived' => true]);

        // Clear the selection and refresh the component
        $this->selectedItems = [];
        session()->flash('success', 'Selected items archived successfully.');
        $this->refresh();
    }

    public function render()
    {
        
        $query = Inventory::query();
        if ($this->archived) {
            $query->where('archived', true);
        } else {
            $query->where('archived', false);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('product_name', 'like', '%' . $this->search . '%')
                  ->orWhere('product_code', 'like', '%' . $this->search . '%')
                  ->orWhere('size', 'like', '%' . $this->search . '%')
                  ->orWhere('brand', 'like', '%' . $this->search . '%')
                  ->orWhere('category', 'like', '%' . $this->search . '%')
                  ->orWhere('quantity', 'like', '%' . $this->search . '%');
            });
            //return no results
            if ($query->count() == 0) {
                return view('livewire.inventory-update', ['inventory' => $query->get()]);
                session()->flash('warning', 'No results found. Please enter a valid search term.');
            }
        }

        if ($this->filter) {
            if ($this->filter == 'instock') {
                $query->whereColumn('quantity', '>', 'critical_level');
            } elseif ($this->filter == 'lowstock') {
                $query->whereColumn('quantity', '<=', 'critical_level')
                      ->where('quantity', '>', 0);
            } elseif ($this->filter == 'outofstock') {
                $query->where('quantity', 0);
            }
        }

        $inventory = $query->get();

        return view('livewire.inventory-update', ['inventory' => $inventory]);
    }
}