@extends ('Layouts.admin')
@section('contenido')
 <div class = "row">
    <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-14" >
        <h3>Firmado</h3>
        
    </div>
 </div>

 <div class = "row">
    <div class = "col-lg-12 col-md-12 col-sm-12 col-xs-14" >
       <div class = "table-resposive">
         <table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>MAC</th>
					<th>Release</th>
					<th>Version</th>
					<th>Fecha</th>
					<th>Flasheos</th>
					<th>Licencia</th>
					<th>RPCD</th>
					<th>Internet</th>
                    <th>Prueba_1</th>
                    <th>Prueba_2</th>
                    <th>Prueba_3</th>
                    <th>Prueba_4</th>
                    <th>Prueba_5</th>
					<th>Comentarios</th>
				</thead>
				@foreach($p as $prs)
				<tr align="center">
				   <td>{{ $prs-> Hardware_Id }}</td>
				   <td>{{ $prs-> Saint_Release }}</td>
				   <td>{{ $prs-> Saint_Version }}</td>
				   <td>{{ $prs-> Update_Time}}</td>
				   <td>{{ $prs-> Flashed_Times}}</td>
				   <td>{{ $prs-> License_Status}}</td>
				   <td>{{ $prs-> RPCD_Status}}</td>
				   <td>{{ $prs-> Internet_Connectivity}}</td>
				   <td>{{ $prs-> Filter_Test1_Status}}</td>
				   <td>{{ $prs-> Filter_Test2_Status}}</td>
				   <td>{{ $prs-> Filter_Test3_Status}}</td>
				   <td>{{ $prs-> Filter_Test4_Status}}</td>
				   <td>{{ $prs-> Filter_Test5_Status}}</td>
				   <td>{{ $prs-> Comments}}</td>
				</tr>
				@endforeach
		</table>
		
    </div>
    {{$p->render()}}
 </div>

@endsection
