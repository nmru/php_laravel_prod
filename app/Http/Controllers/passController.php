<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\passModel;
use produccion\User;
use Illuminate\Support\Facades\Redirect;
use produccion\Http\Requests\UpdateUserPassFormRequest;
use DB;

class passController extends Controller
{
    //  public function __construct()
    // {
    //     $this->middleware('admin');
    // }

    public function index()
    {
     
    }

    public function create()
    {
       
    }

    public function store()
    {
      
    }

    public function show($id)
    {
       
    }

    public function edit($id)
    {
        $us=User::findOrFail($id);
        $roles = DB::table('rol')->get();
        return view("Pass.pass.edit",["us"=>$us,"roles"=>$roles]);
    }


    public function update(UpdateUserPassFormRequest $request,$id)
    {
        $us = User::findOrFail($id);
        $us->password= bcrypt($request->get('password'));
         
        $us -> update();
        return Redirect:: to ('Usuario/usuario');
    }

    public function destroy($id)
    {
        
       
    }


}
