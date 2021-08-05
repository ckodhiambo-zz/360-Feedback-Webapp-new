<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Nominee;
use App\Models\Relationship;
use App\Models\Supervisor;
use App\Models\Survey;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\EmployeeImport;


class PostController extends Controller
{
    //
    public function addPost()
    {
        $companies = Company::with('departments')->get();


        return view('survey.category',
            [
                'companies' => $companies,
            ]);
    }

    public function createPost(Request $request)
    {
        $employee = Employee::query()->create($request->all());
        $employee->companies()->attach([\request('company_id')]);
        $employee->departments()->attach([\request('department_id')]);

        return redirect('/list-of-employees')->with('message_sent', 'Details have been added successfully!');

    }

    public function getPost()
    {
        $employees = Employee::orderBy('id', 'ASC')->paginate(10);

        return view('list.employees-list', compact('employees'));
    }

    public function createQuestion()
    {
        return view('survey.question-form');
    }

    public function addinfo($id)
    {
        $companies = Company::with('employees')->get();
        $relationships = Relationship::all();
        $surveys = Survey::find($id);


        return view('info.raters-info',
            [
                'relationships' => $relationships,
                'companies' => $companies,
                'surveys' => $surveys,
            ]);

    }

    public function nominations(Request $request)
    {
//        dd($request->all());

        $nomination = new User();

        // Fetch user object
        $user = Auth::user();

        // Get survey
        $survey = Survey::find($request->input('survey_id'));

        foreach ($request->rater_id as $key => $rating) {
            $nominees = new Nominee([
                'nominee_id' => $rating[0],
                'relationship_id' => $request->relationship_id[$key][0]
            ]);

            $nomination->nominees()->associate($nominees);

            $nomination->save();
        }


//        $user = User::find(Auth::user()->id);
//


//        $request->session()
//            ->reflash();
//
//
//
//        return response()->json("Your Details have been successfully saved!", 200);

    }


    public function summary()
    {
        return view('info.summary-list');
    }

    public function ListRaters()
    {
        return view('info.list-of-raters');
    }

    public function Participants()
    {
        return view('info.rating-categories');
    }

    public function importForm()
    {
        return view('list.employees-list');
    }

    public function importEmployees()
    {
        Excel::import(new EmployeeImport, \request()->file('file'));
        return response()->json("Your Details have been successfully imported!", 200);
    }

}
