<?php

namespace App\Livewire\User;

use App\Models\Category;
use Livewire\Component;

class CategoriesSearch extends Component
{
    public $search = '';
    public $suggestions = [];

    public function updateSuggestions()
    {
        if (strlen($this->search) >= 1) {
            $this->suggestions = Category::where('name', 'like', $this->search . '%')
                ->pluck('name')
                ->toArray();
        } else {
            $this->suggestions = [];
        }
    }
    public function clearSuggestions()
    {
        $this->suggestions = [];
    }



    public function selectSuggestion($suggestion)
    {
        $this->search = $suggestion;
        $this->suggestions = [];
    }

    public function render()
    {
        return view('user.categories-search');
    }
}
