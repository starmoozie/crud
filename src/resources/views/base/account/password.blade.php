<form class="form" action="{{ route('starmoozie.account.password') }}" method="post">
    {!! csrf_field() !!}

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

        <div class="col-md-12">
            <button type="submit" class="btn btn-sm btn-outline-success shadow-sm"><i class="la la-save"></i> {{ trans('starmoozie::base.change_password') }}</button>
        </div>
    </div>
</form>