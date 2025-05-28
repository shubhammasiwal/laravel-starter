<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    public function render()
    {
        return view('livewire.users.user-index', [
            'users' => User::orderBy('id')->get()
        ]);
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return to_route('users.index')->with('success', 'User deleted sucessfully.');

    }
}
