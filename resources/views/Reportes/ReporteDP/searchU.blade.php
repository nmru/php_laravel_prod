{!! Form::open (array('url'=>'Reportes/ReporteDP','method'=>'GET', 'autocompleate'=>'off','role'=>'search')) !!}
 
               <div class="form-group">
                 <label class="col-sm-2 control-label" for="f" style="text-align: center;">Dispositivo:</label>
                   <div class="col-sm-9">
                     <input type="text"  class="form-control" name="searchText" placeholder="Num. Serie ">
                   </div>

                   <div>
                   <span class="pull-right"  >
                        <button type="submit" class="btn btn-primary" style="margin-top: 20px"><i class="fa fa-search"></i></button>
                  </span>   
                </div>
               </div>
                
                <br><br>

                <div class="form-group">
                 <label class="col-sm-2 control-label" for="Proceso" style="text-align: center">Proceso:</label>
                   <div class="col-sm-9">
                      <select name="prs" class="form-control" >
                         <option value="" disabled selected>Selecciona un Proceso...</option>
                            @foreach($pr as $p)
                              <option value="{{$p->Nom}}">{{$p->Nom}}</option>
                            @endforeach
                      </select>
                   </div>
                 </div>
                 <br><br>
        

{{Form::close()}}