<?php

namespace App\Http\Controllers;

use Hash;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::notSuperuser()->with('roles')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $user = new User;

        return view('admin.users.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|min:3',
            'last_name'  => 'required|min:3',
            'email'      => 'required|email|unique:users|min:3',
            'password'   => 'required|min:3',
            'roles_list' => 'array|exists:roles,id',
        ]);

        $user = User::create($request->input());
        $user->roles()->sync($request->input('roles_list', []));

        flash('Usuario creado.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function show(User $user)
    {
        $this->authorize($user);

        $user->load('roles');

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  User $user
     * @return Response
     */
    public function edit(User $user)
    {
        $this->authorize($user);

        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User $user
     * @return Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize($user);

        $this->validate($request, [
            'first_name' => 'required|min:3',
            'last_name'  => 'required|min:3',
            'email'      => 'required|email|unique:users,email,' . $user->id . '|min:3',
            'roles_list' => 'array|exists:roles,id',
        ]);

        $user->update($request->except('password'));
        $user->roles()->sync($request->input('roles_list', []));

        flash('Usuario modificado.');

        return redirect()->route('admin.users.index');
    }

    /**
     * Update the password of the specified resource in storage.
     *
     * @param  Request  $request
     * @param  User $user
     * @return Response
     */
    public function updatePassword(Request $request, User $user)
    {
        $this->authorize($user);

        $this->validate($request, [
            'old_password' => 'required',
            'new_password' => 'required|min:3',
        ]);

        if ( ! Hash::check($request->old_password, $user->password) ) {
            $errors = ['old_password' => 'La Contraseña Actual no coincide.'];

            return redirect()->back()
                             ->withErrors($errors);
        }

        $user->update(['password' => $request->new_password]);

        flash('Contraseña modificada.');

        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  User $user
     * @return Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        flash()->info('Usuario eliminado.');

        return redirect()->back();
    }
}
