<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Role') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Show roles') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <a href="{{ route('roles.index')}}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
        Back
    </a>

    <div class="mt-4 w-150">
        <p>
            <strong>Name:</strong> {{ $role->name }}
        </p>
        <p class="flex items-center">
            <strong class="mr-2">Permissions:</strong>
            @if ($role->permissions->isEmpty())
                <flux:badge>No Permission</flux:badge>
            @else
                @foreach ($role->permissions as $permission)
                    <flux:badge class="mr-1">{{ $permission->name }}</flux:badge>
                @endforeach
            @endif
        </p>
    </div>
</div>
