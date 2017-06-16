@extends ('Layouts.admin')
@section('contenido')
 <div class = "row">
    <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12" >
        <h3>Reporte de Procesos Entre Rango de Fechas </h3>
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
				<tr>
				   <td colspan="7">No Hay Registros que Mostrar!!!</td>
				</tr>
		</table>
    </div>
     <div>      
        <a href="/Reportes/ReportePRF"><button class="btn btn-success btn-lg btn-block">NUEVAS BUSQUEDA &nbsp;&nbsp;<i class="fa fa-search"></i></button></a>
    </div>
 </div>

@endsection