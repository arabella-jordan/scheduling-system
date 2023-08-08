<div class="p-10 m-auto my-5 bg-white shadow-2xl lg:w-fit-content sm:w-full">
    <h2 class="text-center">Create User</h2>

    <div>
        <x-input class="mb-5" label="First Name" placeholder="First Name" wire:model="firstName" />
        <x-input class="mb-5" label="Last Name" placeholder="Last Name" wire:model="lastName" />
        <x-input class="mb-5" label="Middle Name" placeholder="Last Name" wire:model="middleName" />
        <x-input class="mb-5" label="Email" placeholder="email@email.com" wire:model="email" />
        <x-inputs.password class="mb-5" label="Password" placeholder="password" wire:model="password" />
        <x-inputs.password class="mb-5" label="Confirm Password" placeholder="Confirm Password" wire:model="password_confirmation" />
        <x-button class="w-full text-white bg-gradient-to-r from-red-500 to-pink-500" label="Save" wire:click='create' />
    </div>
</div>
