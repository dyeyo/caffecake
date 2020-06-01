<?php

namespace App\Http\Controllers;

use App\ClientCard;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ClientContreller extends Controller
{

    public function index()
    {
      //$clients = User::with('cartClient')->where('roleId',2)->get();
      $clients = DB::table('users')
        ->join('client_cards', 'users.id', '=', 'client_cards.userId')
        ->select('users.id','users.name','users.lastname','users.numIndentificate',
                'users.mobile','client_cards.codReference', 'client_cards.id',
                'client_cards.userId','client_cards.created_at')
        ->where('users.roleId',2)
        ->get();
      //dd($clients);
      return view('clients.index', compact('clients',));
    }

    public function create()
    {
      return view('clients.create');
    }

    public function activateTarjet(Request $request, ClientCard $clientCard)
    {
      $clientCard->create($request->all());
      Session::flash('message', 'Cliente  frecuente actualizado con exito');
      return redirect()->route('clients');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
      User::find($id)->delete();
      Session::flash('message','El Cliente se elimino con exito');
      return redirect()->route('clients');
    }
}
