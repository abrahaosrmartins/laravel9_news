<?php

namespace App\View\Components;

use App\Models\Restaurant;
use Illuminate\View\Component;

class RestaurantList extends Component
{
    public Restaurant $restaurant;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.restaurant-list');
    }
}
