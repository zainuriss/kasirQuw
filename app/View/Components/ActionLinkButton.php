<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionLinkButton extends Component
{
    public $route;
    public $icon;
    public $text;
    public $gradient;
    public $padding;

    public function __construct($route = null, $icon = null, $text = null, $gradient = 'from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800', $padding = 'py-2 px-4')
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->text = $text;
        $this->gradient = $gradient;
        $this->padding = $padding;
    }

    public function render(): View|Closure|string
    {
        return view('components.action-link-button');
    }
}
