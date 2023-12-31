<div class="p-5">
    <div class="w-full mx-auto mt-[70px] bg-white shadow-2xl p-7 md:w-3/5">
        <h2 class="text-center">Edit Event</h2>

        <div>
            <x-ui-input class="mb-5" label="Event Name" placeholder="Event Name" wire:model="name" />
            <x-ui-textarea class="mb-5" label="Event Description" placeholder="Description" wire:model="description" />
            <x-ui-select class="mb-5"
                label="Select a Room"
                wire:model.defer="roomId"
                placeholder="Select Room"
                :async-data="route('api.room.references')"
                option-label="name"
                option-value="id"
            />
            <x-ui-datetime-picker class="mb-5"
                label="Start of Event"
                :min="now()"
                placeholder="MM-DD-YYYY"
                display-format="MM-DD-YYYY HH:mm"
                wire:model="startDateTime"
            />
            <x-ui-datetime-picker class="mb-5"
                label="End of Event"
                :min="now()->addMinutes(5)"
                placeholder="MM-DD-YYYY"
                display-format="MM-DD-YYYY HH:mm"
                wire:model="endDateTime"
            />
            <x-ui-button class="w-full text-white bg-gradient-to-r from-red-500 to-red-700" label="Update Event" wire:click="update({{$event->id}})" />
        </div>
    </div>
</div>

