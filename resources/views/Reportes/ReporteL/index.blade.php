@extends ('Layouts.admin')
@section('contenido')
 <div class = "row">
    <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12" >
        <h3>Reporte de Dispositivo por Lote</h3>
        @include ('Reportes.ReporteL.searchU')

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
					<th>Lote</th>
					<th>Firmado</th>
					<th>Prueba</th>
					<th>Fecha</th>
					<th>Issue</th>
				</thead>
				@foreach($p as $pr)
				<tr>
				   <td>{{ $pr-> Id }}</td>
				   <td>{{ $pr-> Serie}}</td>
				   <td>{{ $pr-> Mac}}</td>
				   <td>{{ $pr-> Lote}}</td>
				    <td align="center" style="width: 2%">
				        @if($pr-> pFirmado == '1')
				           <i class="fa fa-check" style="color:green"></i>
				        @else
				             <i class="fa fa-close" style="color:red"></i>
				        @endif
				   </td>
				   <td align="center" style="width: 2%">
                        @if($pr-> pPrueba == '1')
				             <i class="fa fa-check" style="color:green"></i>
				        @else
				             <i class="fa fa-close" style="color:red"></i>
				        @endif

				   </td>
				   <td>{{ $pr-> Fecha}}</td>
				   <td>{{ $pr-> Issue}}</td> 
				</tr>
				@endforeach
		</table>
		@php
		  $query = $searchText;
		@endphp
    </div>
    <div>      
       <a href="/Reportes/rLoteD?searchText={{$query}}" target="_blank"><button class="btn btn-success btn-lg btn-block">GENERAR PDF&nbsp;&nbsp;<i class="fa fa-file-pdf-o"></i></button></a>
    </div>
    {{$p->render()}}
 </div>
</div>
@endsection