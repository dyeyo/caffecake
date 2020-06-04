<?php

namespace App\Http\Controllers;

use App\BuysGeneral;
use App\ClientCard;
use App\CuponBuy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferenceClients;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $idAuth=Auth()->user()->id;
      $rol=Auth()->user()->roleId;
      if ($rol == 2) {
        $purachases = DB::table('users')
                  ->join('client_cards', 'users.id', '=', 'client_cards.userId')
                  ->select('users.id','client_cards.codReference', 'client_cards.id', 'client_cards.userId',
                          'client_cards.created_at')
                  ->where('userId',$idAuth)
                  ->get();

        $countPurachases = count($purachases);

        $purachasesClientRegular = DB::table('users')
                  ->join('buys_generals', 'users.id', '=', 'buys_generals.userId')
                  ->select('users.id','users.name', 'users.lastname','buys_generals.id', 'buys_generals.userId',
                          'buys_generals.created_at')
                  ->where('userId',$idAuth)
                  ->get();

        $countPurachasesClientRegular = count($purachasesClientRegular);

        $codeClient = ClientCard::select('codReference')
                            ->where('state',1)
                            ->where('userId',$idAuth)
                            ->get();

        $codeReferenceUser = DB::table('users')
                            ->leftJoin('client_cards', 'users.id', '=', 'client_cards.userId')
                            ->select('client_cards.codReference')
                            ->where('client_cards.state',1)
                            ->where('userId',$idAuth)
                            ->get();

        if ($codeReferenceUser != '[]') {
          $codReference = $codeReferenceUser[0];
          $codReferenceClient = DB::table('users')
                            ->leftJoin('buys_generals', 'users.id', '=', 'buys_generals.userId')
                            ->select('id','userReferide','name','buys_generals.userId','buys_generals.referideComplete')
                            ->where('buys_generals.referideComplete',1)
                            ->where('userReferide',$codReference->codReference)
                            ->count();

          return view('home',compact('purachases','codeClient','codReferenceClient',
                                    'purachasesClientRegular','countPurachases'));
        }
        return view('home',compact('purachasesClientRegular','countPurachasesClientRegular'));

      } else {
        $clients = User::where('roleId',2)->count();
        $totalBuysRegular = BuysGeneral::count();
        $totalBuysEspecial = CuponBuy::count();
        $totalBuys = $totalBuysRegular + $totalBuysEspecial;
        $especialClients = ClientCard::where('state',1)->count();
        return view('home',compact('clients','especialClients','totalBuys'));
      }
    }

    public function sendEmail(Request $request)
    {
      Mail::to($request->emialReferide)->send(new ReferenceClients());
      Session::flash('message', 'El codigo de usario no existe, intenta nuevamente');
      return redirect()->route('home');
    }
}
