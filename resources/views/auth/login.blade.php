  @extends('layouts.app')
  @section('title','Login')

  @section('content')
   @include('includes.navbar')
    
    <div class="row login">
        <div class="col-3"></div>
        <div class="col-6">
          <h3>Login</h3>
          <hr>
          <br>
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                {{ csrf_field() }}

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <!-- <label for="email" title="email" class="col-md-4 control-label">E-Mail Address:</label> -->

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" placeholder="E-Mail Address:" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                              <br>
                                                <strong title="error-mess">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} pass">
                                    <!-- <label for="password"  title="pass" class="col-md-4 control-label">Password:</label> -->

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label title="checkbox">
                                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="col-md-8 col-md-offset-4 button">
                                        <button title="login" type="submit" class="btn btn-primary">
                                            Login
                                        </button>

                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            Forgot Your Password?
                                        </a>
                                    </div>
                                </div>
            </form>
        </div>
    </div>
@endsection