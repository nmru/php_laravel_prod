<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\User;
use Illuminate\Support\Facades\Redirect;
use produccion\Http\Requests\UsuarioFormRequest;
use produccion\Http\Requests\UpdateUserFormRequest;
use produccion\Http\Requests\UpdateUserPassFormRequestt;
use DB;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(Request $request)
    {
       if($request)
        {
          $query = trim($request->get('searchText'));
          $u = DB::table('users as usr')
               ->join('rol as r','usr.Id_Rol','=','r.Id_Rol')
               ->select('usr.Id','usr.Nom','usr.Ap','usr.username','usr.password','usr.Dpto','usr.Puesto','r.Rol as Rol')
               ->where ('usr.Nom' , 'LIKE', '%'.$query.'%')
               ->orwhere ('usr.Ap',  'LIKE', '%'.$query.'%')
               ->orwhere('usr.username', 'LIKE', '%'.$query.'%')
               ->orderBy('usr.Id')
               ->paginate(10);


          return  view('Usuario.usuario.index',["u"=>$u,"searchText"=>$query]);
        }
    }

    public function create()
    {
       $roles = DB::table('rol')->get();
       return view("Usuario.usuario.create",["roles"=>$roles]);
    }

    public function store(UsuarioFormRequest $request)
    {
       $us = new User;
       $us->Nom = $request->get('N');
       $us->Ap = $request->get('A');
       $us->username = $request->get('U');
       $us->password= bcrypt($request->get('C'));
       $us->Dpto= $request->get('D');
       $us->Puesto = $request->get('P');
       $us->Id_Rol = $request->get('R');

       echo $request;

       $us -> save();
       return Redirect::to ('Usuario/usuario');

    }

    public function show($id)
    {
       return view("Usuario.usuario.show",["us"=>User::findOrFail($id)]);
    }

    public function edit($id)
    {
        $us=User::findOrFail($id);
        $roles = DB::table('rol')->get();
        return view("Usuario.usuario.edit",["us"=>$us,"roles"=>$roles]);
    }


    public function update(UpdateUserFormRequest $request,$id)
    {
        $us = User::findOrFail($id);
        $us->Nom = $request->get('N');
        $us->Ap = $request->get('A');
        $us->username  = $request->get('U');
        $us->Dpto= $request->get('D');
        $us->Puesto = $request->get('P');
        $us->Id_Rol = $request->get('R');
         
        $us -> update();
        return Redirect:: to ('Usuario/usuario');
    }

    public function destroy($id)
    {
        $us = User::findOrFail($id);
                 
        $us -> delete();
        return Redirect:: to ('Usuario/usuario');
    }

 }
