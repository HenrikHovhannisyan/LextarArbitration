<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <a href="{{ route('home') }}">
                <img src="{{asset('img/logo.png')}}" class="img-fluid" width="200" alt="">
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
        <li>
            <a href="{{ route('files.index') }}" class="{{ isActiveRoute('files.index') }}">
                <i class="fa-solid fa-file-pdf"></i>
                <span class="ms-1">Rules & Forms</span>
            </a>
        </li>
    </ul>
</div>
