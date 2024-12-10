<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SelectCategories extends Component
{
    public $name;
    public $label;
    public $selected;
    public $options;

    public function __construct($name, $label = null, $selected = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->selected = $selected;

        // Ambil data kategori dari database
        $this->options = Category::pluck('nama_kategori', 'id')->toArray();
    }

    public function render(): View|Closure|string
    {
        return view('components.select-categories');
    }
}
