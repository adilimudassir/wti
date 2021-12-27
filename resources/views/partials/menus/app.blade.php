<div class="menu-item">
    <div class="menu-content pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Menu</span>
    </div>
</div>
<div class="menu-item">
    <a class="menu-link {{ Route::is('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">Dashboard</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Route::is('classroom.index') ? 'active' : '' }}" href="{{ route('classroom.index') }}">
        <span class="menu-icon">
            <i class="bi bi-card-text fs-3"></i>
        </span>
        <span class="menu-title">Class Room</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Route::is('user-courses.*') ? 'active' : '' }}" href="{{ route('user-courses.index') }}">
        <span class="menu-icon">
            <i class="bi bi-book fs-3"></i>
        </span>
        <span class="menu-title">My Courses</span>
    </a>
</div>
<div class="menu-item">
    <div class="menu-content pt-8 pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Administration</span>
    </div>
</div>
@can('read-students')
<div class="menu-item">
    <a class="menu-link {{ Route::is('students.*') ? 'active' : '' }}" href="{{ route('students.index') }}">
        <span class="menu-icon">
            <i class="bi bi-people fs-3"></i>
        </span>
        <span class="menu-title">Students Management</span>
    </a>
</div>
@endcan
@can('read-courses')
<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ Route::is('courses') || Route::is('topics.*') ? 'show' : '' }}">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="bi bi-book fs-2"></i>
        </span>
        <span class="menu-title">Courses Management</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">
        @foreach($courses as $course)
        <div class="menu-item">
            <a class="menu-link {{ (Route::is('courses') && request()->slug === $course->slug) || (Route::is('topics.*') && (request()->slug === $course->slug || request()->course === $course->slug)) ? 'active' : '' }}" href="{{ route('courses', $course) }}">
                <span class="menu-icon">
                    <span class="bi bi-dot"></span>
                </span>
                <span class="menu-title">{{ $course->title }}</span>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endcan
@can('read-payments')
<div class="menu-item">
    <a class="menu-link {{ Route::is('payments.*') ? 'active' : '' }}" href="{{ route('payments.index') }}">
        <span class="menu-icon">
            <i class="bi bi-credit-card fs-3"></i>
        </span>
        <span class="menu-title">Payment Management</span>
    </a>
</div>
@endcan
@if(auth()->user()->hasAnyPermission(['read-users', 'read-roles']))

<div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ 
										Route::is('users.*') || Route::is('roles.*')
										? 'show' 
										: '' 
									}}">
    <span class="menu-link">
        <span class="menu-icon">
            <i class="bi bi-key fs-2"></i>
        </span>
        <span class="menu-title">Authentication</span>
        <span class="menu-arrow"></span>
    </span>
    <div class="menu-sub menu-sub-accordion menu-active-bg">

        <div class="menu-item">
            <a class="menu-link {{ Route::is('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                <span class="menu-icon">
                    <span class="bi bi-dot"></span>
                </span>
                <span class="menu-title">User Management</span>
            </a>
        </div>
        <div class="menu-item">
            <a class="menu-link {{ Route::is('roles.*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                <span class="menu-icon">
                    <span class="bi bi-dot"></span>
                </span>
                <span class="menu-title">Role Management</span>
            </a>
        </div>
    </div>
</div>
@endif