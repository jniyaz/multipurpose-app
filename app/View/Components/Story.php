<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Story extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $story;

    public function __construct($story)
    {
        $this->story = $story;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.stories.hcard');
    }
}