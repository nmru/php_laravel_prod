      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          
            <div class="user-panel">
              <div class="pull-left image">
                 &nbsp;&nbsp; <i class=" fa fa-user-circle fa-3x user-image" alt="User Image" style="color: white"></i>
              </div>
              <div class="pull-left info">
                 <br>
                 <p align="center">{{ Auth::user()->Nom }}&nbsp;&nbsp;{{ Auth::user()->Ap }}</p>
              </div>
           </div>


          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="/Usuario/usuario">
                <i class="fa fa-users "></i>
                <span>Usuarios</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              
            </li>
            
            <li class="treeview">
              <a href="/Device/device">
                <i class="fa fa-laptop"></i>
                <span>Dispositivo</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i>
                <span>Reportes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="/Reportes/ReporteI"><i class="fa fa-file-text "></i> Tipo - Issue</a></li>
                <li><a href="/Reportes/ReporteL"><i class="fa fa-file-text "></i> Device - Lote</a></li>
                 <li><a href="/Reportes/ReporteDP"><i class="fa fa-file-text "></i> Device - Procesos</a></li>
                <li><a href="/Reportes/ReportePF"><i class="fa fa-file-text "></i> Proceso - Fecha</a></li>
                 <li><a href="/Reportes/ReportePRF"><i class="fa fa-file-text "></i> Proceso - Rango - Fechas</a></li>
              </ul>
            </li>
                       
            <li class="treeview">
              <a href="/Produccion/produccion">
                <i class="fa fa-file-code-o "></i> <span>Firmado</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>