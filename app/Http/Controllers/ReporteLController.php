<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\Reportes;
use Illuminate\Support\Facades\Redirect;
use produccion\Http\Requests\ReportesFormRequest;
use PDF;
use DB;

class ReporteLController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
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
               ->orderBy('p.Id') 
               ->paginate(10);
          $r = count($p);
              if($r == 0) 
              {
                return View('Reportes.ReporteL.index2');
              }
              else
              {
                 return  view('Reportes.ReporteL.index',["p"=>$p,"searchText"=>$query]);
              }
         }

      }

     public function getPDF(Request $request)
    {

       $q = trim($request->get('searchText'));
       $rep =Reportes::where('Serie',$q)
                      ->orwhere('Mac',$q)
                      ->orwhere('Lote',$q)
                      ->get();
       $pdf =PDF::loadView('Reportes/ReporteL/view', ['rep'=>$rep,'q'=>$q]);
       return $pdf->stream('reporteLD.pdf');
    }
}
