@extends(starmoozie_view('layouts.plain'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4 shadow-sm">
                <div class="card-body p-4">
                    <h1>{{ trans('starmoozie::base.register') }}</h1>
                        <p class="text-muted">{{ __('starmoozie::base.register_to_account') }}</p>
                    <form role="form" method="POST" action="{{ route('starmoozie.auth.register') }}">
                        {!! csrf_field() !!}
                        <div class="input-group mb-3">
                            <div class="input-group-prepend shadow-sm"><span class="input-group-text"><i class="la la-user"></i></span></div>
                            <input class="form-control shadow-sm {{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" placeholder="{{ trans('starmoozie::base.name') }}" value="{{ old('name') }}" name="name" id="name" autofocus>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend shadow-sm"><span class="input-group-text">@</span></div>
                            <input class="form-control shadow-sm {{ $errors->has(starmoozie_authentication_column()) ? ' is-invalid' : '' }}" type="{{ starmoozie_authentication_column()=='email'?'email':'text'}}" placeholder="{{ config('starmoozie.base.authentication_column_name') }}" name="{{ starmoozie_authentication_column() }}" id="{{ starmoozie_authentication_column() }}" value="{{ old(starmoozie_authentication_column()) }}">
                            @if ($errors->has(starmoozie_authentication_column()))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first(starmoozie_authentication_column()) }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend shadow-sm"><span class="input-group-text"><i class="la la-lock"></i></span></div>
                            <input class="form-control shadow-sm {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" type="password" placeholder="{{ trans('starmoozie::base.password') }}">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend shadow-sm"><span class="input-group-text"><i class="la la-lock"></i></span></div>
                            <input class="form-control shadow-sm {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" type="password" placeholder="{{ trans('starmoozie::base.confirm_password') }}">
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button class="btn btn-block btn-primary shadow-sm" type="submit">{{ trans('starmoozie::base.register') }}</button>
                    </form>
                </div>
                <div class="card-footer p-4">
                    <div class="row">
                        <div class="col-6 text-center">
                            <a class="btn btn-link px-0" href="{{ route('starmoozie.auth.login') }}">{{ trans('starmoozie::base.login') }}</a>
                        </div>
                        <div class="col-6 text-center">
                            @if(starmoozie_users_have_email() && config('starmoozie.base.setup_password_recovery_routes', true))
                                <a class="btn btn-link px-0" href="{{ route('starmoozie.auth.password.reset') }}">{{ trans('starmoozie::base.forgot_your_password') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
