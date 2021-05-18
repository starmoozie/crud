<form class="form" action="{{ route('starmoozie.account.info.store') }}" method="post">
    {!! csrf_field() !!}
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

        <div class="col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success shadow-sm"><i class="la la-save"></i> {{ trans('starmoozie::base.save') }}</button>
        </div>
    </div>
</form>