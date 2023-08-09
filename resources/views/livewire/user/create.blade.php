<div class="p-5">
    <div class="w-full mx-auto mt-[70px] bg-white shadow-2xl p-7 md:w-3/5">
        <h2 class="text-center">Create User</h2>

        <div>
            <x-input class="mb-5" label="First Name" placeholder="First Name" wire:model="firstName" />
            <x-input class="mb-5" label="Last Name" placeholder="Last Name" wire:model="lastName" />
            <x-input class="mb-5" label="Middle Name" placeholder="Last Name" wire:model="middleName" />
            <x-input class="mb-5" label="Email" placeholder="email@email.com" wire:model="email" />
            <x-inputs.password class="mb-5" label="Password" placeholder="password" wire:model="password" />
            <x-inputs.password class="mb-5" label="Confirm Password" placeholder="Confirm Password" wire:model="password_confirmation" />
            <x-button class="w-full text-white bg-gradient-to-r from-red-500 to-red-700" label="Save" wire:click='create' />
        </div>
    </div>
</div>
