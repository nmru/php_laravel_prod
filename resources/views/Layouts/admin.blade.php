<!DOCTYPE html>
<html>
   @include('Layouts.head')  
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      @include('Layouts.header')  
      <!-- Left side column. contains the logo and sidebar -->
      @if(\Auth::user()->Id_Rol == 1)
          @include('Layouts.left_menua')
      @else
          @include('Layouts.left_menue')  
      @endif    
       <div class="content-wrapper">
    <!-- Content Header (Page header) -->
         <section class="content-header"> <!--content header section -->
           <h1>
             Produccion
           </h1>
         </section><!--end content header section -->
         <section class="content"> <!--content section -->
          <div class="box"><!--content body -->
            <div class="box-body"><!--Contenido-->
              <div class="row"><!--content row -->
                 <div class="col-md-12">
                     @yield('contenido')   
                </div>
              </div><!-- end content row -->
            </div><!--Fin Contenido-->
          </div><!-- end content body-->
         </section><!--end content section -->
       </div><!-- end content-wrapper -->
          @include('Layouts.footer') 
          @include('Layouts.right_menu') 
          <div class="control-sidebar-bg"></div>
    </div><!-- end wrapper -->
    @include('Layouts.script')  
  </body>
</html>
