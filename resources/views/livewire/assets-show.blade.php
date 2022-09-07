<x-wire-elements-pro::tailwind.modal on-submit="save">
    <x-slot name="title">{{ $this->release->tag }} Assets</x-slot>

    <div>
        <ul class="text-gray-800">
        @foreach($this->assets as $asset)
            <li>{{ $asset->filename }}</li>
        @endforeach
        </ul>
    </div>

    <x-slot name="buttons">
        <button type="button" wire:click="$emit('modal.close')" class="inline-flex items-center rounded border border-gray-300 bg-white px-2.5 py-1.5 text-xs font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            Close
        </button>
    </x-slot>
</x-wire-elements-pro::tailwind.modal>
