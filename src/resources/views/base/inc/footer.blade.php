@if (config('starmoozie.base.powered_by') || config('starmoozie.base.developer_link'))
    <div class="text-muted ml-auto mr-auto">
        @if (config('starmoozie.base.developer_link') && config('starmoozie.base.developer_name'))
            {{ trans('starmoozie::base.handcrafted_by') }} <a target="_blank" rel="noopener" href="{{ config('starmoozie.base.developer_link') }}">{{ config('starmoozie.base.developer_name') }}</a>.
        @endif
        @if (config('starmoozie.base.powered_by'))
            {{ trans('starmoozie::base.powered_by') }} <a target="_blank" rel="noopener" href="{{ config('starmoozie.base.powered_link') }}">{{ config('starmoozie.base.powered_by') }}</a>.
        @endif
    </div>
@endif