<li class="nav-item dropdown pr-4">
  <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
    <img class="img-avatar" src="{{ starmoozie_avatar_url(starmoozie_auth()->user()) }}" alt="{{ starmoozie_auth()->user()->name }}">
  </a>
  <div class="dropdown-menu shadow-sm {{ config('starmoozie.base.html_direction') == 'rtl' ? 'dropdown-menu-left' : 'dropdown-menu-right' }} mr-4 pb-1 pt-1">
    <a class="dropdown-item" href="{{ route('starmoozie.account.info') }}"><i class="la la-user"></i> {{ trans('starmoozie::base.my_account') }}</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="{{ starmoozie_url('logout') }}"><i class="la la-lock"></i> {{ trans('starmoozie::base.logout') }}</a>
  </div>
</li>
