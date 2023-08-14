<div class="p-5">
    <div class="w-full mx-auto mt-[70px] bg-white shadow-2xl p-7 md:w-3/5">
        <h2 class="text-center">Edit User</h2>

        <div>
            <x-ui-input class="mb-5" label="First Name" wire:model="firstName" />
            <x-ui-input class="mb-5" label="Last Name" wire:model="lastName" />
            <x-ui-input class="mb-5" label="Middle Name" wire:model="middleName" />
            <x-ui-input class="mb-5" label="Email" type="email" wire:model="email" />
            <x-ui-inputs.password class="mb-5" label="Password" type="password" wire:model="password" />
            <x-ui-button class="w-full text-white bg-gradient-to-r from-red-500 to-red-700" label="Save" wire:click="components.modals.user-edit-confirmation" />
        </div>
    </div>
</div>
