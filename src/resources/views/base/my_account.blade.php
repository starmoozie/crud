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

            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item shadow-sm">
                    <a class="nav-link active" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="true">{{ trans('starmoozie::base.update_account_info') }}</a>
                </li>
                <li class="nav-item shadow-sm">
                    <a class="nav-link" id="pills-password-tab" data-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password" aria-selected="false">{{ trans('starmoozie::base.change_password') }}</a>
                </li>
            </ul>
            <div class="tab-content shadow-sm" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @includeIf('starmoozie::account.info')
                </div>


                <div class="tab-pane fade" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
                    @includeIf('starmoozie::account.password')
                </div>
            </div>

        </div>

    </div>
@endsection
