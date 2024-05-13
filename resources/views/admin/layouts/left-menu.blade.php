<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="{{ route('home') }}" class="text-center">
                <img src="{{asset('images/footer-logo.png')}}" class="img-fluid" width="100" alt="">
            </a>
        </li>
        <li>
            <a href="{{ route('admin.home') }}" class="{{ isActiveRoute('admin.home') }}">
                <i class="fa-solid fa-dashboard"></i>
                <span class="ms-1">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('users.index') }}" class="{{ isActiveRoute('users.index') }}">
                <i class="fa-solid fa-users"></i>
                <span class="ms-1">Users</span>
            </a>
        </li>
        @if(auth()->user()->is_admin === 1)
            <li>
                <a href="{{ route('users.caseManager') }}" class="{{ isActiveRoute('users.caseManager') }}">
                    <i class="fa-solid fa-users"></i>
                    <span class="ms-1">Case Manager</span>
                </a>
            </li>
            <li>
                <a href="{{ route('cases.adminIndex') }}" class="{{ isActiveRoute('cases.adminIndex') }}">
                    <i class="fa-solid fa-file-signature"></i>
                    <span class="ms-1">Cases</span>
                </a>
            </li>
        @endif
        <li>
            <a href="{{ route('users.partners') }}" class="{{ isActiveRoute('users.partners') }}">
                <i class="fa-solid fa-handshake"></i>
                <span class="ms-1">Partners</span>
            </a>
        </li>
        <li>
            <a href="{{ route('rules.index') }}" class="{{ isActiveRoute('rules.index') }}">
                <i class="fa-solid fa-file-pdf"></i>
                <span class="ms-1">Rules</span>
            </a>
        </li>
        <li>
            <a href="{{ route('forms.index') }}" class="{{ isActiveRoute('forms.index') }}">
                <i class="fa-solid fa-file-pdf"></i>
                <span class="ms-1">Forms</span>
            </a>
        </li>
    </ul>
</div>
