<?php

namespace App\Http\Controllers;

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
        ->join('cupon_buys', 'users.id', '=', 'cupon_buys.userId')
        ->select('users.id','users.codReference', 'cupon_buys.id', 'cupon_buys.userId','cupon_buys.created_at')
        ->where('userId',$idAuth)
        ->get();
        return view('home',compact('purachases'));
      } else {
        $clientCount = CuponBuy::count();
        $clients = User::where('roleId',2)->count();
        return view('home',compact('clientCount','clients'));
      }
    }

}
