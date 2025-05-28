<?php

namespace App\Livewire\Roles;

use App\Models\Role;
use Livewire\Component;
use Illuminate\Support\Str;

class RoleCreate extends Component
{
    public $name;

    /**
     * Handles the submission of the role creation form.
     *
     * Validates the input data for the role name, ensuring it is required, a string,
     * no longer than 255 characters, contains only letters and spaces, and is unique.
     * If validation passes, creates a new role with a lowercase name and a kebab-case slug.
     * Resets the name input field and redirects to the roles index page with a success message.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit() {
         $rules = [
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z\s]+$/',
                'unique:roles,name',
            ]
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'name.unique' => 'This role name is already taken.',
            'name.regex' => 'Only letters and spaces are allowed in the name.',
        ];

        $this->validate($rules, $messages);

        // Create the role
        Role::create([
            'name' => strtolower($this->name),
            'slug' => Str::kebab(strtolower($this->name)),
        ]);

        $this->reset('name');

        // Redirect or show a success message
        return to_route('roles.index')->with('success', 'Role created successfully.');
    }

    /**
     * Render the Livewire component view for creating a new role.
     *
     * @return \Illuminate\View\View
     */

    public function render()
    {
        return view('livewire.roles.role-create');
    }
}
