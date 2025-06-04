<?php

namespace App\Livewire\LGDStates;

use Livewire\Component;

class LGDStateShow extends Component
{
    public $l_g_d_state;
    public $l_g_d_code;
    public $l_g_d_name;
    public $l_g_d_name_local;
    public $l_g_d_type;

    public function mount($id) {
        $this->l_g_d_state = LGDState::findOrFail($id);
        $this->l_g_d_code = $this->l_g_d_state->l_g_d_code;
        $this->l_g_d_name = $this->l_g_d_state->name_en;
        $this->l_g_d_name_local = $this->l_g_d_state->name_local;
        $this->l_g_d_type = $this->l_g_d_state->type;
    }
    public function render() {
        return view('livewire.l-g-d-states.l-g-d-state-show');
    }
}
