<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Settings;
use Illuminate\View\Component;

class front extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $settings = Settings::query()->first();
        $categories = Category::get();
        return view('components.front',compact('settings','categories'));
    }
}
