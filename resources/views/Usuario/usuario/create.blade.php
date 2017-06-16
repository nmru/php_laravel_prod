@extends ('Layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Usuario</h3>

			{!!Form::Open(array('url'=>'Usuario/usuario','method'=>'POST','autocomplete'=>'off'))!!}
       {{Form::token()}}

            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('N') ? ' has-error' : '' }}">
               <label for="Nombre">Nombre:</label>
                      <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-user"></i>
                         </span>
                         <input type="text" name="N" class="form-control" placeholder="ej. Jesica Fabiola" value="{{ old('N') }}" />
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
                        <span class="input-group-addon" id="sizing-addon2">
                            <i class=" fa fa-address-book fa-fw"></i>
                        </span>
            	    <input type="text" name="A" class="form-control" placeholder="ej. Rosas Martinez" value="{{ old('A') }}">
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
            	      <input type="text" name="U" class="form-control" placeholder="ej. jrosas " value="{{ old('U') }}">
                  </div>
                   @if ($errors->has('U'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('U') }}</strong>
                         </span>
                   @endif
            </div>
             <div class="form-group{{ $errors->has('C') ? ' has-error' : '' }}">
            	<label for="Contraseña">Contraseña:</label>
                  <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon4">
                            <i class=" fa fa-key fa-fw"></i>
                        </span>
            	     <input type="text" name="C" class="form-control" placeholder="ej. 123456ab" value="{{ old('C') }}" >
                  </div> 
                  @if ($errors->has('C'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('C') }}</strong>
                         </span>
                    @endif    
            </div>
            <div class="form-group{{ $errors->has('D') ? ' has-error' : '' }}">
            	<label for="Departamento">Departamento:</label>
                  <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon5">
                          <i class=" fa fa-university fa-fw"></i>
                        </span>
            	     <input type="text" name="D" class="form-control" placeholder="ej. Mercadotecnia" value="{{ old('D') }}">
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
            	   <input type="text" name="P" class="form-control" placeholder="ej. Redes Sociales" value="{{ old('P') }}">
                  </div>
                   @if ($errors->has('P'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('P') }}</strong>
                         </span>
                    @endif
            </div>
            <div class="form-group{{ $errors->has('R') ? ' has-error' : '' }}">
            	<label for="Rol">Rol:</label>
                  <div class="input-group">
                      <span class="input-group-addon" id="sizing-addon7">
                         <i class=" fa fa-id-badge fa-fw "></i>
                      </span>
            	   <select name="R" class="form-control">
                        <option value="" disabled selected>Selecciona una Opcion...</option>
                        @foreach($roles as $r)
                           <option value="{{$r->Id_Rol}}">{{$r->Rol}}</option>
                        @endforeach
                     </select>
              </div>
               @if ($errors->has('R'))
                         <span class="help-block">
                          <i class=" fa fa-close"> </i>
                            <strong>{{ $errors->first('R') }}</strong>
                         </span>
              @endif
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar&nbsp;&nbsp; <i class="fa fa-save"></i></button>
            	<button class="btn btn-danger pull-right" type="reset">Cancelar&nbsp;&nbsp; <i class="fa fa-close"></i></button>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection