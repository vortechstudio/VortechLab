<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSimpleFile extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $name,
        public bool $isModel = false,
        public string $model = '',
        public bool $required = false,
        public string $accept = '.png, .jpg, .jpeg',
        public string $texting = 'image',
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.input-simple-file');
    }
}
