<!DOCTYPE html>
<html>
<head>
    
    <h2 align="center" style="font-family: sans-serif;">Reporte por Tipo de Issue</h2>

<style type="text/css">
 table.GeneratedTable
  {
    width: 100%;
    background-color: #ffffff;
    border-collapse: collapse;
    border-width: 2px;
    border-color: #32cdc9;
    border-style: solid;
    color: #000000;
 }

 table.GeneratedTable td, table.GeneratedTable th 
 {
   border-width: 2px;
   border-color: #32cdc9;
   border-style: solid;
   padding: 3px;
 }

 table.GeneratedTable thead 
 {
  background-color: #32cdc9;
 }

</style>
  
</head> 
<body>
    <p style="text-align: right; font-size: 18px; font-family: sans-serif;font-weight: bold;">
      @php
        echo "Fecha: " . date("F") . "  " . date("d") . "  " . date("Y");
      @endphp
     </p> 
     <table class="GeneratedTable" align="center" style="font-family: sans-serif; font-size: 14px">
        <thead align="center">
          <tr>
           <th style="width: 1%">Id</td>
           <th style="width: 2%">Num. Serie</th>
           <th style="width: 2%">MAC Address</th>
           <th style="width: 2%">Firmado</th>
           <th style="width: 2%">Prueba</th>
           <th style="width: 2%">Fecha</th>
           <th style="width: 2%">Issue</th> 
         </tr>
        </thead>
        <tbody>
        @foreach($rep as $r => $pr)
        <tr align="center">
          <td>{{ $pr-> Id }}</td>
          <td>{{ $pr-> Serie}}</td>
          <td>{{ $pr-> Mac}}</td>
          <td>
             @if($pr -> pFirmado == 1)
                 Realizado
             @else
                 Pendiente    
             @endif 
          </td>
          <td>
             @if($pr -> pPrueba == 1)
                 Realizado
             @else
                 Pendiente    
             @endif 
          </td>
          <td>{{ $pr-> Fecha}}</td>
          <td>
             @if($pr -> Id_Issue == 1)
                 Firmado
             @endif 
             @if($pr -> Id_Issue == 2)
                Prueba
             @endif   
             @if($pr -> Id_Issue == 3)
                 Ninguno 
             @endif    
            
          </td> 
        </tr>
        @endforeach
        </tbody>
     </table>
     <br>
      <p align="right" style="font-size: 18px; font-family: sans-serif;font-weight: bold;">
        @php
           if(isset($r))
             {
               $r=$r+1;
               echo "Total de Registros Encontrados: ". $r;
    
             }
           else
            {
               $r=0;
               echo "Total de Registros Encontrados: ". $r;
            } 
        @endphp
       </p>
       
</body>
</html>