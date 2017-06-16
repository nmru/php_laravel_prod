<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\Reportes;
use Illuminate\Support\Facades\Redirect;
use produccion\Http\Requests\ReportesFormRequest;
use PDF;
use DB;

class ReportePFController extends Controller
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
          $fecha = trim($request->get('F'));
          $pr = DB::table('procesos')->get();
          if($query == 'Firmado')
          {
              $p = DB::table('proceso as p')
                ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
                ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
                ->where('p.pFirmado',  'LIKE', '%1%')
                ->where ('p.Fecha',  'LIKE', '%'.$fecha.'%')
                ->orderBy('p.Id') 
                ->paginate(10);
            }
               elseif ($query == 'Prueba') 
               {
                 
                 $p = DB::table('proceso as p')
                    ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
                    ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
                    ->where('p.pPrueba',  'LIKE', '%1%')
                    ->where ('p.Fecha',  'LIKE', '%'.$fecha.'%')
                    ->orderBy('p.Id') 
                    ->paginate(10);
               }

         else
         {
                 
                 $p = DB::table('proceso as p')
                    ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
                    ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
                    ->where ('p.Fecha',  'LIKE', '%'.$fecha.'%')
                    ->orderBy('p.Id') 
                    ->paginate(10);            

         }      
              $r = count($p);
              if($r == 0) 
              {
                return  view('Reportes.ReportePF.index2');
              }
              else
              {
                 return  view('Reportes.ReportePF.index',["p"=>$p,"searchText"=>$query,"pr"=>$pr,"F"=>$fecha,"r"=>$r]);
              }
       
        }
    }

    public function getPDF(Request $request)
    {
       $p = trim($request->get('searchText'));
       $fecha = trim($request->get('F'));
            if($p == 'Firmado')
             {
                if($fecha == "")
                {
                   $rep =Reportes::where('pFirmado',"1")
                        ->get();
                }
                else
                {
                  $rep =Reportes::where('Fecha',$fecha)
                       ->where('pFirmado',"1")
                        ->get();
                }        
             }
               
             if($p == 'Prueba')
             {
               if($fecha == "")
                {
                  $rep =Reportes::where('pPrueba',"1")
                     ->get();
                }

                else
                {
                  $rep =Reportes::where('Fecha',$fecha)
                       ->where('pPrueba',"1")
                       ->get();
                }        
             }
              
            if($fecha !="")
            {
               if($p == 'Firmado')
                {
                  $rep =Reportes::where('Fecha',$fecha)
                     ->where('pFirmado',"1")
                     ->get();
                }

                if($p == 'Prueba')
                {
                  $rep =Reportes::where('Fecha',$fecha)
                       ->where('pPrueba',"1")
                       ->get();
                } 

                if($p == "")
                {
                  $rep =Reportes::where('Fecha',$fecha)
                       ->get();
                }       


            }


            if($fecha =="" && $p=="")
            {
                $rep =Reportes::where('Fecha',$fecha)
                       ->get();
            }


       $pdf =PDF::loadView('Reportes/ReportePF/view', ['rep'=>$rep]);
       return $pdf->stream('reportePF.pdf');
    }
}
