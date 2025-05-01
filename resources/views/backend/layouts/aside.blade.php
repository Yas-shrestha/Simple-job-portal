        <!-- Menu -->


        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">

                <a href="/admin/dashboard" class="app-brand-link">
                    <span class=" demo menu-text fw-bolder ms-2 fs-3"><span class="text-primary">Print</span>ifyIt
                </a>


                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item  {{ Route::is('admin') ? 'active' : '' }}">
                    <a href="/admin/" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Category and reservation</span>
                </li>

                <li class="menu-item {{ Route::is('file.index') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="fa fa-folder" aria-hidden="true"></i>
                        <div data-i18n="Account Settings">Files</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('file.index') }}" class="menu-link">
                                <div data-i18n="Notifications">Manage</div>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (Auth::user() && Auth::user()->role == 'user')
                    <li class="menu-item {{ Route::is('show.application') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <div data-i18n="Account Settings">Applications</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('show.application') }}" class="menu-link">
                                    <div data-i18n="Notifications">View Application </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user() && Auth::user()->role == 'company')
                    <li class="menu-item {{ Route::is('show.application.admin') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <div data-i18n="Account Settings">Applications</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('show.application.admin') }}" class="menu-link">
                                    <div data-i18n="Notifications">View Application </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ Route::is('job.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <div data-i18n="Account Settings">Jobs</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('job.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item {{ Route::is('contact.show') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa fa-folder" aria-hidden="true"></i>
                            <div data-i18n="Account Settings">Applications</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('contact.show') }}" class="menu-link">
                                    <div data-i18n="Notifications">View Application </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="menu-item">
                    <a href="{{ route('logout') }}" class="menu-link menu-toggle"
                        onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;
                        <div data-i18n="Account Settings">Logout</div>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </aside>

        <!-- / Menu -->
