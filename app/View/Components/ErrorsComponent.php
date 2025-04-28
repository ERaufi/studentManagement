<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ErrorsComponent extends Component
{
    /**
     * Create a new component instance.
     */

    public $className;
    public function __construct($className)
    {
        //
        $this->className = $className;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.errors-component');
    }
}
