<?php

namespace App\Http\Controllers;

use App\BuysGeneral;
use App\ClientCard;
use App\CuponBuy;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class BuyController extends Controller
{
  public function index(CuponBuy $cuponBuy)
  {
    $buys = CuponBuy::with('clientCard.user')->get();
    $buysRegular = BuysGeneral::with('user')->get();
    return view('buys.index',compact('buys','buysRegular'));
  }

  public function loadBuys($id)
  {
    return response()->json(CuponBuy::where('regularClienteId', $id)->get());
  }

  public function create()
  {
    $frecuentClients = ClientCard::select('id','codReference')->where('state',1)->get();
    $clients = User::select('id','numIndentificate')->where('roleId',2)->get();
    return view('buys.create',compact('clients','frecuentClients'));
  }

  public function store(Request $request)
  {
    //dd($request->all());
    $countBuys = CuponBuy::where('regularClienteId',$request->regularClienteId)->count();
    if ($countBuys == 12) {
      //dd($request->userId);
      $clietCartState = ClientCard::find($request->userId);
      $clietCartState->state = 2;
      $clietCartState->update();
      //dd($clietCartState);
      ClientCard::create([
        'codReference' => random_int(1001,5000),
        'state' => 1,
        'userId' => $request->userId
      ]);
      $venta = CuponBuy::create([
        'regularClienteId'=>$request->regularClienteId
      ]);
      Session::flash('message', 'Venta registrada con exito y tarjeta de usuario actualizada');
      return redirect()->route('buys');
    }
    //dd($request->all())
    $venta = CuponBuy::create([
      'regularClienteId'=>$request->regularClienteId,
      //'userId'=>$request->userId
    ]);
    $venta->save();
    Session::flash('message', 'Venda registrada con exito');
    return redirect()->route('buys');
  }

  public function storeRegular(Request $request)
  {
    //$allBuysGeneral = BuysGeneral::all();
    //dd($request->all());
    $codeUser = User::select('id','userReferide')->where('id',$request->userId)->get();
    foreach ($codeUser as $code) {
      $onlyCode = $code->userReferide;
    }

    if (BuysGeneral::where('userId', $request->userId)->exists() || $onlyCode == null) {
      BuysGeneral::create([
        'userId' => $request->userId,
      ]);
      Session::flash('message', 'Venda registrada con exito');
      return redirect()->route('buys');
    }

    BuysGeneral::create([
      'userId' => $request->userId,
    ]);

    Session::flash('messageReferide', 'PRIMERA COMPRA POR REFERIDO, RECLAMAR SU 2% DE DESCUENTO');
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

  public function codeRenovation(Request $request, User $user)
  {
    $user->update($request->all());
    return redirect()->route('buys');
  }

  public function destroy($id)
  {
    //
  }
}
