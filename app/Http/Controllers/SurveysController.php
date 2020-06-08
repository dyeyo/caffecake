<?php

namespace App\Http\Controllers;

use App\Exports\ResponseSurveysExport;
use App\Exports\ResponseSurveysPublicExport;
use App\ResponseSurveys;
use App\SurveyPublic;
use App\Surveys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class SurveysController extends Controller
{
  public function index()
  {
    $surveys = Surveys::all();
    $surveysPublic = SurveyPublic::all();
    return view('surveys.admin.index',compact('surveys','surveysPublic'));
  }

  public function store(Request $request)
  {
    Surveys::create($request->all());
    return redirect()->route('allSurveys');
  }

  public function stateSurvey(Request $request, $id)
  {
    $state = Surveys::find($id);
    $state->state = $request->state;
    //dd($state);
    $state->update();
    Session::flash('encuestaOk','Encuesta desactivada');
    return redirect()->route('allSurveys');
  }

  public function responseSurveys(Request $request)
  {
    //dd($request->all());
    ResponseSurveys::create($request->all());
    Session::flash('encuestaOk','Encuesta enviada con exito, gracias por responder');
    return redirect()->route('home');
  }

  public function surveysResults(Request $request)
  {
    return Excel::download(new ResponseSurveysExport ($request->id), 'Resultados.xlsx');
  }

  public function surveysResultsPublic(Request $request)
  {
    return Excel::download(new ResponseSurveysPublicExport ($request->id), 'Resultados.xlsx');
  }

  public function destroy($id)
  {
    Surveys::find($id)->delete();
    Session::flash('message','La encuensta se elimino con exito');
    return redirect()->route('allSurveys');
  }

  public function surveyPublic(Request $request)
  {
    //dd($request->all());
    SurveyPublic::create($request->all())->save();

    Session::flash('encuesta','Gracias por realizar la encuenta, tu opinion es muy importante para nosotros');
    return redirect()->route('login');
  }

  public function chartSurvey($id)
  {
    $questionOne = SurveyPublic::where('question1',1)->count();
  }
}
