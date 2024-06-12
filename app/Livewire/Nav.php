<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;


class Nav extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.nav', compact('categories'));
    }
}
