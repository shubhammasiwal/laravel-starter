<?php

namespace App\Livewire\LGDStates;

use Livewire\Component;
use App\Models\LGDState;

class LGDStateCreate extends Component
{
    public $l_g_d_code;
    public $l_g_d_name;
    public $l_g_d_name_local;
    public $l_g_d_type;
    public $l_g_d_type_list = [];

    public function mount() {
        $this->l_g_d_type_list = config('constants.LGD_STATE_TYPES_RADIO');
    }

    public function submit()
    {
        $this->validate([
            'l_g_d_code' => 'required|string|max:10|unique:l_g_d_states,l_g_d_code',
            'l_g_d_name' => 'required|string|max:255',
            'l_g_d_name_local' => 'required|string|max:255',
            'l_g_d_type' => 'required|in:' . implode(',', array_keys(config('constants.LGD_STATE_TYPES_RADIO'))),
        ], [
            'l_g_d_code.required' => 'The LGD code is required.',
            'l_g_d_code.unique' => 'This LGD code is already taken.',
            'l_g_d_name.required' => 'The LGD name is required.',
            'l_g_d_name_local.required' => 'The LGD local name is required.',
            'l_g_d_type.required' => 'The LGD type is required.',
        ]);

        // Logic to create the LGD state would go here
        LGDState::create([
            'l_g_d_code' => $this->l_g_d_code,
            'name_en' => $this->l_g_d_name,
            'name_local' => $this->l_g_d_name_local,
            'type' => $this->l_g_d_type,
        ]);
        
        // Reset the form fields
        $this->reset(['l_g_d_code', 'l_g_d_name', 'l_g_d_name_local', 'l_g_d_type']);

        // Flash a success message
        session()->flash('message', 'LGD State created successfully.');
        return redirect()->route('l-g-d-states.index');
    }

    public function render()
    {
        return view('livewire.l-g-d-states.l-g-d-state-create');
    }
}
