
<div class="sub-header">
			<ul>
				<li><a class="inactive-label" >Employee</a></li> <!-- this should be inactive just labelend header -->
				<li><a class="menu-item {{ request()->routeIs('emp-dashboard-hr') ? 'sub-active' : '' }}" href="{{ route('emp-dashboard-hr') }}">Dashboard</a></li>
				<li><a class="menu-item {{ request()->routeIs('emp-attandance') ? 'sub-active' : '' }}" href="{{ route('emp-attandance') }}">Attendance</a></li>
				<li><a class="menu-item {{ request()->routeIs('emp-leave') ? 'sub-active' : '' }}" href="{{ route('emp-leave') }}">Leave</a></li>
				@if(Auth::user()->role_id!= \App\Models\Role::ROLE_SUPER_ADMIN)
				<li><a class="menu-item {{ request()->routeIs('emp-profile') ? 'sub-active' : '' }}" href="{{ route('emp-profile') }}">My Profile</a></li>@endif
				@if(Auth::user()->role_id == \App\Models\Role::ROLE_SUPER_ADMIN || Auth::user()->role_id == \App\Models\Role::ROLE_ADMIN)
				<li><a class="menu-item {{ request()->routeIs('add-employee') ? 'sub-active' : '' }}" href="{{ route('add-employee') }}">Add employee</a></li>
				<li><a class="menu-item {{ request()->routeIs('employee.view_list') ? 'sub-active' : '' }}" href="{{ route('employee.view_list') }}">Employee List</a></li>@endif
			  </ul>
		</div>