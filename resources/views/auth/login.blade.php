@extends('layouts.app', [
    'namePage' => 'Login page',
    'class' => 'login-page sidebar-mini ',
    'activePage' => 'login',
    
])

@section('content')
<div class="panel-header panel-header-sm">
  </div>
    <div class="content">
        <div class="container">
        
        <div class="col-md-4 ml-auto mr-auto">
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
            <div class="card card-login">
               
                <div class="card-header">
                    <h5 class="title">{{__("Login")}}</h5>
                </div>
                <div class="card-body ">
                <div class="input-group no-border form-control-lg {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <span class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="now-ui-icons users_circle-08"></i>
                    </div>
                    </span>
                    <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required autofocus>
                </div>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <div class="input-group no-border form-control-lg {{ $errors->has('password') ? ' has-danger' : '' }}">
                    <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="now-ui-icons objects_key-25"></i></i>
                    </div>
                    </div>
                    <input placeholder="Password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="{{ __('Password') }}" type="password"  required>
                </div>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
                </div>
                <div class="card-footer ">
                <button  type = "submit" class="btn btn-primary btn-round btn-lg btn-block mb-3">{{ __('Get Started') }}</button>
                <div class="pull-left">
                    <h6>
                    <a style="color:red;" href="{{ route('register') }}" class="link footer-link">{{ __('Create Account') }}</a>
                    </h6>
                </div>
                <div class="pull-right">
                    <h6>
                    <a style="color:red;" href="{{ route('password.request') }}" class="link footer-link">{{ __('Forgot Password?') }}</a>
                    </h6>                
                </div>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
        // demo.checkFullPageBackgroundImage();
        });
    </script>
@endpush
