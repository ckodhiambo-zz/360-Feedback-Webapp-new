<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
//        $this->middleware(['auth', 'role_or_permission:admin|create role|create permission']);

    }

    public function index()
    {
        $permissions = $this->permission::all();

        return view("permission.index", ['permissions' => $permissions]);

    }

    public function getAllPermissions(){
        $permissions = $this->permission::all();

        return response()->json([
            'permissions' => $permissions
        ], 200);
    }


    public function create()
    {
        return view("permission.create");
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $this->permission->create([
            'name' => $request->name
        ]);

        return redirect()->route('permission.index')->with('success', 'Permission Created');
    }

    public function show($id)
    {
        //
    }
    public function getAll(){
        $permissions = $this->permission->all();
        return response()->json([
            'permissions' => $permissions
        ], 200);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
