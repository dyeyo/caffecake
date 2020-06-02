<?php

namespace App\Http\Controllers;

use App\ClientCard;
use App\CuponBuy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReferenceClients;

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

        $codeClient = ClientCard::select('codReference')
                            ->where('state',1)
                            ->where('userId',$idAuth)
                            ->get();

        $codeReferenceUser = DB::table('users')
                            ->join('client_cards', 'users.id', '=', 'client_cards.userId')
                            ->select('client_cards.codReference')
                            ->where('client_cards.state',1)
                            ->where('userId',$idAuth)
                            ->get();

        $x = $codeReferenceUser[0];
        //dd($x);

        $codReferenceClient = DB::table('users')
                            ->join('client_cards', 'users.id', '=', 'client_cards.userId')
                            ->select('users.id','users.userReferide','users.name','client_cards.codReference','client_cards.state')
                            //->where('client_cards.id',$idAuth)
                            ->where('client_cards.state',1)
                            ->where('users.userReferide',$x->codReference)
                            ->count();
        //dd($codReferenceClient);
        return view('home',compact('purachases','codeClient','codReferenceClient'));
      } else {
        $clientCount = CuponBuy::count();
        $clients = User::where('roleId',2)->count();
        return view('home',compact('clientCount','clients'));
      }
    }

    public function sendEmail(Request $request)
    {
      Mail::to($request->emialReferide)->send(new ReferenceClients());
    }
}
