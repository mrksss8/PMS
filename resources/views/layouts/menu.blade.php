<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('dashboard.index')}}">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
</li>
<li class="dropdown">
    <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>User Management</span></a>
    <ul class="dropdown-menu" style="display: none;">
      <li><a class="nav-link" href="{{route('user.index')}}">Users</a></li>
      <li><a class="nav-link" href="{{route('permission.index')}}">Permision</a></li>
      <li><a class="nav-link" href="{{route('role.index')}}">Roles</a></li>
    </ul>
  </li>
