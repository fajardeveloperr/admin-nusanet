<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column rounded">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="{{ URL::to('home') }}"><img class="logo-icon me-2"
                    src="{{ asset('vendors/images/logo-nusanet.png') }}"style="vertical-align:-16px;margin:0px 20px;"
                    alt="logo">
                <span class="logo-text fw-bold">NUSANET</span>
            </a>
        </div>
        <!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                <li class="nav-item">
                    <a class="nav-link {{ Request::segment(1) == 'home' ? 'active' : '' }}"
                        href="{{ URL::to('home') }}">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                style="vertical-align:-16px;margin:0px 20px">
                                <path fill-rule="evenodd"
                                    d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                                <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                            </svg>
                        </span>
                        <span class="nav-link-text"style="vertical-align:-10px;margin:0px 30px">Home</span>
                    </a>
                    <!--//nav-link-->
                </li>

                <style>
                    .active-toggle {
                        color: #15a362 !important;
                        background: #edfdf6;
                        border-left: 3px solid #15a362;
                        font-weight: 500;
                    }
                </style>


                <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle {{ Request::segment(1) == 'master' ? 'active-toggle' : 'collapsed' }}"
                        href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2"
                        aria-expanded="{{ Request::segment(1) == 'master' ? 'true' : 'false' }}"
                        aria-controls="submenu-1">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                style="vertical-align:-18px;margin:0px 18px">
                                <path fill-rule="evenodd"
                                    d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
                                <path
                                    d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
                            </svg>
                        </span>
                        <span class="nav-link-text" style="vertical-align:-10px;margin:0px 30px">Master Data</span>
                        <span class="submenu-arrow">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="vertical-align:-15px;">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                            </svg>
                        </span>
                        <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-2"
                        class="collapse submenu submenu-1 {{ Request::segment(1) == 'master' ? 'show' : null }}"
                        data-bs-parent="#menu-accordion">
                        <ul class="submenu-list list-unstyled"style="vertical-align:-10px;margin:0px 30px">
                            @can('AuthMaster')
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-customers' ? 'active' : null }}"
                                        href="{{ route('manager.data.customers') }}">Data Pelanggan</a></li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-service' ? 'active' : null }}"
                                        href="{{ route('manager.data.service') }}">Data Layanan</a></li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-pengguna' ? 'active' : null }}"
                                        href="{{ route('manager.data.pengguna') }}">Data Pengguna</a></li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-promo' ? 'active' : null }}"
                                        href="{{ route('manager.data.promo') }}">Data Promo</a></li>
                            @endcan

                            @can('AuthCRO')
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-customers' ? 'active' : null }}"
                                        href="{{ route('manager.data.customers') }}">Data Pelanggan</a></li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-promo' ? 'active' : null }}"
                                        href="{{ route('manager.data.promo') }}">Data Promo</a></li>
                            @endcan

                            @can('AuthSalesManager')
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-customers' ? 'active' : null }}"
                                        href="{{ route('manager.data.customers') }}">Data Pelanggan</a></li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-promo' ? 'active' : null }}"
                                        href="{{ route('manager.data.promo') }}">Data Promo</a></li>
                            @endcan

                            @can('AuthSales')
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-customers' ? 'active' : null }}"
                                        href="{{ route('manager.data.customers') }}">Data Pelanggan</a></li>
                                <li class="submenu-item"><a
                                        class="submenu-link {{ Request::segment(1) == 'master' && Request::segment(2) == 'manager-data-promo' ? 'active' : null }}"
                                        href="{{ route('manager.data.promo') }}">Data Promo</a></li>
                            @endcan
                        </ul>
                    </div>
                </li>
                <!--//nav-item-->

            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->
    </div>
    <!--//sidepanel-inner-->
</div>
<!--//app-sidepanel-->
