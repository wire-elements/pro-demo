<?php

namespace App\Livewire;

use App\Models\Repository;
use Livewire\Component;

class RepositoriesShow extends Component
{
    public Repository $repository;

    public function render()
    {
        return view('livewire.repositories-show');
    }
}
