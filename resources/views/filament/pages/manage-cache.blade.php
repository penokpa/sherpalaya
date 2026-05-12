<x-filament-panels::page>
    <div>
        <form wire:submit="updateCache">
            {{ $this->form }}

            <div class="h-4"></div>

            <x-filament::button type="submit">
                Save Changes
            </x-filament::button>
        </form>
    </div>
</x-filament-panels::page>
