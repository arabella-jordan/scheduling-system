<div class="p-5">
    <div class="w-full mx-auto mt-[70px] bg-white shadow-2xl p-7 md:w-3/5">
        <h2 class="text-center">Create Event</h2>

        <div>
            <x-ui-input class="mb-5" label="Event Name" placeholder="Event Name" wire:model="name" />
            <x-ui-textarea class="mb-5" label="Event Description" placeholder="Description" wire:model="description" />
            <x-ui-select
                label="Event Room"
                placeholder="Select one status"
                wire:model.defer="model">
                    <x-ui-select.option label="Pending" value="1" />
                    <x-ui-select.option label="In Progress" value="2" />
                    <x-ui-select.option label="Stuck" value="3" />
                    <x-ui-select.option label="Done" value="4" />
            </x-select>
            <x-ui-datetime-picker class="mb-5" label="Date and Time of Event" placeholder="MM-DD-YYYY" display-format="MM-DD-YYYY HH:mm" wire:model="startDateTime" />
            <x-ui-datetime-picker class="mb-5" label="End of Event" placeholder="MM-DD-YYYY" display-format="MM-DD-YYYY HH:mm" wire:model="endDateTime" />
            <x-ui-button class="w-full text-white bg-gradient-to-r from-red-500 to-red-700" label="Save Event" wire:click="create" />
        </div>
    </div>
</div>
