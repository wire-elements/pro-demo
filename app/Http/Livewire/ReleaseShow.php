<?php

namespace App\Http\Livewire;

use App\Models\Release;
use App\Models\Repository;
use Livewire\Component;

class ReleaseShow extends Component
{
    public Repository $repository;

    public Release $release;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.release-show');
    }
}
