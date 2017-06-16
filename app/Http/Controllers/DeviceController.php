<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\Device;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use produccion\Http\Requests\DeviceFormRequest;
use Illuminate\Support\ServiceProvider;
use produccion\Http\Requests\DeviceUpdateRequest;
use DB;

class DeviceController extends Controller
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
          $p = DB::table('proceso as p')
               ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
               ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
               ->where ('p.Serie' , 'LIKE', '%'.$query.'%')
               ->orwhere ('p.Mac',  'LIKE', '%'.$query.'%')
               ->orwhere ('p.Lote',  'LIKE', '%'.$query.'%')
               ->orwhere ('i.Nom',  'LIKE', '%'.$query.'%')
               ->orderBy('p.Id') 
               ->paginate(10); 
            

          return  view('Device.device.index',["p"=>$p,"searchText"=>$query]);
        }
          
    }

    public function create()
    {
       $pr = DB::table('procesos')->get();
       $is = DB::table('issue')->get();
       return view("Device.device.create",["pr"=>$pr,"is"=>$is]);
    }

    public function store(DeviceFormRequest $request)
    {
     
       $pr = new Device;
       $pr->Serie = $request->get('S');
       $pr->Mac= $request->get('M');
       $pr->Lote = $request->get('L');
       // $pr->pEtiquetado = $request->get('PE');
       // $pr->pMaquinado= $request->get('PM');
       $pr->pFirmado =Input::has('PF');
       $pr->pPrueba = Input::has('PP');
       $pr->Fecha= $request->get('F');
     
       $pr->Id_Issue = $request->get('I');
    
       $pr -> save();
       return Redirect::to ('Device/device');

    }

    public function show($id)
    {
       return view("Device.device.show",["pr"=>Device::findOrFail($id)]);
    }

    public function edit($id)
    {
        $pr=Device::findOrFail($id);
        $prp = DB::table('procesos')->get();
        $is = DB::table('issue')->get();
        return view("Device.device.edit",["pr"=>$pr,"prp"=>$prp,"is"=>$is]);
    }

    public function update(DeviceUpdateRequest $request,$id)
    {
       $pr = Device::findOrFail($id);
       $pr->Serie = $request->get('S');
       $pr->Mac= $request->get('M');
       $pr->Lote = $request->get('L');
       // $pr->pEtiquetado = $request->get('PE');
       // $pr->pMaquinado= $request->get('PM');
       $pr->pFirmado =Input::has('PF');
       $pr->pPrueba = Input::has('PP');
       $pr->Fecha= $request->get('F');
       $pr->Id_Issue = $request->get('I');
         
         $pr -> update();
         return Redirect:: to ('Device/device');
    }

    public function destroy($id)
    {
        $pr = Device::findOrFail($id);      
        $pr -> delete();
        return Redirect:: to ('Device/device');
    }
}
