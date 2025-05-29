<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserIndex extends Component
{
    /**
     * Render the Livewire component view for displaying a list of users.
     *
     * Retrieves all users from the database, ordered by their ID, and passes them
     * to the 'livewire.users.user-index' view.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.users.user-index', [
            'users' => User::all()
        ]);
    }

    /**
     * Delete the specified user by ID.
     *
     * Finds the user by the given ID, deletes the user from the database,
     * and redirects back to the users index page with a success message.
     *
     * @param int $id The ID of the user to delete.
     * @return \Illuminate\Http\RedirectResponse Redirects to the users index with a success message.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the user is not found.
     */
    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete();

        return to_route('users.index')->with('success', 'User deleted sucessfully.');
    }
}
