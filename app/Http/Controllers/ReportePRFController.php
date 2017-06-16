<?php

namespace produccion\Http\Controllers;

use Illuminate\Http\Request;
use produccion\Http\Requests;
use produccion\Reportes;
use Illuminate\Support\Facades\Redirect;
use produccion\Http\Requests\ReportesFormRequest;
use PDF;
use DB;

class ReportePRFController extends Controller
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
          $f1 = trim($request->get('f1'));
          $f2 = trim($request->get('f2'));
         
          if($query == 'Firmado')
          {
            if ($f1 == null and $f2 == null )
             {
               $pr = DB::table('procesos')->get();
               $p =  DB::table('proceso as p')
                    ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
                    ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
                    ->where ('p.pFirmado',  'LIKE', '%1%')
                    ->orderBy('p.Id') 
                    ->paginate(10);
             }

            else
            {
               $pr = DB::table('procesos')->get();
               $p =  DB::table('proceso as p')
                    ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
                    ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
                    ->where ('p.pFirmado',  'LIKE', '%1%')
                    ->whereBetween('p.Fecha', [$f1, $f2])
                    ->orderBy('p.Id') 
                    ->paginate(10);
            }
          }

          elseif($query == 'Prueba')
          {
            if ($f1 == null and $f2 == null )
             {
               $pr = DB::table('procesos')->get();
               $p =  DB::table('proceso as p')
                    ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
                    ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
                    ->where ('p.pPrueba',  'LIKE', '%1%')
                    ->orderBy('p.Id') 
                    ->paginate(10);
             }

            else
            {
               $pr = DB::table('procesos')->get();
               $p =  DB::table('proceso as p')
                    ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
                    ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
                    ->where ('p.pPrueba',  'LIKE', '%1%')
                    ->whereBetween('p.Fecha', [$f1, $f2])
                    ->orderBy('p.Id') 
                    ->paginate(10);
            }
          }

          else
          {
            if ($f1 == null and $f2 == null )
             {
               $pr = DB::table('procesos')->get();
               $p =  DB::table('proceso as p')
                    ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
                    ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
                    ->orderBy('p.Id') 
                    ->paginate(10);
             }

            else
            {
               $pr = DB::table('procesos')->get();
               $p =  DB::table('proceso as p')
                    ->join('issue as i','p.Id_Issue','=','i.Id_Issue')
                    ->select('p.Id','p.Serie','p.Mac','p.Lote','p.pFirmado','p.pPrueba','p.Fecha','i.Nom as Issue')
                    ->whereBetween('p.Fecha', [$f1, $f2])
                    ->orderBy('p.Id') 
                    ->paginate(10);
            }


          }
        
           $r = count($p);
              if($r == 0) 
              {
                return  view('Reportes.ReportePRF.index2');
              }
              else
              {
                 return  view('Reportes.ReportePRF.index',["p"=>$p,"searchText"=>$query,"pr"=>$pr,"f1"=>$f1,"f2"=>$f2,"r"=>$r]);
        
              } 
       }
    }

    public function getPDF(Request $request)
    {
       $q = trim($request->get('searchText'));
       $f1 = trim($request->get('f1'));
       $f2 = trim($request->get('f2'));

             if($q == 'Firmado')
             {
                if($f1 == "" && $f2 == "" )
                {
                   $rep =Reportes::where('pFirmado',"1")
                        ->get();
                }
                else
                {
                  $rep =Reportes::whereBetween('Fecha', [$f1, $f2])
                       ->where('pFirmado',"1")
                        ->get();
                }        
             }
               
             if($q == 'Prueba')
             {
              if($f1 == "" && $f2 == "" )
                {
                   $rep =Reportes::where('pPrueba',"1")
                        ->get();
                }
                else
                {
                  $rep =Reportes::whereBetween('Fecha', [$f1, $f2])
                       ->where('pPrueba',"1")
                        ->get();
                }        
             }

              if($f1 !=""|| $f2!="")
            {
               if($q == 'Firmado')
                {
                  $rep =Reportes::whereBetween('Fecha',[$f1, $f2])
                     ->where('pFirmado',"1")
                     ->get();
                }

                if($q == 'Prueba')
                {
                  $rep =Reportes::whereBetween('Fecha',[$f1, $f2])
                       ->where('pPrueba',"1")
                       ->get();
                } 

                if($q == "")
                {
                  $rep =Reportes::whereBetween('Fecha',[$f1, $f2])
                       ->get();
                }       


            }


            if($f1=="" && $f2=="" && $q=="")
            {
                $rep =Reportes::whereBetween('Fecha',[$f1, $f2])
                       ->get();
            }


       $pdf =PDF::loadView('Reportes/ReportePRF/view',['rep'=>$rep]);
       return $pdf->stream('reportePRF.pdf');
    }
}
