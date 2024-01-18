@extends('layouts.app')

@section('content')
    <div class="wrapper-page">
        <div class="panel panel-color panel-primary panel-pages">
            <div class="panel-heading bg-img">
                <div class="bg-overlay"></div>
                <h3 class="text-center m-t-10 text-white"> Reset Password </h3>
            </div>


            <div class="panel-body">
                <form class="form-horizontal m-t-20" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg @error('email') is-invalid @enderror" id="email"
                                type="email" name="email" value="{{ $email ?? old('email') }}" required
                                autocomplete="email" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg @error('password') is-invalid @enderror" id="password"
                                type="password" name="password" required autocomplete="new-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control input-lg @error('password_confirmation') is-invalid @enderror" id="password_confirmation" type="password"
                            name="password_confirmation" required autocomplete="new-password"
                                placeholder="confirmation Password">
                            @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group text-center m-t-40">
                        <div class="col-xs-12">
                            <button class="btn btn-primary waves-effect waves-light btn-lg w-lg"
                                type="submit">Reset Password</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
