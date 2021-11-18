									<!--begin::Toolbar wrapper-->
									<div class="d-flex align-items-stretch flex-shrink-0">
									    <!--begin::User-->
									    <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
									        <!--begin::Menu wrapper-->
									        <div class="cursor-pointer symbol symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
									            <img src="assets/media/avatars/150-26.jpg" alt="user" />
									        </div>


									        <!--begin::Menu-->
									        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
									            <!--begin::Menu item-->
									            <div class="menu-item px-3">
									                <div class="menu-content d-flex align-items-center px-3">
									                    <!--begin::Avatar-->
									                    <div class="symbol symbol-50px me-5">
									                        <img alt="Logo" src="assets/media/avatars/150-26.jpg" />
									                    </div>
									                    <!--end::Avatar-->
									                    <div class="d-flex flex-column">
									                        <div class="fw-bolder d-flex align-items-center fs-5">{{ auth()->user()->name }}
									                            <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">{{ auth()->user()->getRoleNames()->first() }}</span>
									                        </div>
									                        <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{ auth()->user()->email }}</a>
									                    </div>
									                </div>
									            </div>
									            <!--end::Menu item-->
									            <!--begin::Menu separator-->
									            <div class="separator my-2"></div>
									            <!--end::Menu separator-->
									            <!--begin::Menu item-->
									            <div class="menu-item px-5">
									                <a href="{{ route('profile') }}" class="menu-link px-5">My Profile</a>
									            </div>
									            <!--end::Menu item-->
									            <!--begin::Menu item-->
									            <div class="menu-item px-5 my-1">
									                <a href="{{ route('change-password') }}" class="menu-link px-5">Change Password</a>
									            </div>
									            <!--end::Menu item-->
									            <!--begin::Menu item-->
									            <div class="menu-item px-5">
									                <a class="menu-link px-5" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									                    Sign Out
									                </a>

									                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									                    @csrf
									                </form>
									            </div>
									            <!--end::Menu item-->
									        </div>
									        <!--end::Menu-->


									        <!--end::Menu wrapper-->
									    </div>
									    <!--end::User -->
									</div>
									<!--end::Toolbar wrapper-->