<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleCreate extends Component
{
    public $name;
    public $permissions_to_view = [];
    public $permissions = [];

    /**
     * Mount the component with initial data.
     *
     * Initializes the component with an empty name and retrieves all permissions.
     */
    public function mount() {
        $this->name = '';
        $this->permissions_to_view = Permission::all();
    }
    

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
            ],
            'permissions' => [
                'array',
                'exists:permissions,name',
            ]
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'name.unique' => 'This role name is already taken.',
            'name.regex' => 'Only letters and spaces are allowed in the name.',
            'permissions.array' => 'The permissions must be an array.',
            'permissions.exists' => 'One or more selected permissions are invalid.',
        ];

        $this->validate($rules, $messages);

        // Create the role
        $role = Role::create([
            'name' => $this->name,
        ]);
        
        $role->syncPermissions($this->permissions);

        $this->reset(['name', 'permissions']);

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
