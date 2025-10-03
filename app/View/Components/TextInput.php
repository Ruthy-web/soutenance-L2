<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextInput extends Component
{
    public string $id;
    public string $type;
    public string $class;
    public bool $required;
    public bool $autofocus;
    public string $autocomplete;

    /**
     * Create a new component instance.
     */
    public function __construct(
        string $id = '',
        string $type = 'text',
        string $class = '',
        bool $required = false,
        bool $autofocus = false,
        string $autocomplete = ''
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->class = $class;
        $this->required = $required;
        $this->autofocus = $autofocus;
        $this->autocomplete = $autocomplete;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.text-input');
    }
}
