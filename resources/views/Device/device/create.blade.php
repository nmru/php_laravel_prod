@extends ('Layouts.admin')
@section ('contenido')

<script type="text/javascript">
  function disable(PF)
  {
    if (PF.checked)
         document.getElementById('PP').disabled = false;
    else
      document.getElementById('PP').disabled = true;
      document.getElementById('PP').checked = false;
  }

</script>




	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Proceso</h3>

		{!!Form::Open(array('url'=>'Device/device','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
             <div class="form-group{{ $errors->has('S') ? ' has-error' : '' }}">
            	<label for="NS">Num. de Serie:</label>
                <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-barcode fa-fw"></i>
                         </span>
            	        <input type="text" name="S" class="form-control" placeholder="ej. 201604180750" value="{{ old('S') }}" />
                </div>      
                @if ($errors->has('S'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('S') }}</strong>
                         </span>
                @endif

            </div>
            <div class="form-group{{ $errors->has('M') ? ' has-error' : '' }}">
            	<label for="MA">MAC Address:</label>
                <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-barcode fa-fw"></i>
                         </span>
            	           <input type="text" name="M" class="form-control" placeholder="ej. 78:A3:51:12:98:8E" value="{{ old('M') }}" />
               </div> 
               @if ($errors->has('M'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('M') }}</strong>
                         </span>
               @endif
            </div>
             <div class="form-group{{ $errors->has('L') ? ' has-error' : '' }}">
            	<label for="Lote">Lote:</label>
               <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-cubes fa-fw"></i>
                         </span>
            	           <input type="text" name="L" class="form-control" placeholder="ej. 35" value="{{ old('L') }}" />
               </div>
               @if ($errors->has('L'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('L') }}</strong>
                         </span>
              @endif
            </div>
           <!--  <div class="form-group" style="border:2px solid lightgray; padding-left:10px; padding-top: 0px; padding-right:10px; padding-bottom:10px">
              <label for="Proceso">Procesos:</label><br>
              <input type="checkbox" name="PE" >Etiquetado
              <input type="checkbox" name="PP" >Maquinado
               <div class="form-group">
               <br>
              <label>Fecha:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="F">
                </div>
                </div>
            </div>  -->
            <div class="form-group{{ $errors->has('PF') ? ' has-error' : ''}}" style="border:2px solid lightgray; padding-left:10px; padding-top: 0px; padding-right:10px; padding-bottom:10px">
            	<label for="Proceso">Procesos:</label>
             <br>
            	<input type="checkbox" Id="PF" name="PF" class="icheck" value="1"  onchange="disable(this)"> Firmado
              <input type="checkbox" Id="PP" name="PP" class="icheck" value="1"  disabled="true"> Prueba
              <div class="form-group">
              <br>
              <label>Fecha:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="F">
               </div>
              </div>
               @if ($errors->has('PF'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('PF') }}</strong>
                         </span>
              @endif
              @if ($errors->has('PP'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('PP') }}</strong>
                         </span>
              @endif
              @if ($errors->has('F'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('F') }}</strong>
                         </span>
              @endif
            </div>
              <!-- /.form group -->
            <div class="form-group{{ $errors->has('I') ? ' has-error' : '' }}">
            	<label for="Issue">Issue:</label>
                        
            	           <select name="I" class="form-control">
                            <option value="" disabled selected>Selecciona un Issue...</option>
                                @foreach($is as $i)
                                  <option value="{{$i->Id_Issue}}">{{$i->Nom}}</option>
                                @endforeach
                         </select>
    
                   @if ($errors->has('I'))
                         <span class="help-block">
                           <i class=" fa fa-close"> </i>
                           <strong>{{ $errors->first('I') }}</strong>
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