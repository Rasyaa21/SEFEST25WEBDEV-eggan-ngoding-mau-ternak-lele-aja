<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithPagination;

class MarketplaceComponents extends Component
{
    use WithPagination;

    public $category = '';
    public $searchTerm = '';
    protected $paginationTheme = 'tailwind';

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }

    public function filterByCategory($category)
    {
        $this->category = $category;
        $this->resetPage();
    }

    public function render()
    {
        $query = Product::query();

        if ($this->category) {
            $query->where('category', $this->category);
        }

        if ($this->searchTerm) {
            $query->where('product_name', 'like', '%' . $this->searchTerm . '%');
        }

        $products = $query->paginate(10);

        return view('livewire.marketplace-components', compact('products'));
    }
}
