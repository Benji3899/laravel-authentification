<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Console\Migrations\ResetCommand;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
$users = User::all();
return view('users.index', ['users' => $users]); // -> resources/views/users/index.blade.php
    }

    protected function redirectTo(Request $request): string
    {
        return route('login');
    }
    public function create()
    {
        return view('users.create'); // -> resources/views/users/create.blade.php
    }

    public function store(Request $request): RedirectResponse
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password' => 'required|confirmed|min:5', (Hash::make($request->newPassword)),
            'birthdate'=>'required'
        ]);

        User::create($validated);

        return redirect()->route('users.index')->with('message', 'Utilisateur créé');
    }

    public function show(User $user){
return view('users.show', ['user' => $user]);
    }


    public function edit($id){
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }



    public function update(Request $request, $id): RedirectResponse
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $validated = $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password' => 'required|confirmed|min:5', (Hash::make($request->newPassword)),
            'birthdate'=>'required'
        ]);

        User::whereId($id)->update($validated);

        return redirect()->route('users.index')->with('success', 'Utilisateur modifié.'); // -> resources/views/users/index.blade.php
    }


    public function destroy(string $id){
        User::destroy($id);
        return redirect()->route('users.index')->with('message', 'Utilisateur supprimé');
    }
}
