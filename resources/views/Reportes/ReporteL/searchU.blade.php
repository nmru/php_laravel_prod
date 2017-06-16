{!! Form::open (array('url'=>'Reportes/ReporteL','method'=>'GET', 'autocompleate'=>'off','role'=>'search')) !!}
                
                <div class="form-group">
                  <label class="col-sm-2 control-label" for="Issue">Dispositivo:</label>
                    <div class="col-sm-9">
                       <input type="text"  class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
                    </div>
                </div>    

                  
     	                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                  

                  <br><br>
     

{{Form::close()}}