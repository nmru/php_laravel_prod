@extends ('Layouts.admin')
@section('contenido')
 <div class = "row">
    <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12" >
        <h3>Reporte de Procesos Entre Rango de Fechas </h3>
        @include ('Reportes.ReportePRF.searchU')

    </div>
 </div>

 <div class = "row">
    <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12" >
       <div class = "table-resposive">
         <table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Num. Serie</th>
					<th>MAC Address</th>
					<th>Firmado</th>
					<th>Prueba</th>
					<th>Fecha</th>
					<th>Issue</th>
				</thead>
				@foreach($p as $prs)
				<tr>
				   <td>{{ $prs-> Id }}</td>
				   <td>{{ $prs-> Serie}}</td>
				   <td>{{ $prs-> Mac}}</td>
				   <td align="center" style="width: 2%">
				        @if($prs-> pFirmado == '1')
				           <i class="fa fa-check" style="color:green"></i>
				        @else
				             <i class="fa fa-close" style="color:red"></i>
				        @endif
				   </td>
				   <td align="center" style="width: 2%">
                        @if($prs-> pPrueba == '1')
				             <i class="fa fa-check" style="color:green"></i>
				        @else
				             <i class="fa fa-close" style="color:red"></i>
				        @endif

				   </td>
				   <td>{{ $prs-> Fecha}}</td>
				   <td>{{ $prs-> Issue}}</td>
				</tr>
				@endforeach
		</table>
		@php
          $pr = $searchText;
          $fI = $f1;
          $fT = $f2;
		@endphp
    </div>
     <div>      
        <a href="/Reportes/rProcesoRF?searchText={{$pr}}&f1={{ $fI}}&f2={{ $fT}}" target="_blank">
        <button class="btn btn-success btn-lg btn-block">GENERAR PDF &nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button></a>
    </div>
    {{$p->render()}}
 </div>

@endsection

