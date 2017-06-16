{!! Form::open (array('url'=>'Device/device','method'=>'GET', 'autocompleate'=>'off','role'=>'search')) !!}
 <div class ="form-group">
   <div class ="input-group">
     <input type="text"  class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">
     <span class="input-group-btn">
     	<button type="submit" class="btn btn-primary"><i class="fa f fa-search"></i></button>
     </span>
   </div>
 </div>

{{Form::close()}}