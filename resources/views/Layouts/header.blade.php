
   <header class="main-header">

        <!-- Logo -->
        <a href="#" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>StP</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SAINT</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
               @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                   <i class=" fa fa-user-circle fa-2x user-image" alt="User Image" style="color: white"></i>&nbsp;
                                   <span class="hidden-xs">{{ Auth::user()->Nom }}&nbsp;&nbsp;{{ Auth::user()->Ap }} </span>
                                </a>

                                <ul class="dropdown-menu">
                                  <li class="user-header">
                                  <br>
                                    <i class=" fa fa-user-circle fa-5x fa-fw img-circle" alt="User Image" style="color: white"></i>
                                    <p>
                                       <span class="hidden-xs">
                                          {{ Auth::user()->Nom }}&nbsp;&nbsp;{{ Auth::user()->Ap }}  -  {{ Auth::user()->Puesto }}
                                       </span>
                                      <small>{{ Auth::user()->Dpto }}</small> 
                                    </p>
                                    </li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="text-align: center; font-weight: bolder;">
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li>
                               <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                           </li>
               @endif
            </ul>
          </div>
        </nav>
      </header>
 