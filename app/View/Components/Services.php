<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Services extends Component
{
    public $services;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->services = Service::active()
            ->ofType('card')
            ->ordered()
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.services');
    }
}
