<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleShow extends Component
{
    public $role;
    public $permissions = [];

    /**
     * Initialize the component with the specified role.
     *
     * Retrieves the role by its ID, or fails if not found, and sets the component's
     * properties accordingly for displaying.
     *
     * @param int $id The ID of the role to show.
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the role does not exist.
     */
    public function mount($id)
    {
        $this->role = Role::findOrFail($id);
        $this->permissions = $this->role->permissions->pluck('name')->toArray();
    }


    /**
     * Renders the Livewire view for the role show page.
     *
     * Passes the role and its permissions to the view for display.
     *
     * @return \Illuminate\View\View The rendered view with the role details.
     */
    public function render()
    {
        return view('livewire.roles.role-show');
    }
}
