<?php

use App\Livewire\Roles\RoleEdit;
use App\Livewire\Roles\RoleShow;
use App\Livewire\Roles\RoleIndex;
use App\Livewire\Roles\RoleCreate;
use App\Livewire\Users\UserEdit;
use App\Livewire\Users\UserShow;
use App\Livewire\Users\UserCreate;
use App\Livewire\Users\UserIndex;
use App\Livewire\Settings\Profile;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use Illuminate\Support\Facades\Route;
use App\Livewire\LGDStates\LGDStateShow;
use App\Livewire\LGDStates\LGDStateIndex;
use App\Livewire\LGDStates\LGDStateCreate;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    // Role Routes
    Route::get('roles', RoleIndex::class)->name('roles.index');
    Route::get('roles/create', RoleCreate::class)->name('roles.create');
    Route::get('roles/{id}/edit', RoleEdit::class)->name('roles.edit');
    Route::get('roles/{id}/show', RoleShow::class)->name('roles.show');

    // User Routes
    Route::get('users', UserIndex::class)->name('users.index');
    Route::get('users/create', UserCreate::class)->name('users.create');
    Route::get('users/{id}/edit', UserEdit::class)->name('users.edit');
    Route::get('users/{id}', UserShow::class)->name('users.show');

    // LGDState Routes
    Route::get('l-g-d-states', LGDStateIndex::class)->name('l-g-d-states.index');
    Route::get('l-g-d-states/create', LGDStateCreate::class)->name('l-g-d-states.create');
    // Route::get('l-g-d-states/{id}/edit', LGDStateEdit::class)->name('l-g-d-states.edit');
    Route::get('l-g-d-states/{id}', LGDStateShow::class)->name('l-g-d-states.show');

    // // LGDDistrict Routes
    // Route::get('l-g-d-district', UserIndex::class)->name('l-g-d-district.index');
    // Route::get('l-g-d-district/create', UserCreate::class)->name('l-g-d-district.create');
    // Route::get('l-g-d-district/{id}/edit', UserEdit::class)->name('l-g-d-district.edit');
    // Route::get('l-g-d-district/{id}', UserShow::class)->name('l-g-d-district.show');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
