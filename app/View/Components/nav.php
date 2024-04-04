<?php

namespace App\View\Components;

use Illuminate\View\Component;

class nav extends Component
{
    public $active;
    public function __construct($active)
    {
        $this->active = $active;
    }

    public function render()
    {
        return view('components.nav');
    }
}
