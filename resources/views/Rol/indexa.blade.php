@extends ('Layouts.admin')
@section('contenido')
 <div class = "row">
    <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12" >
        <h3>Bienvenid@!!!</h3>
    </div>
 </div>
 
 <div class = "row">
 <body>
    <div class = "col-lg-6 col-md-6 col-sm-6 col-xs-12" >
       <div class = "table-resposive">
        
       
				   Bienvenid@!!! &nbsp;&nbsp;{{ Auth::user()->Nom }}&nbsp;&nbsp;{{ Auth::user()->Ap }}
    </div>
 </div>
</div>
@endsection