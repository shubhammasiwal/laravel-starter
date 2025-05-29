<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleIndex extends Component
{
    /**
     * Renders the Livewire view for the roles index page.
     *
     * Retrieves all roles from the database, ordered by their ID, and passes them to the view.
     *
     * @return \Illuminate\View\View The rendered view with the list of roles.
     */
    public function render() {
        $roles = Role::with('permissions')->get();
        return view('livewire.roles.role-index', [
            'roles' => $roles
        ]);
    }

     /**
     * Deletes a role by its ID.
     *
     * Finds the role by the provided ID, deletes it from the database, and redirects back to the roles index page
     * with a success message.
     *
     * @param int $id The ID of the role to delete.
     * @return \Illuminate\Http\RedirectResponse Redirects to the roles index page with a success message.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the role with the given ID does not exist.
     */
    public function delete($id) {
        $role = Role::findOrFail($id);
        $role->delete();

        return to_route('roles.index')->with('success', 'Role deleted sucessfully.');

    }
}
