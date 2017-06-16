<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\User;
use Illuminate\Support\Facades\Redirect;

class adminController extends Controller
{
     public function __construct()
    {
        
    }

    public function index(Request $request)
    {
         return  view('Rol.indexa');
    }
}
