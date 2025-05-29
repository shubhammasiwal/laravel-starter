<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $password;
    public $confirm_password;
    public $roles = [];
    public $roles_list;

    public function mount() {
        $this->roles_list = Role::all();
    }

    /**
     * Handle the submission of the user creation form.
     *
     * Validates the input fields for name, email, password, and confirm password.
     * If validation passes, creates a new user with the provided data and hashes the password.
     * Resets the form fields and redirects to the users index page with a success message.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit() {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|same:confirm_password',
            'confirm_password' => 'required|string|min:8|same:password',
        ], [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email may not be greater than 255 characters.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.same' => 'The password and confirmation do not match.',
            'confirm_password.required' => 'The confirm password field is required.',
            'confirm_password.min' => 'The confirm password must be at least 8 characters.',
            'confirm_password.same' => 'The password and confirmation do not match.',
        ]);

        // Create the user
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $user->syncRoles($this->roles);
        
        $this->reset(['name', 'email', 'password', 'confirm_password']);

        // Redirect or show a success message
        return to_route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Render the Livewire component view for creating a user.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('livewire.users.user-create');
    }
}
