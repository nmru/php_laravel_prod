{!! Form::open (array('url'=>'Reportes/ReporteI','method'=>'GET', 'autocompleate'=>'off','role'=>'search')) !!}
  
               <div class="form-group">
                 <label class="col-sm-2 control-label" for="Issue" style="text-align: center;">Tipo de Issue:</label>
                   <div class="col-sm-9">
                     <select name="searchText" class="form-control">
                       <option value="" disabled selected>Selecciona Tipo de Issue </option>
                           @foreach($is as $i)
                             <option value="{{$i->Nom}}">{{$i->Nom}}</option>
                            @endforeach
                       </select>
                    </div>
                  </div>  
                    
     	            <span class="pull-right">
     	                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                  </span>
                  <br><br><br>

{{Form::close()}}
