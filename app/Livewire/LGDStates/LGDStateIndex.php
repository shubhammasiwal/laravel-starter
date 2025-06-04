<?php

namespace App\Livewire\LGDStates;

use Livewire\Component;
use App\Models\LGDState;

class LGDStateIndex extends Component
{
    public function render() {
        return view('livewire.l-g-d-states.l-g-d-state-index', [
            'l_g_d_states' => LGDState::all()
        ]);
    }

    public function delete($id) {
        $lgd_state = LGDState::findOrFail($id);
        $lgd_state->delete();

        return to_route('l-g-d-states.index')->with('success', 'LGD state deleted sucessfully.');
    }
}
