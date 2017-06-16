<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\Reportes;
use Illuminate\Support\Facades\Redirect;
use produccion\Http\Requests\ReportesFormRequest;
use PDF;
use Dompdf\Dompdf;
use DB;

class ReporteIController extends Controller
{
      public function __construct()
    {
       $this->middleware('auth');
    }

    public function index(Request $request)
    {
       if($request)
        {

          $r="";
          $query = trim($request->get('searchText'));
          $is = DB::table('issue')->get();
          $p = DB::table('proceso as p')
               ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
               ->select('p.Id','p.Serie','p.Mac','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
               ->where ('i.Nom',  'LIKE', '%'.$query.'%')
               ->orderBy('p.Id')
               ->paginate(10);
              
              $r = count($p);
              if($r == 0 ) 
              {
                 $r=0;
                return View('Reportes.ReporteI.index2');
              }
              else
              {
                 return View('Reportes.ReporteI.index',["p"=>$p,"searchText"=>$query,"is"=>$is,"r"=>$r]);
              }
              return $r;
        }

    }

    public function getPDF(Request $request)
    {
       $i = 0;
       $q = trim($request->get('searchText'));
             if($q == 'Firmado')
             {
                $i = 1;
             }
                 
             if($q == 'Prueba')
             {
                 $i = 2;
             }

             if($q == 'Ninguno')
             {
                 $i = 3;
             }
               

      $rep =Reportes::where('Id_Issue',$i)
             ->get();
      $pdf =PDF::loadView('Reportes/ReporteI/view', ['rep'=>$rep]);
      return $pdf->stream('reporteI.pdf');
    }
}