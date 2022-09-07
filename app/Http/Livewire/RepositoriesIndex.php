<?php

namespace App\Http\Livewire;

use App\Models\Repository;
use Livewire\Component;

class RepositoriesIndex extends Component
{
    public function render()
    {
        return view('livewire.repositories-index', [
            'repositories' => Repository::all(),
        ]);
    }
}
