@extends ('Layouts.admin')
@section('contenido')
 <div class = "row">
    <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12" >
        <h3>Listado de Dispositivos
               <a href="device/create"><button class = "btn btn-success pull-right">Agregar Device &nbsp;&nbsp;<i class="fa fa-plus"></i></button></a>
        </h3>
        <br><br>
        @include ('Device.device.searchU')

    </div>
 </div>

 <div class = "row">
    <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12" >
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
					<th>Opciones</th>
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
                   <td style="width: 10%">
                      <a href="{{URL::action('DeviceController@edit',$pr->Id)}}"><button class="btn btn-info "><i class="fa fa-edit"></i></button></a>
                      <a href="#" data-target="#modal-delete-{{$pr->Id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                   </td>  
				</tr>
				@include('Device.device.modal')
				@endforeach
		</table>
            
           

      </div>
    {{$p->render()}}
   </div>
  </div>
@endsection