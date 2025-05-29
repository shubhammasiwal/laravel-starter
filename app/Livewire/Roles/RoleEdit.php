<?php

namespace App\Livewire\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleEdit extends Component
{
    public $name;
    public $role;
    public $permissions_to_view = [];
    public $permissions = [];

    /**
     * Initialize the component with the specified role.
     *
     * Retrieves the role by its ID, or fails if not found, and sets the component's
     * properties accordingly for editing.
     *
     * @param int $id The ID of the role to edit.
     * @return void
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the role does not exist.
     */
    public function mount($id) {
        $this->role = Role::findOrFail($id);
        $this->permissions_to_view = Permission::all();
        $this->name = $this->role->name;
        $this->permissions = $this->role->permissions->pluck("name");
    }

    /**
     * Handles the submission of the role edit form.
     *
     * Validates the input data for the role's name, ensuring it is required, a string,
     * does not exceed 255 characters, contains only letters and spaces, and is unique
     * among roles except for the current role being edited. Custom validation messages
     * are provided for user feedback.
     *
     * Upon successful validation, updates the role's name (converted to lowercase) and
     * slug (kebab-case version of the name), saves the changes, resets the input field,
     * and redirects to the roles index page with a success message.
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
                'unique:roles,name,' . $this->role->id,
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

        // Update the role
        $this->role->name = $this->name;
        $this->role->save();

        $this->role->syncPermissions($this->permissions);

        $this->reset(['name']);

        // Redirect or show a success message
        return to_route('roles.index')->with('success', 'Role updated successfully.');
    }

    /**
     * Render the Livewire component view.
     *
     * Returns the Blade view responsible for displaying the role edit form.
     *
     * @return \Illuminate\View\View
     */
    public function render() {
        return view('livewire.roles.role-edit');
    }
}
