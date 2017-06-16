<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\Produccion;
use Illuminate\Support\Facades\Redirect;
use produccion\Http\Requests\ProduccionFormRequest;
use DB;


class ProduccionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {       
       $p= Produccion::Firmado()->paginate(10);

          return  view('Produccion.produccion.index',["p"=>$p]);
        
    }
}
