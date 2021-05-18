@extends(starmoozie_view('layouts.plain'))

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-md-9 col-lg-6">
            <h3 class="text-center mb-4">{{ trans('starmoozie::base.reset_password') }}</h3>
            <div class="nav-steps-wrapper">
                <ul class="nav nav-tabs">
                      <li class="nav-item"><a class="nav-link disabled text-muted"><strong>{{ trans('starmoozie::base.step') }} 1.</strong> {{ trans('starmoozie::base.confirm_email') }}</a></li>
                      <li class="nav-item active"><a class="nav-link active"><strong>{{ trans('starmoozie::base.step') }} 2.</strong> {{ trans('starmoozie::base.choose_new_password') }}</a></li>
                </ul>
            </div>
            <div class="nav-tabs-custom">
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="col-md-12 p-t-10" role="form" method="POST" action="{{ route('starmoozie.auth.password.reset') }}">
                        {!! csrf_field() !!}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label class="control-label" for="email">{{ trans('starmoozie::base.email_address') }}</label>

                            <div>
                                <input type="email" class="form-control shadow-sm {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="email" value="{{ $email ?? old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">{{ trans('starmoozie::base.new_password') }}</label>

                            <div>
                                <input type="password" class="form-control shadow-sm {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" autofocus>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password_confirmation">{{ trans('starmoozie::base.confirm_new_password') }}</label>
                            <div>
                                <input type="password" class="form-control shadow-sm {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <div>
                                <button type="submit" class="btn btn-block btn-outline-primary shadow-sm">
                                    {{ trans('starmoozie::base.change_password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="clearfix"></div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
        </div>
    </div>
@endsection
