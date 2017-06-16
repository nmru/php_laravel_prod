{!! Form::open (array('url'=>'Reportes/ReportePF','method'=>'GET', 'autocompleate'=>'off','role'=>'search')) !!}
 
          <div class="form-group">
            <label class="col-sm-2 control-label" for="Issue" style="text-align: center;">Proceso:</label>
              <div class="col-sm-9">
                 <select name="searchText" class="form-control">
                        <option value="" disabled selected>Selecciona un Proceso...</option>
                         @foreach($pr as $p)
                           <option value="{{$p->Nom}}">{{$p->Nom}}</option>
                         @endforeach
                      </select>
              </div>
          </div>
          
            <div>
                  <br><br>
                   <span class="pull-right" >
                        <button type="submit" class="btn btn-primary" style="margin-top: -25px"><i class="fa fa-search"></i></button>
                  </span>   
            </div>


           <div class="form-group">
             <label class="col-sm-2 control-label" for="f" style="text-align: center;">Fecha:</label>
               <div class="col-sm-9">
                 <input type="date" name="F" class="form-control"  value="Y-m-d">
               </div>
           </div>   
           <br><br>
    
{{Form::close()}}
