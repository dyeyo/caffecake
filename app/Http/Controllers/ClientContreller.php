<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClientContreller extends Controller
{

    public function index()
    {
      $clients = User::all();
      $code = User::select('id','codReference')->get();
      return view('clients.index', compact('clients','code'));
    }

    public function create()
    {
      return view('clients.create');
    }

    public function activateTarjet(Request $request, User $user)
    {
      $user->update($request->all());
      Session::flash('message', 'Cliente  frecuente actualizado con exito');
      return redirect()->route('clients');
    }

    public function show($id)
    {
        //
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
