@extends(starmoozie_view('blank'))

@section('after_styles')
    <style media="screen">
        .starmoozie-profile-form .required::after {
            content: ' *';
            color: red;
        }
    </style>
@endsection

@php
  $breadcrumbs = [
      trans('starmoozie::crud.admin') => url(config('starmoozie.base.route_prefix'), 'dashboard'),
      trans('starmoozie::base.my_account') => false,
  ];
@endphp

@section('header')
    <section class="content-header">
        <div class="container-fluid mb-3">
            <h1>{{ trans('starmoozie::base.my_account') }}</h1>
        </div>
    </section>
@endsection

@section('content')
    <div class="row">

        @if ($errors->count())
        <div class="{{config('starmoozie.crud.operations.create.contentClass')}}">
            <div class="alert alert-danger shadow-sm">
                <ul class="mb-1">
                    @foreach ($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        {{-- UPDATE INFO FORM --}}
        <div class="{{config('starmoozie.crud.operations.create.contentClass')}}">
            <form class="form" action="{{ route('starmoozie.account.info.store') }}" method="post">

                {!! csrf_field() !!}

                <div class="card padding-10 shadow-sm">

                    <div class="card-header">
                        {{ trans('starmoozie::base.update_account_info') }}
                    </div>

                    <div class="card-body starmoozie-profile-form bold-labels">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                @php
                                    $label = trans('starmoozie::base.name');
                                    $field = 'name';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input required class="form-control shadow-sm" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                            </div>

                            <div class="col-md-6 form-group">
                                @php
                                    $label = config('starmoozie.base.authentication_column_name');
                                    $field = starmoozie_authentication_column();
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input required class="form-control shadow-sm" type="{{ starmoozie_authentication_column()=='email'?'email':'text' }}" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-outline-success shadow-sm"><i class="la la-save"></i> {{ trans('starmoozie::base.save') }}</button>
                    </div>
                </div>

            </form>
        </div>
        
        {{-- CHANGE PASSWORD FORM --}}
        <div class="{{config('starmoozie.crud.operations.create.contentClass')}}">
            <form class="form" action="{{ route('starmoozie.account.password') }}" method="post">

                {!! csrf_field() !!}

                <div class="card padding-10 shadow-sm">

                    <div class="card-header">
                        {{ trans('starmoozie::base.change_password') }}
                    </div>

                    <div class="card-body starmoozie-profile-form bold-labels">
                        <div class="row">
                            <div class="col-md-4 form-group">
                                @php
                                    $label = trans('starmoozie::base.old_password');
                                    $field = 'old_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input autocomplete="new-password" required class="form-control shadow-sm" type="password" name="{{ $field }}" id="{{ $field }}" value="">
                            </div>

                            <div class="col-md-4 form-group">
                                @php
                                    $label = trans('starmoozie::base.new_password');
                                    $field = 'new_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input autocomplete="new-password" required class="form-control shadow-sm" type="password" name="{{ $field }}" id="{{ $field }}" value="">
                            </div>

                            <div class="col-md-4 form-group">
                                @php
                                    $label = trans('starmoozie::base.confirm_password');
                                    $field = 'confirm_password';
                                @endphp
                                <label class="required">{{ $label }}</label>
                                <input autocomplete="new-password" required class="form-control shadow-sm" type="password" name="{{ $field }}" id="{{ $field }}" value="">
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-outline-success shadow-sm"><i class="la la-save"></i> {{ trans('starmoozie::base.change_password') }}</button>
                    </div>

                </div>

            </form>
        </div>

    </div>
@endsection
