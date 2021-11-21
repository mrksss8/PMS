<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <h5 class = "text-dark mt-5">
            <strong>Patient Management System</strong> 
        <h5>
        {{-- <img class="navbar-brand-full app-header-logo" src="{{ asset('img/logo.png') }}" width="65"
             alt="Infyom Logo"> --}}
        <a href="{{ url('/') }}"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="{{ url('/') }}" class="small-sidebar-text">
            <img class="navbar-brand-full" src="{{ asset('img/logo.png') }}" width="45px" alt=""/>
        </a>
    </div>
    <ul class="sidebar-menu mt-5">
        @include('layouts.menu')
    </ul>
</aside>
