<x-wire-elements-pro::tailwind.slide-over>
    <x-slot name="title">Demo Action</x-slot>

    <div class="text-sm text-gray-800">
        <p>
            Hi there! The demo application you are exploring contains various dummy actions and it seems you just triggered one!
        </p>
    </div>

    <x-slot name="buttons">
        <button type="button" wire:click="$dispatch('slide-over.close')" class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Continue exploring
        </button>
    </x-slot>
</x-wire-elements-pro::tailwind.slide-over>
