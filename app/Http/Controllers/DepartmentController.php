<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $company_id = request('company_id');
//        return $company_id;

        $departments = Department::where('company_id',$company_id)->get();

        return DepartmentResource::collection($departments);
    }
}
