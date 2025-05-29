<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('User') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Show user') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <a href="{{ route('users.index')}}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
        Back
    </a>

    <div class="mt-4 w-150">
        <p>
            <strong>Name:</strong> {{ $user->name }}
        </p>
        <p>
            <strong>Email:</strong> {{ $user->email }}
        </p>
        <p>
            <strong>Roles:</strong>
            @if($user->roles->isEmpty())
                <flux:badge>No Role</flux:badge>
            @else
                @foreach($user->roles as $role)
                    <flux:badge class="mr-1">{{ $role->name }}</flux:badge>
                @endforeach
            @endif
        </p>
        <p>
            <strong>Permissions:</strong>
            @if($user->getAllPermissions()->isEmpty())
                No Permission
            @else
                @foreach($user->getAllPermissions() as $permission)
                    <flux:badge class="mr-1">{{ $permission->name }}</flux:badge>
                @endforeach
            @endif
        </p>
    </div>
</div>
