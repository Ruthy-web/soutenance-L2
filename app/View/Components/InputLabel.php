<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputLabel extends Component
{
    public string $for;
    public string $value;

    /**
     * Create a new component instance.
     */
    public function __construct(string $for, string $value = '')
    {
        $this->for = $for;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.input-label');
    }
}
