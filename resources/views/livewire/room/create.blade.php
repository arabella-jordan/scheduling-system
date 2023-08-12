<div class="p-5">
    <div class="w-full mx-auto mt-[70px] bg-white shadow-2xl p-7 md:w-3/5">
        <h2 class="text-center">Register New Room</h2>

        <div>
            <x-ui-input class="mb-5" label="Room Name" placeholder="Room Name" wire:model="name" />
            <x-ui-textarea class="mb-5" label="Room Description" placeholder="Description" wire:model="description" />
            <x-ui-inputs.number class="mb-5" label="Capacity" wire:model="capacity" />
            <x-ui-button class="w-full text-white bg-gradient-to-r from-red-500 to-red-700" label="Add Room" wire:click='create' />
        </div>
    </div>
</div>
