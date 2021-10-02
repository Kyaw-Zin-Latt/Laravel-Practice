<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MenuItem extends Component
{
    public $link,$name,$class,$counter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link="#",$name,$class,$counter="")
    {
        $this->link = $link;
        $this->name = $name;
        $this->class = $class;
        $this->counter = $counter;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.menu-item');
    }
}
