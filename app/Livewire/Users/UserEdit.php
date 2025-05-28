<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class UserEdit extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $user;

    /**
     * Initialize the component with the user's data based on the provided ID.
     *
     * Retrieves the user from the database using the given ID. If the user is found,
     * sets the component's properties (`name` and `email`) with the user's information.
     * If the user is not found, an exception is thrown.
     *
     * @param int $id The ID of the user to edit.
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the user does not exist.
     */
    public function mount($id) {
        $this->user = User::findOrFail($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    /**
     * Handles the submission of the user edit form.
     *
     * Validates the input data for updating a user's name, email, and optionally password.
     * Applies custom validation rules and messages. If validation passes, updates the user's
     * information in the database. If a new password is provided, it is hashed before saving.
     * Resets the form fields after successful update and redirects to the users index page
     * with a success message.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit() {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
        ];

        if ($this->password) {
            $rules['password'] = 'string|min:8|same:confirm_password';
            $rules['confirm_password'] = 'required|string|min:8|same:password';
        }

        $messages = [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'This email is already taken.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.same' => 'The password and confirmation do not match.',
            'confirm_password.required' => 'The confirm password field is required.',
            'confirm_password.min' => 'The confirm password must be at least 8 characters.',
            'confirm_password.same' => 'The password and confirmation do not match.',
        ];

        $this->validate($rules, $messages);

        // Update the user
        $this->user->name = $this->name;
        $this->user->email = $this->email;
        if ($this->password) {
            $this->user->password = Hash::make($this->password);
        }
        $this->user->save();

        $this->reset(['name', 'email', 'password', 'confirm_password']);

        // Redirect or show a success message
        return to_route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Render the Livewire component view for editing a user.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.users.user-edit');
    }
}
