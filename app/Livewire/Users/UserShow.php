<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserShow extends Component
{
    public $name;
    public $email;
    public $user;

    public function mount($id) {
        $this->user = User::findOrfail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }
    public function render()
    {
        return view('livewire.users.user-show');
    }
}
