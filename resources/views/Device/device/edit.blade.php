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
			<h3>Editar Proceso: {{$pr->Serie}}</h3>

			{!!Form::model($pr,['method'=>'PATCH','route'=>['device.update',$pr->Id]])!!}
                  {{Form::token()}}
            <div class="form-group{{ $errors->has('S') ? ' has-error' : '' }}">
                <label for="NS">Num. de Serie:</label>
                   <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon1">
                            <i class="fa fa-barcode fa-fw"></i>
                         </span>
                         <input type="text" name="S" class="form-control" value="{{$pr->Serie}}" placeholder="Numero de Serie...">
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
                         <input type="text" name="M" class="form-control" value="{{$pr->Mac}}" placeholder="MAC Address...">
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
                         <input type="text" name="L" class="form-control" value="{{$pr->Lote}}" placeholder="Numero de Lote al que pertenece el Dispositivo...">
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
                  <input type="date" class="form-control" name="FME" value="{{$pr->FechaEM}}">
                </div>
                </div>
            </div>  -->
            <div class="form-group{{ $errors->has('PF') ? ' has-error' : ''}}" style="border:2px solid lightgray; padding-left:10px; padding-top: 0px; padding-right:10px; padding-bottom:10px">
              <label for="Proceso">Procesos:</label>
             <br>
              @if($pr->pFirmado == "1")
                <input type="checkbox" name="PF" class="flat-red" value="{{$pr->pFirmado}}" checked="true"  onchange="disable(this)"> Firmado
              @else 
                <input type="checkbox" name="PF" value="{{$pr->pFirmado}}"  onchange="disable(this)"> Firmado
              @endif  
              @if($pr->pPrueba)
                <input type="checkbox" name="PP" value="{{$pr->pPrueba}}" checked="true"> Prueba
              @else 
                <input type="checkbox" name="PP" value="{{$pr->pPrueba}}" > Prueba
              @endif 
              
              <div class="form-group">
              <br>
              <label>Fecha:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="F" value="{{$pr->Fecha}}">
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

           <div class="form-group{{ $errors->has('I') ? ' has-error' : '' }}">
                  <label for="Issue">Issue:</label>
                   <select name="I" class="form-control">
                      <option value="" disabled selected>Selecciona un Issue...</option>
                        @foreach($is as $i)
                          @if($i->Id_Issue == $pr->Id_Issue)
                            <option value="{{$i->Id_Issue}}" selected>{{$i->Nom}}</option>
                          @else  
                            <option value="{{$i->Id_Issue}}">{{$i->Nom}}</option>
                          @endif 
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