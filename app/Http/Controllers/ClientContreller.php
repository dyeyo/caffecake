<?php

namespace App\Http\Controllers;

use App\ClientCard;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ClientContreller extends Controller
{

    public function index()
    {
      //$clients = User::with('cartClient')->where('roleId',2)->get();
      $clients = DB::table('users')
                  ->Join('client_cards', 'users.id', '=', 'client_cards.userId')
                  ->select('users.id','users.name','users.lastname','users.numIndentificate',
                          'users.mobile','client_cards.codReference', 'client_cards.id',
                          'client_cards.userId','client_cards.created_at')
                  ->where('users.roleId',2)
                  ->get();

      $regularclients = DB::table('users')
                  ->leftJoin('client_cards', 'users.id', '=', 'client_cards.userId')
                  ->select('users.id','users.name','users.lastname','users.numIndentificate',
                          'users.mobile')
                  ->where('users.roleId',2)
                  ->where('client_cards.userId',null)
                  ->get();
      //dd($regularclients[0]);

      return view('clients.index', compact('clients','regularclients'));
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

    public function referide()
    {
      return view('registrerReferides');
    }

    public function create_referide(Request $request)
    {
      //dd($request->all());
      if (ClientCard::where('codReference', '=', $request->userReferide)->exists()) {
        $client = new User();
        $client->name = $request->name;
        $client->lastname = $request->lastname;
        $client->numIndentificate = $request->numIndentificate;
        $client->email = $request->email;
        $client->userReferide = $request->userReferide;
        $client->password = Hash::make($request->password);
        $client->mobile = $request->mobile;
        $client->roleId = 2;
        $client->save();
        return redirect()->route('home');
      }else{
        Session::flash('message', 'El codigo de usario no existe, intenta nuevamente');
        return redirect()->route('referide');
      }

    }

    public function referideDiscount(Request $request, User $user, ClientCard $clientCard)
    {
        $users = $user->where('userReferide', $request->codeReferide)->get(['id','userReferide']);
        return $users;
    }

    public function updateUserReferides(Request $request)
    {
      User::where('userReferide', 'like', '%'.$request->userReferide.'%')->update(['userReferide'=>null]);
      Session::flash('message', 'Los el descueto de referidos del cliente fueron tomados con exito');
      return redirect()->route('home');
    }

}