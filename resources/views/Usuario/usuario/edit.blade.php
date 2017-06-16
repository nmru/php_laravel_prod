@extends ('Layouts.admin')
@section ('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usuario: {{$us->Nom .' ' .$us->Ap}}</h3>
			

			{!!Form::model($us,['method'=>'PATCH','route'=>['usuario.update',$us->Id]])!!}
                  {{Form::token()}}

                  {{ csrf_field() }}

            <div class="form-group{{ $errors->has('N') ? ' has-error' : '' }}">
            	<label for="Nombre">Nombre:</label>
                  <div class="input-group">
                      <span class="input-group-addon" id="sizing-addon">
                          <i class="fa fa-address-book fa-fw " aria-hidden="true"></i>
                      </span>
            	    <input type="text" name="N" class="form-control" value="{{$us->Nom}}" placeholder="ej. Jesica Fabiola">
                  </div>    
                   @if ($errors->has('N'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('N') }}</strong>
                         </span>
                   @endif
            </div>
             <div class="form-group{{ $errors->has('A') ? ' has-error' : '' }}">
            	<label for="Apellido">Apellido:</label>
                   <div class="input-group">
                      <span class="input-group-addon" id="sizing-addon">
                          <i class="fa fa-address-book fa-fw" aria-hidden="true"></i>
                      </span>
            	    <input type="text" name="A" class="form-control" value="{{$us->Ap}}" placeholder="Rosas Martinez">
                </div> 
                @if ($errors->has('A'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('A') }}</strong>
                         </span>
                @endif   
            </div>
            <div class="form-group{{ $errors->has('U') ? ' has-error' : '' }}">
                  <label for="Usuario">Usuario:</label>
                  <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon3">
                           <i class=" fa fa-user-o fa-fw"></i>
                        </span>
                        <input type="text" name="U" class="form-control" value="{{$us->username}}" placeholder="ej. jrosas"  readonly="true">
                  </div> 
                   @if ($errors->has('U'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('U') }}</strong>
                         </span>
                    @endif     
            </div>
            <div class="form-group{{ $errors->has('D') ? ' has-error' : '' }}">
            	<label for="Departamento">Departamento:</label>
                  <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon5">
                          <i class=" fa fa-university fa-fw"></i>
                        </span>
            	      <input type="text" name="D" class="form-control" value="{{$us->Dpto}}" placeholder="ej. Mercadotecnia">
                  </div> 
                    @if ($errors->has('D'))
                        <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('D') }}</strong>
                         </span>
                    @endif     
            </div>
            <div class="form-group{{ $errors->has('P') ? ' has-error' : '' }}">
            	<label for="Puesto">Puesto:</label>
                  <div class="input-group">
                       <span class="input-group-addon" id="sizing-addon6">
                          <i class=" fa  fa-suitcase fa-fw"></i>
                       </span>
            	     <input type="text" name="P" class="form-control" value="{{$us->Puesto}}" placeholder="Redes Sociales">
                  </div>
                  @if ($errors->has('P'))
                        <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('P') }}</strong>
                         </span>
                  @endif
            </div>
            <div class="form-group">
            	<label for="Rol">Rol:</label>
                  <div class="input-group">
                      <span class="input-group-addon" id="sizing-addon7">
                         <i class=" fa fa-id-badge fa-fw"></i>
                      </span>
            	    <select name="R" class="form-control" value="{{$us->Puesto}}">
                        @foreach($roles as $r)
                          @if($r->Id_Rol == $us->Id_Rol)
                            <option value="{{$r->Id_Rol}}" selected>{{$r->Rol}}</option>
                          @else  
                            <option value="{{$r->Id_Rol}}" >{{$r->Rol}}</option>
                          @endif  
                         @endforeach
                     </select>
               </div>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar&nbsp;&nbsp; <i class="fa fa-save"></i></button>
            	<button class="btn btn-danger pull-right" type="reset">Cancelar&nbsp;&nbsp; <i class="fa fa-close"></i></button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection