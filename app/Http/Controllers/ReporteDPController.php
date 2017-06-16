<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\Reportes;
use Illuminate\Support\Facades\Redirect;
use produccion\Http\Requests\ReportesFormRequest;
use PDF;
use DB;

class ReporteDPController extends Controller
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
          $proceso = trim($request->get('prs'));
          $pr = DB::table('procesos')->get();

          if($proceso == "Firmado")
           {

                $p = DB::table('proceso as p')
               ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
               ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
               ->where('p.Serie',  'LIKE', '%'.$query.'%')
               ->where('p.pFirmado',  'LIKE', '%1%')
               ->orderBy('p.Id') 
               ->paginate(10);

           }

            elseif($proceso == "Prueba")
            {
              $p = DB::table('proceso as p')
               ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
               ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
               ->where('p.Serie',  'LIKE', '%'.$query.'%')
               ->where('p.pPrueba',  'LIKE', '%1%')
               ->orderBy('p.Id') 
               ->paginate(10);
             }

         else
         {
              $p = DB::table('proceso as p')
               ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
               ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
               ->where('p.Serie',  'LIKE', '%'.$query.'%')
               ->orderBy('p.Id') 
               ->paginate(10);

         }        

           $r = count($p);
              if($r == 0) 
              {
                return View('Reportes.ReporteDP.index2');
              }
              else
              {
                 return  view('Reportes.ReporteDP.index',["p"=>$p,"searchText"=>$query,"pr"=>$pr,"prs"=>$proceso,"r"=>$r]);
              }
        }
    }

     public function getPDF(Request $request)
    {
       
       $q = trim($request->get('searchText'));
       $p = trim($request->get('prs'));
       
             if($p == 'Firmado')
             {
                if($q == "")
                {
                   $rep =Reportes::where('pFirmado',"1")
                        ->get();
                }
                else
                {
                  $rep =Reportes::where('Serie',$q)
                       ->where('pFirmado',"1")
                        ->get();
                }        
             }
               
             if($p == 'Prueba')
             {
               if($q == "")
                {
                  $rep =Reportes::where('pPrueba',"1")
                     ->get();
                }

                else
                {
                  $rep =Reportes::where('Serie',$q)
                       ->where('pPrueba',"1")
                       ->get();
                }        
             }

            if($q !="")
             {
               if($p == 'Firmado')
                {
                  $rep =Reportes::where('Serie',$q)
                     ->where('pFirmado',"1")
                     ->get();
                }

                if($p == 'Prueba')
                {
                  $rep =Reportes::where('Serie',$q)
                       ->where('pPrueba',"1")
                       ->get();
                } 

                if($p == "")
                {
                  $rep =Reportes::where('Serie',$q)
                       ->get();
                }       
             }

             if($p == "" && $q == "")
                {
                  $rep =Reportes::where('Serie',$q)
                       ->get();
                }       
             
       $pdf =PDF::loadView('Reportes/ReporteDP/view', ['rep'=>$rep]);
       return $pdf->stream('reporteDP.pdf');
    }
}
