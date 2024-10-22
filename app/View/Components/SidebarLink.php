<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Route;

class SidebarLink extends Component
{
    public $route;
    public $content;
    /**
     * Create a new component instance.
     */
    public function __construct($route, $content)
    {
        $this->route = $route;
        $this->content = $content;
    }

    public function isActive()
    {
        return Route::currentRouteName() === $this->route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.sidebar-link');
    }
}
