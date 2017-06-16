@extends('Layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Acceso al Sistema</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        
                        {{ csrf_field() }}

                        <hr class="spartan">
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Usuario:</label>   

                            <div class="col-md-6">
                                   <div class="input-group">
                                      <span class="input-group-addon" id="sizing-addon1">
                                          <i class="fa fa-user"></i>
                                      </span>
                                    <input type="text" class="form-control" name="username" required="" autofocus="" value="{{ old('username') }}" />
                                   </div>

                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña:</label>

                            <div class="col-md-6">
                               <div class="input-group">
                                  <span class="input-group-addon" id="sizing-addon2">
                                     <i class=" fa fa-lock"></i>
                                  </span>
                                  <input type="password" class="form-control" name="password"  required=""/>               
                               </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-lg btn-primary btn-block">
                                    Iniciar Sesion
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
