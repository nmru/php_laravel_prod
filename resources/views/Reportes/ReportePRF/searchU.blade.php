{!! Form::open (array('url'=>'Reportes/ReportePRF','method'=>'GET', 'autocompleate'=>'off','role'=>'search')) !!}
          <div class="form-group">
             <label class="col-sm-2 control-label" for="Issue" style="text-align: center;">Proceso:</label>
                <div class="col-sm-9">
                   <select name="searchText" class="form-control" >
                        <option value="" disabled selected>Selecciona un Proceso...</option>
                         @foreach($pr as $p)
                           <option value="{{$p->Nom}}">{{$p->Nom}}</option>
                         @endforeach
                    </select>
                </div>    
           </div> 

           
               <br>
               <br>
           

           <div class="form-group">
             <label class="col-sm-2 control-label" for="f1" style="text-align: center;">F. Inicio:</label>
              <div class="col-sm-9">
                 <input type="date" name="f1" class="form-control"  value="Y-m-d"> 
              </div> 
                     <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-search"></i></button>
           </div>   
          
               <br><br>
            
            <div class="form-group" style="margin-top: -14px">
             <label class="col-sm-2 control-label" for="f2" style="text-align: center;">F. Fin:</label>
              <div class="col-sm-9">
                 <input type="date" name="f2" class="form-control"  value="Y-m-d">  
              </div>
            </div>     
            <br>
            <br>

{{Form::close()}}