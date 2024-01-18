<?php

namespace App\View\Components\Home;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use function url;
use function view;

class Portfolio extends Component
{
    public array $items = [];

    public array $tabs = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->items = [
            [
                'category' => ['Laravel', 'Bootstrap'],
                'title' => 'Full Stack Simple Training Management System',
                'image' => url('/img/training.png'),
                'github' => 'https://github.com/aishahzbr/Training-System-Laravel'
            ],
            [
                'category' => ['Android Studio', 'Java'],
                'title' => 'Simple Pizza Kiosk Ordering App',
                'image' => url('/img/pizza.png'),
                'github' => 'https://github.com/aishahzbr/PizzaBumps'
            ],
            [
                'category' => ['Visual Studio', 'C++'],
                'title' => 'Vehicle Service Schedule System',
                'image' => url('/img/vehicle.png'),
                'github' => 'https://github.com/aishahzbr/Vehicle-Service-Schedule-System'
            ],

            [
                'category' => ['Laravel', 'Tailwind CSS', 'Alpine.js'],
                'title' => 'Simple Portfolio',
                'image' => url('/img/portfolio.png'),
                'github' => 'https://github.com/aishahzbr/Personal-Portfolio'
            ],
            
        ];

        $this->tabs = array_unique(Arr::flatten(Arr::pluck($this->items, 'category')));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.home.portfolio');
    }
}
