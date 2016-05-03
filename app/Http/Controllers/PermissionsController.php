<?php

namespace App\Http\Controllers;

use Adrianyg7\Acl\Events\PermissionsModified;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permission = new Permission;

        return view('admin.permissions.create', compact('permission'));
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
            'name'         => 'required|unique:permissions',
            'description'  => 'required',
        ]);

        Permission::create($request->input());

        event(new PermissionsModified);
        flash('Permiso creado.');

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Permission $permission
     * @return Response
     */
    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Permission $permission
     * @return Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name'         => 'required|unique:permissions,name,' . $permission->id,
            'description'  => 'required',
        ]);

        $permission->update($request->input());

        event(new PermissionsModified);
        flash('Permiso modificado.');

        return redirect()->route('admin.permissions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Permission $permission
     * @return Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        event(new PermissionsModified);
        flash()->info('Permiso eliminado.');

        return redirect()->back();
    }
}
