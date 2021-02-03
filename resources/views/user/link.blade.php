@if (Auth::user()->getAttribute('is_admin'))
    <li class="nav-item">
        <a href="{{ URL::route('user.index') }}" class="nav-link">
            <i class="icon-users"></i>
            <span>
                {{ Lang::get('common.sidebar.user') }}
            </span>
        </a>
    </li>
@endif
