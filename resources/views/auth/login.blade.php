@extends('layouts.app')

@section('content')
  <section id="login" class="w-100 py-3">
  <div class="container">
    <div class="header text-center">
      <img src="{{asset('img/madani.png')}}" alt="" class="img-fluid  ml-auto">
      <h3 class="pt-4"> سیستم مدیریت قرارداد های دانشگاه </h3>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body mt-3">
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <div class="form-group row">
                {{--<label for="email"--}}
                       {{--class="col-md-4 col-form-label text-md-right">آدرس ایمیل</label>--}}

                <div class="col-md-6 offset-md-3">
                  <input id="email" type="email"
                         class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                         name="email" value="{{ old('email') }}" required autofocus placeholder="ایمیل">

                  @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>

              <div class="form-group row">
                {{--<label for="password"--}}
                       {{--class="col-md-4 col-form-label text-md-right">رمز عبور</label>--}}

                <div class="col-md-6 offset-md-3">
                  <input id="password" type="password"
                         class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                         name="password" required placeholder="رمز عبور">

                  @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                  @endif
                </div>
              </div>

              {{--<div class="form-group row">--}}
                {{--<div class="col-md-6 offset-md-3">--}}
                  {{--<div class="form-check">--}}
                    {{--<input class="form-check-input" type="checkbox" name="remember"--}}
                           {{--id="remember" {{ old('remember') ? 'checked' : '' }}>--}}

                    {{--<label class="form-check-label" for="remember">--}}
                      {{--مرا به خاطر بیاور--}}
                    {{--</label>--}}
                  {{--</div>--}}
                {{--</div>--}}
              {{--</div>--}}

              <div class="form-group row mb-2">
                <div class="col-md-6 offset-md-3">
                  <button type="submit" class="btn btn-app btn-block">
                    ورود
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
@endsection
