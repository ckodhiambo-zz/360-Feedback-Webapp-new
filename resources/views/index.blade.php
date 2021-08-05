<?php

namespace App\Http\Controllers;

class SurveyController extends Controller
{
    public function indexSurvey()
    {
        return view('survey.create-survey');
    }
}
