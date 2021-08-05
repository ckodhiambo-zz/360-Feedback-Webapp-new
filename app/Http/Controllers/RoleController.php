<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function __construct(Role $role)
    {
        $this->role = $role;

    }
    public function index()
    {
        $roles= $this->role::all();
        return view('role.index', ['roles' => $roles]);
    }


    public function create()
    {
        return view('role.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:roles',
            'permissions' => 'nullable'
        ]);

        $role = $this->role->create([
            'name' => $request->name
        ]);

        if($request->has("permissions")){
            $role->givePermissionTo($request->permissions);
        }

        return response()->json("Role Created", 200);
    }

    public function getAll(){
        $roles = $this->role->all();
        return response()->json([
            'roles' => $roles
        ], 200);
    }


    public function show($id)
    {
        //
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
