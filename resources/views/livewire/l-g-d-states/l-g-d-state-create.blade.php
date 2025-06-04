<div>
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" level="1">{{ __('Create LGD State') }}</flux:heading>
        <flux:subheading size="lg" class="mb-6">{{ __('Form for create lgd state') }}</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <a href="{{ route('l-g-d-states.index')}}" class="cursor-pointer px-3 py-2 text-xs font-medium text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
        Back
    </a>

    <div class="mt-4 w-150">
        <form wire:submit="submit" class="space-y-4">
            <flux:input wire:model="l_g_d_code" label="LGD CODE" placeholder="LGD CODE" type="number" step="1" inputmode="numeric" min="0" oninput="this.value = Math.abs(this.value)" />
            <flux:input wire:model="l_g_d_name" label="LGD Name" placeholder="LGD Name" />
            <flux:input wire:model="l_g_d_name_local" label="LGD Local Name" placeholder="LGD Local Name" />

            <flux:radio.group wire:model="l_g_d_type" label="Select type of LGD State">
                @foreach($l_g_d_type_list as $key => $value)
                    <flux:radio value="{{ $key }}" label="{{ $value }}" />
                @endforeach
            </flux:radio.group>

            <flux:button type="submit" variant="primary">Submit</flux:button>
        </form>

    </div>


</div>
