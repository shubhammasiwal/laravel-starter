<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserShow extends Component
{
    public $name;
    public $email;
    public $user;

    /**
     * Initialize the component with the specified user's data.
     *
     * Retrieves the user by the given ID. If the user is found, sets the component's
     * name and email properties to the user's name and email. If not found, throws a ModelNotFoundException.
     *
     * @param int $id The ID of the user to display.
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the user does not exist.
     */
    public function mount($id) {
        $this->user = User::findOrfail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    /**
     * Render the Livewire component view for displaying user details.
     *
     * @return \Illuminate\View\View The view instance for the user show component.
     */
    public function render()
    {
        return view('livewire.users.user-show');
    }
}
