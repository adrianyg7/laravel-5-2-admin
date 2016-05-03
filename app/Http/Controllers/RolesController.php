<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $role = new Role;

        return view('admin.roles.create', compact('role'));
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
            'name'             => 'required|unique:roles',
            'description'      => 'required',
            'permission_list'  => 'array|exists:permissions,id',
        ]);

        $role = Role::create($request->input());
        $role->permissions()->sync($request->input('permission_list', []));

        flash('Rol creado.');

        return redirect()->route('admin.roles.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Role $role
     * @return Response
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Role $role
     * @return Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name'             => 'required|unique:roles,name,' . $role->id,
            'description'      => 'required',
            'permission_list'  => 'array|exists:permissions,id',
        ]);

        $role->update($request->input());
        $role->permissions()->sync($request->input('permission_list', []));

        flash('Rol modificado.');

        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role $role
     * @return Response
     */
    public function destroy(Role $role)
    {
        $role->delete();

        flash()->info('Rol eliminado.');

        return redirect()->back();
    }
}
