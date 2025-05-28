<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create User') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Form for create user') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <a href="{{ route('users.index')}}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
        Back
    </a>

    <div class="mt-4 w-150">
        <form wire:submit="submit" class="space-y-4">
            <flux:input wire:model="name" label="Name" placeholder="Name" />
            <flux:input wire:model="email" type="email" label="Email" placeholder="Email" />
            <flux:input wire:model="password" type="password" label="Password" placeholder="Password" />
            <flux:input wire:model="confirm_password" type="password" label="Confirm Password" placeholder="Confirm Password" />

            <flux:button type="submit" variant="primary">Submit</flux:button>
        </form>

    </div>


</div>
