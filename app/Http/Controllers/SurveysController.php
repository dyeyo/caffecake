<?php

namespace App\Http\Controllers;

use App\Exports\ResponseSurveysExport;
use App\ResponseSurveys;
use App\Surveys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

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
    //dd($request->all());
    return Excel::download(new ResponseSurveysExport ($request->id), 'Resultados.xlsx');
    //$data = ResponseSurveys::where('surveysId',$id)->get();
    //dd($data);
  }

  public function destroy($id)
    {
      Surveys::find($id)->delete();
      Session::flash('message','LA encuensta se elimino con exito');
      return redirect()->route('allSurveys');
    }
}
