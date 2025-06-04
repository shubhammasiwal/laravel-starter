<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('LGD State') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Manage all your lgd state') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @session('success')
        <div class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            {{ session('success') }}
        </div>
    @endsession
    <a href="{{ route('l-g-d-states.create')}}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-green-600 rounded hover:bg-green-700 focus:outline-none focus:ring-4 focus:ring-green-300 dark:bg-green-500 dark:hover:bg-green-600 dark:focus:ring-green-800">
        Create LGD State
    </a>

    <div class="relative overflow-x-auto mt-4">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        LGD Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Local Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <div class="flex flex-col">
                            <span>Type</span>
                            <span class="text-xs text-gray-500">(States or Union Territory)</span>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3 w-80">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($l_g_d_states as $l_g_d_state)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $l_g_d_state->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $l_g_d_state->l_g_d_code }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $l_g_d_state->name_en }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $l_g_d_state->name_local }}
                        </td>
                        <td class="px-6 py-4">
                            @if ($l_g_d_state->type === config('constants.LGD_STATE_TYPES.STATE'))
                                {{ config('constants.LGD_STATE_TYPES_LABELS.STATE') }}
                            @elseif ($l_g_d_state->type === config('constants.LGD_STATE_TYPES.UNION_TERRITORY'))
                                {{ config('constants.LGD_STATE_TYPES_LABELS.UNION_TERRITORY') }}
                            @else
                                {{ $l_g_d_state->type }}
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route("users.show", $l_g_d_state->id) }}" class="cursor-pointer mr-2 px-3 py-2 text-xs font-medium text-white bg-gray-600 rounded hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-800">
                                View
                            </a>
                            <a href="{{ route("users.edit", $l_g_d_state->id) }}" class="cursor-pointer mr-2 px-3 py-2 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                Edit
                            </a>
                            <button wire:click="delete({{ $l_g_d_state->id }})" wire:confirm="Are you sure to remove this user?" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800">
                                Delete
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
