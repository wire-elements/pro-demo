<?php

namespace App\Http\Livewire;

use WireElements\Pro\Components\SlideOver\SlideOver;

class DummySlideOver extends SlideOver
{
    public function render()
    {
        return view('livewire.dummy-slide-over');
    }
}
