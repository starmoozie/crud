@extends(starmoozie_view('layouts.plain'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <h1>{{ trans('starmoozie::base.login') }}</h1>
                        <p class="text-muted">{{ __('starmoozie::base.login_to_account') }}</p>
                        <form role="form" method="POST" action="{{ route('starmoozie.auth.login') }}">
                            {!! csrf_field() !!}
                            <div class="input-group mb-3">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                <input class="form-control {{ $errors->has($username) ? ' is-invalid' : '' }}" name="{{ $username }}" value="{{ old($username) }}" id="{{ $username }}" autofocus type="text" placeholder="{{ config('starmoozie.base.authentication_column_name') }}">
                                @if ($errors->has($username))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first($username) }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-lock"></i></span></div>
                                <input class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" type="password" placeholder="{{ trans('starmoozie::base.password') }}">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" class=" shadow-sm"> {{ trans('starmoozie::base.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button class="btn btn-primary shadow-sm px-4" type="submit">Login</button>
                                </div>
                                @if (starmoozie_users_have_email() && config('starmoozie.base.setup_password_recovery_routes', true))
                                    <div class="col-6 text-right">
                                        <a class="btn btn-link px-0" href="{{ route('starmoozie.auth.password.reset') }}">{{ trans('starmoozie::base.forgot_your_password') }}</a>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                @if (config('starmoozie.base.registration_open'))
                    <div class="card text-white bg-info py-5">
                        <div class="card-body text-center">
                            <div>
                            <h2>{{ trans('starmoozie::base.register') }}</h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <a class="btn btn-primary shadow-sm active mt-3" href="{{ route('starmoozie.auth.register') }}">{{ trans('starmoozie::base.register_now') }}</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection