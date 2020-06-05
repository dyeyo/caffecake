<?php

namespace App\Http\Controllers;

use App\ResponseSurveys;
use App\Surveys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SurveysController extends Controller
{
  public function index()
  {
    $surveys = Surveys::all();
    //$surveysPending = Surveys::where('state',2)->get();
    return view('surveys.admin.index',compact('surveys'));
  }

  public function store(Request $request)
  {
    Surveys::create($request->all());
    return redirect()->route('allSurveys');
  }

  public function responseSurveys(Request $request)
  {
    //dd($request->all());
    ResponseSurveys::create($request->all());
    Session::flash('encuestaOk','Encuesta enviada con exito, gracias por responder');
    return redirect()->route('home');

  }
}
