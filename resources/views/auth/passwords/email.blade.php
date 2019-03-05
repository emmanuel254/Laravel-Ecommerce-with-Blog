@extends('main')

@section('title','| Forgot my password')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header login-header text-center"><h2> Reset Password</h2></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-4 login-header">
                              <label for="email">Email Address</label>  
                            </div>
                

                            <div class="col-md-5 login-header">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-3 login-header">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Send me a link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
@endsection
