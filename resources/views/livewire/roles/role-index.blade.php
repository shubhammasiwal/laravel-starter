<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Roles') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage all your roles') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @session('success')
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endsession
    @can('role.create')
        <a href="{{ route('roles.create')}}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-600 rounded hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
            Create Role
        </a>
    @endcan

    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Permission
                    </th>
                    @canany(['role.view', 'role.edit', 'role.delete'])
                        <th scope="col" class="px-6 py-3 w-80">
                            Actions
                        </th>
                    @endcanany
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $role->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $role->name }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($role->permissions->isEmpty())
                                <flux:badge>No Permission</flux:badge>
                            @else
                                    @foreach ($role->permissions as $permission)
                                       <flux:badge class="mt-1">{{ $permission->name }}</flux:badge>
                                    @endforeach
                            @endif
                        </td>
                        @canany(['role.view', 'role.edit', 'role.delete'])
                            <td class="px-6 py-4">
                                @can('role.view')
                                    <a href="{{ route("roles.show", $role->id) }}" class="cursor-pointer mr-2 px-3 py-2 text-xs font-medium text-white bg-gray-600 rounded hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                                        View
                                    </a>
                                @endcan

                                @can('role.edit')
                                    <a href="{{ route("roles.edit", $role->id) }}" class="cursor-pointer mr-2 px-3 py-2 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                        Edit
                                    </a>
                                @endcan
                                @can('role.delete')
                                    <button wire:click="delete({{ $role->id }})" wire:confirm="Are you sure to remove this role?" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                        Delete
                                    </button>
                                @endcan
                            </td>
                        @endcanany
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
