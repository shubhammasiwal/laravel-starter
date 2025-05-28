<?php

namespace App\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;

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
        return view('livewire.roles.role-index', [
            'roles' => Role::orderBy('id')->get()
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
