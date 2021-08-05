<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Employee;
use App\Models\Question;
use App\Models\Survey;
use App\Models\Target;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SurveyController extends Controller
{

    public function indexSurvey()
    {
        return view('survey.new-survey');
    }

    public function ShowSurveys()
    {
        return view('survey.list-of-surveys');
    }

    public function create(Request $request)
    {

        $request->session()
            ->reflash();

        $survey = Survey::query()
            ->create(request()->all());

        foreach (request('category_name') as $item) {
            $survey->categories()
                ->create(['category_name' => $item]);
        }

        foreach (request('ratings') as $item) {
            $survey->ratings()
                ->create([
                    'rating_level' => $item[0],
                    'rating_value' => $item[1],
                ]);
        }

        return redirect('/display-surveys')->with('message_sent', 'Survey has been successfully created!');

    }

    public function store(Request $request)
    {

    }

    public function displaySurveys()
    {
        $surveys = Survey::orderBy('id', 'ASC')->paginate();

        return view('survey.list-of-surveys', compact('surveys'));
    }

    public function displayCategories($id)
    {
        $survey = Survey::query()->where('id', $id)
            ->with('categories')
            ->first();

        return view('survey.question-form', compact('survey'));
    }

    public function CategoryTab()
    {
        return view('survey.survey-form');
    }


    public function postFeedback($id)
    {
        $survey = Survey::find($id);

        return view('survey.survey-form', compact('survey'));
    }

    public function indexQuestions()
    {
        return view('survey.question-form');
    }

    public function sendQuestions(Request $request)
    {
        $request->session()
            ->reflash();

        try {
            foreach ($request->question_name as $k => $v) {
                $category = Category::find($k);

                foreach ($v as $item) {
                    $category->questions()
                        ->create(['question_name' => $item]);
                }
            }

            return redirect('/display-surveys')->with('success', "Questions for $category->survey_title have
            successfully been added. Click on the Details to view the survey structure.");

        } catch (Exception $e) {
            dd($e);
        }

    }

    public function SubmitResults(Request $request)
    {
        $request->session()
            ->reflash();

        $nomination = 1;

        foreach ($request->ratings as $key => $value) {
            $question = Question::find($key);
            $target = Target::find($value);

            $question->rating()->create([
                'target_id' => $target->id,
                'nomination_id' => $nomination,
            ]);

            print($question);
        }

        return redirect('/majibu');

    }


    public function graph()
    {
        return view('charts.bar-chart');
    }

    public function results()
    {
        $ratings = Category::with('ratings.target')->get();

        $categories = [];

        $cats = $ratings->map(function ($item) use ($categories) {
            $key = $item->category_name;

            $avg = $item->ratings->map(function ($it) {
                return $it->target->rating_value;
            })->avg();

            return [$key => $avg];
        });

        return (array_merge(...$cats));
    }

    public function ListNominations()
    {
        return view('list.nominations-list');
    }

    public function IndividualSurveyList()
    {
        return view('survey.individual-survey-list');
    }

    public function RatersInfo()
    {
        return view('info.raters-info');
    }

    public function surveynomination()
    {
        $surveys = Survey::orderBy('id', 'ASC')->paginate();
        return view('home', compact('surveys'));


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
