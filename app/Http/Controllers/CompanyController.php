<?php

namespace App\Http\Controllers;

use App\Http\Resources\CompaniesResource;
use App\Http\Resources\DepartmentResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::all();
        return CompaniesResource::collection($companies);
    }
}
