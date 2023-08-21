<?php

namespace App\Livewire;

use App\Models\Release;
use App\Models\Repository;
use Livewire\Component;
use WireElements\Pro\Concerns\InteractsWithConfirmationModal;

class ReleaseShow extends Component
{
    use InteractsWithConfirmationModal;

    public Repository $repository;

    public Release $release;

    public function mount()
    {
    }

    public function confirm()
    {
        $this->askForConfirmation(
            callback: function() {
                dd('Submitted');
            },
            prompt: [
                'title' => __('Post confirmation'),
                'message' => __('Are you sure you want to post this?'),
                'confirm' => __('Yes, post it!'),
                'cancel' => __('No, cancel please!'),
            ],
            confirmPhrase: 'POST',
            modalBehavior: [
                'close-on-escape' => false,
                'close-on-backdrop-click' => false,
                'trap-focus' => true,
            ],
            modalAttributes: [
                'size' => '2xl'
            ]
        );
    }

    public function render()
    {
        return view('livewire.release-show');
    }
}
