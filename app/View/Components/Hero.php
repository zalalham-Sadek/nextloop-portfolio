<?php

namespace App\View\Components;

use App\Models\Service;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    public $serviceTags;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->serviceTags = Service::active()
            ->ofType('tag')
            ->ordered()
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero');
    }
}
