<?php

namespace App\Livewire;

use App\Models\Release;
use WireElements\Pro\Components\Modal\Modal;

class AssetsShow extends Modal
{
    public int $releaseId;

    public function getAssetsProperty()
    {
        return $this->release->assets;
    }

    public function getReleaseProperty()
    {
        return Release::findOrFail($this->releaseId);
    }

    public function render()
    {
        return view('livewire.assets-show');
    }
}
