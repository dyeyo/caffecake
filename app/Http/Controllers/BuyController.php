<?php

namespace App\Http\Controllers;

use App\CuponBuy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BuyController extends Controller
{
  public function index(CuponBuy $cuponBuy)
  {
    $buys = CuponBuy::with('user')->get();
    $frecuentClients = User::select('id','codReference')
            ->get();
    $clients = User::select('id','numIndentificate','codReference')
    ->where('codReference' , null)
            ->get();
    return view('buys.index',compact('buys','clients','frecuentClients'));
  }

  public function loadBuys($id)
  {
    return response()->json(CuponBuy::where('userId', $id)->get());
  }

  public function store(Request $request)
  {
    CuponBuy::create($request->all());
    Session::flash('message', 'Venda registrada con exito');
    return redirect()->route('buys');
  }

  public function createClient(Request $request)
  {
    $client = new User();
    $client->name = $request->name;
    $client->lastname = $request->lastname;
    $client->numIndentificate = $request->numIndentificate;
    $client->email = $request->email;
    $client->password = Hash::make($request->numIndentificate);
    $client->mobile = $request->mobile;
    $client->roleId = 2;
    $client->save();
    return redirect()->route('buys');
  }

  public function listPurchaseClient()
  {
    $purachase = CuponBuy::with('user')->where(Auth()->user()->id)->get();
    return view('home',compact('purachase'));

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
