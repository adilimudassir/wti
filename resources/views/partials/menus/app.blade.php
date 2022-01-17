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
<div class="menu-content">
    <div class="separator mx-1 my-4"></div>
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
@can('read-payments')
<div class="menu-item">
    <a class="menu-link {{ Route::is('payments/') ? 'active' : '' }}" href="{{ route('payments.index') }}">
        <span class="menu-icon">
            <i class="bi bi-credit-card fs-3"></i>
        </span>
<span class="menu-title">Payments Management</span>
</a>
</div>
{{--

<div class="menu-item">
    <div class="menu-content pt-8 pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Payments Management</span>
    </div>
</div>

<div class="menu-item">
    <a class="menu-link {{ Route::is('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
<span class="menu-icon">
    <span class="bi bi-bank fs-3"></span>
</span>
<span class="menu-title">Bank Deposit</span>
</a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Route::is('roles.*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
        <span class="menu-icon">
            <span class="bi bi-credit-card fs-3"></span>
        </span>
        <span class="menu-title">Online Payment</span>
    </a>
</div>
--}}
@endcan

@can('read-courses')
<div class="menu-item">
    <div class="menu-content pt-8 pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Courses Management</span>
    </div>
</div>
@foreach($courses as $course)
<div class="menu-item">
    <a class="menu-link {{ (Route::is('courses') && request()->slug === $course->slug) || (Route::is('topics.*') && (request()->slug === $course->slug || request()->course === $course->slug)) ? 'active' : '' }}" href="{{ route('courses', $course) }}">
        <span class="menu-icon">
            <span class="bi 
            @if($course->title == 'Forex Trading')
            bi-currency-exchange
            @elseif($course->title == 'Cryptocurrency Trading')
            bi-currency-bitcoin
            @elseif($course->title == 'Stock Trading')
            bi-bank2
            @endif
            fs-3
            "></span>
        </span>
        <span class="menu-title">{{ $course->title }}</span>
    </a>
</div>
@endforeach
@endcan

@if(auth()->user()->hasAnyPermission(['read-users', 'read-roles']))

<div class="menu-item">
    <div class="menu-content pt-8 pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Authentication</span>
    </div>
</div>

<div class="menu-item">
    <a class="menu-link {{ Route::is('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
        <span class="menu-icon">
            <span class="bi bi-people fs-3"></span>
        </span>
        <span class="menu-title">User Management</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ Route::is('roles.*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
        <span class="menu-icon">
            <span class="bi bi-key fs-3"></span>
        </span>
        <span class="menu-title">Role Management</span>
    </a>
</div>
@endif