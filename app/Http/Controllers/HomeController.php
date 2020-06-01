<?php

namespace App\Http\Controllers;

use App\ClientCard;
use App\CuponBuy;
use App\User;
use Illuminate\Support\Facades\DB;

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
        ->select('users.id','client_cards.codReference', 'client_cards.id', 'client_cards.userId','client_cards.created_at')
        ->where('userId',$idAuth)
        ->get();
        $codeClient = ClientCard::select('codReference')
                            ->where('state',1)
                            ->where('userId',$idAuth)
                            ->get();
        //dd($codeClient);
        return view('home',compact('purachases','codeClient'));
      } else {
        $clientCount = CuponBuy::count();
        $clients = User::where('roleId',2)->count();
        return view('home',compact('clientCount','clients'));
      }
    }

}
