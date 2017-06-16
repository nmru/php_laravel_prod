@extends ('Layouts.admin')
@section('contenido')
 <div class = "row">
    <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12" >
        <h3>Listado de Usuarios <a href="usuario/create"><button class = "btn btn-success pull-right">Agregar Usuario &nbsp;&nbsp;<i class="fa fa-user-plus"></i></button></a></h3>
        <br><br>
        @include ('Usuario.usuario.searchU')

    </div>
 </div>

 <div class = "row">
    <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12" >
       <div class = "table-resposive">
         <table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Usuario</th>
					<th>Departamento</th>
					<th>Puesto</th>
					<th>Rol</th>
					<th>Opciones</th>
				</thead>
				@foreach($u as $us)
				<tr>
				   <td>{{ $us-> Id }}</td>
				   <td>{{ $us-> Nom}}</td>
				   <td>{{ $us-> Ap}}</td>
				   <td>{{ $us-> username}}</td>
				   <td>{{ $us-> Dpto}}</td>
				   <td>{{ $us-> Puesto}}</td>
                   <td>{{ $us-> Rol}}</td>
                   <td style="width: 13%">
                      <a href="{{URL::action('UsuarioController@edit',$us->Id)}}"><button class="btn btn-info"><i class="fa fa-edit "></i></button></a>
                      <a href="{{URL::action('passController@edit',$us->Id)}}"><button class="btn btn-warning"><i class="fa fa-lock"></i></button></a>
                      <a href="#" data-target="#modal-delete-{{$us->Id}}" data-toggle="modal"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                   </td>  
				</tr>
				@include('Usuario.usuario.modal')
				@endforeach
		 </table>
       </div>
     {{$u->render()}}
   </div>
 </div>
@endsection
