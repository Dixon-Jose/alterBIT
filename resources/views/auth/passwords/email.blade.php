@extends('layouts.app')
@section('title','Reset Password')

@section('content')
@include('includes.navbar')
    <div class="row reset">
      <div class="col-2"></div>
        <div class="col-8 col-md-offset-2">
                <h3>Reset Password</h3>
                <hr>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="col-2"></div>
                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address:</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                  <br>
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">

                                <button type="submit" class="btn1">
                                    Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection
