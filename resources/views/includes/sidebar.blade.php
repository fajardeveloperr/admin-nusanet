<div id="app-sidepanel" class="app-sidepanel">
    <div id="sidepanel-drop" class="sidepanel-drop"></div>
    <div class="sidepanel-inner d-flex flex-column rounded">
        <a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
        <div class="app-branding">
            <a class="app-logo" href="{{ route('home') }}"><img class="logo-icon me-2"
                    src="{{ asset('vendors/images/logo-nusanet.png') }}"style="vertical-align:-16px;margin:0px 20px"
                    alt="logo"><span class="logo-text">Nusanet</span></a>
        </div>
        <!--//app-branding-->

        <nav id="app-nav-main" class="app-nav app-nav-main flex-grow-1">
            <ul class="app-menu list-unstyled accordion" id="menu-accordion">
                {{-- <li class="nav-item has-submenu">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link" href="{{ route('home') }}" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="false" aria-controls="submenu-1">
                        <span class="nav-icon">
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z"/>
                            <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            </svg>
                             </span>
                         </span>
                         <span class="nav-link-text">Home</span>
                        <!--//submenu-arrow-->
                    </a><!--//nav-link-->
                </li><!--//nav-item--> --}}

                <li class="nav-item ">
                    <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                    <a class="nav-link active" href="{{ route('home') }}">
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

                @if (auth()->user()->utype === 'AuthMaster')
                    <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse"
                            data-bs-target="#submenu-2" aria-expanded="false" aria-controls="submenu-1">
                            <span class="nav-icon">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-files"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    style="vertical-align:-18px;margin:0px 18px">
                                    <path fill-rule="evenodd"
                                        d="M4 2h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2zm0 1a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H4z" />
                                    <path
                                        d="M6 0h7a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2v-1a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1H4a2 2 0 0 1 2-2z" />
                                </svg>
                            </span>
                            <span class="nav-link-text" style="vertical-align:-10px;margin:0px 30px">Manager Data</span>
                            <span class="submenu-arrow">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg"
                                    style="vertical-align:-15px;">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span>
                            <!--//submenu-arrow-->
                        </a>
                        <!--//nav-link-->
                        <div id="submenu-2" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled"style="vertical-align:-10px;margin:0px 30px">
                                <li class="submenu-item"><a class="submenu-link"
                                        href="{{ route('manager.data.customers') }}">Customers</a></li>
                                <li class="submenu-item"><a class="submenu-link"
                                        href="{{ route('manager.data.service') }}">Service List</a></li>
                                <li class="submenu-item"><a class="submenu-link"
                                        href="{{ route('manager.data.pengguna') }}">Pengguna</a></li>
                                <li class="submenu-item"><a class="submenu-link"
                                        href="{{ route('manager.data.promo') }}">List
                                        Promo</a></li>
                            </ul>
                        </div>
                    </li>
                    <!--//nav-item-->
                @endif

                @if (auth()->user()->utype === 'AuthSales')
                    <li class="nav-item has-submenu">
                        <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                        <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse"
                            data-bs-target="#submenu-3" aria-expanded="false" aria-controls="submenu-2">
                            <span class="nav-icon">
                                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                                {{-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-columns-gap" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M6 1H1v3h5V1zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12h-5v3h5v-3zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8H1v7h5V8zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6h-5v7h5V1zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
                        </svg> --}}
                                <img src="{{ asset('assets/images/filesales.gif') }}"width="50" alt="">
                            </span>
                            <span class="nav-link-text"style="vertical-align:-10px;margin:0px 30px">Data Sales</span>
                            <span class="submenu-arrow">
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down"
                                    fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg"style="vertical-align:-15px;">
                                    <path fill-rule="evenodd"
                                        d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
                                </svg>
                            </span>
                            <!--//submenu-arrow-->
                        </a>
                        <!--//nav-link-->
                        <div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">
                            <ul class="submenu-list list-unstyled"style="vertical-align:-10px;margin:0px 30px">
                                <li class="submenu-item"><a class="submenu-link"
                                        href="{{ route('manager.data.sales') }}">Customer sales</a></li>
                            </ul>
                        </div>
                    </li>
                    <!--//nav-item-->
                @endif
            </ul>
            <!--//app-menu-->
        </nav>
        <!--//app-nav-->
    </div>
    <!--//sidepanel-inner-->
</div>
<!--//app-sidepanel-->
