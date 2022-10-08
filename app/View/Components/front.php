<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Models\Settings;
use Illuminate\View\Component;
use phpDocumentor\Reflection\Types\True_;

class front extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $topNav = menu::where('location',1)->first();
        $topNavItems = json_decode($topNav->content);
        $topNavItems = $topNavItems[0];
        foreach($topNavItems as $menu){
            $menu->title = menuitem::where('id',$menu->id)->value('title');
            $menu->name = menuitem::where('id',$menu->id)->value('name');
            $menu->slug = menuitem::where('id',$menu->id)->value('slug');
            $menu->target = menuitem::where('id',$menu->id)->value('target');
            $menu->type = menuitem::where('id',$menu->id)->value('type');
            if(!empty($menu->children[0])){
                foreach ($menu->children[0] as $child) {
                    $child->title = menuitem::where('id',$child->id)->value('title');
                    $child->name = menuitem::where('id',$child->id)->value('name');
                    $child->slug = menuitem::where('id',$child->id)->value('slug');
                    $child->target = menuitem::where('id',$child->id)->value('target');
                    $child->type = menuitem::where('id',$child->id)->value('type');
                }
            }
        }
        view()->share([
            'topNavItems' => $topNavItems,
        ]);
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
