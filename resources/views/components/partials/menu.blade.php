						<div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
						    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
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
						        @if(auth()->user()->hasAnyPermission(['read-users', 'read-roles']))
						        <div class="menu-item">
						            <div class="menu-content pt-8 pb-2">
						                <span class="menu-section text-muted text-uppercase fs-8 ls-1">Administration</span>
						            </div>
						        </div>
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
						                        <span class="menu-bullet">
						                            <span class="bullet bullet-dot"></span>
						                        </span>
						                        <span class="menu-title">User Management</span>
						                    </a>
						                </div>
						                <div class="menu-item">
						                    <a class="menu-link {{ Route::is('roles.*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
						                        <span class="menu-bullet">
						                            <span class="bullet bullet-dot"></span>
						                        </span>
						                        <span class="menu-title">Role Management</span>
						                    </a>
						                </div>
						            </div>
						        </div>
						        @endif
						    </div>
						</div>