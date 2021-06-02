<!-- This file is used to store sidebar items, starting with Starmoozie\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ starmoozie_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('starmoozie::base.dashboard') }}</a></li>

<li class="nav-title">Components</li>

@includeIf('dynamic_view::sidebar')