
<div class="sub-header">
    <ul>
      
        <li><a class="inactive-label">Masters</a></li> <!-- this should be inactive just labelend header -->

        @if (hasPermission('role'))
            <li><a class="menu-item {{ request()->routeIs('role') ? 'sub-active' : '' }}" href="{{ route('role') }}" id="role">Roles</a></li>
        @endif

        @if (hasPermission('employee-categories'))
            <li><a class="menu-item {{ request()->routeIs('employee-categories') ? 'sub-active' : '' }}" href="{{ route('employee-categories') }}" id="employee-categories">Employee Categories</a></li>
        @endif 
        @if (hasPermission('designation'))
            <li><a class="menu-item {{ request()->routeIs('designation') ? 'sub-active' : '' }}" href="{{ route('designation') }}" id="designation">Designations</a></li>
        @endif   
        @if (hasPermission('department'))
            <li><a class="menu-item {{ request()->routeIs('department') ? 'sub-active' : '' }}" href="{{ route('department') }}" id="department">Departments</a></li>
        @endif
        @if (hasPermission('job_role'))
            <li><a class="menu-item {{ request()->routeIs('job_role') ? 'sub-active' : '' }}" href="{{ route('job_role') }}" id="job_role">Job Roles</a></li>
        @endif


        @if (hasPermission('technology'))
            <li><a class="menu-item {{ request()->routeIs('technology') ? 'sub-active' : '' }}" href="{{ route('technology') }}" id="technology">Technologies</a></li>
        @endif

        @if (hasPermission('skill'))
            <li><a class="menu-item {{ request()->routeIs('skill') ? 'sub-active' : '' }}" href="{{ route('skill') }}" id="skill">Skills</a></li>
        @endif
        @if (hasPermission('leave_type'))
            <li><a class="menu-item {{ request()->routeIs('leave_type') ? 'sub-active' : '' }}" href="{{ route('leave_type') }}" id="leave_type">Leave Types</a></li>
        @endif
    </ul>
</div>