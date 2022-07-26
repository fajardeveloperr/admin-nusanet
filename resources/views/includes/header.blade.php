<header class="app-header fixed-top rounded">
    <div class="app-header-inner">
        <div class="container-fluid py-2">
            <div class="app-header-content">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <a id="sidepanel-toggler" class="sidepanel-toggler d-inline-block d-xl-none" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30"
                                role="img">
                                <title>Menu</title>
                                <path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                    stroke-width="2" d="M4 7h22M4 15h22M4 23h22"></path>
                            </svg>
                        </a>
                    </div>
                    <!--//col-->
                    <div class="search-mobile-trigger d-sm-none col">
                        {{-- <i class="search-mobile-trigger-icon fas fa-search"></i> --}}
                    </div>
                    <!--//col-->

                    <div class="app-utilities col-auto">
                        <div class="app-utility-item app-user-dropdown dropdown">
                            <a href="https://docs.google.com/forms/d/1ljCdLUTZNxIGvfXhc2k2G3vii_HmOol2YHKMFuSLdIg/edit">
                                <img class="me-4 " title="FeedBack"
                                    src="https://img.icons8.com/external-phatplus-lineal-phatplus/40/000000/external-feedback-design-thinking-phatplus-lineal-phatplus.png" />
                            </a>
                            <a class="dropdown-toggle" id="user-dropdown-toggle" data-bs-toggle="dropdown"
                                href="#" role="button" aria-expanded="false">
                                <i class="fa fa-user-alt me-1"></i>
                                {{ ucwords(auth()->user()->name) }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="user-dropdown-toggle">
                                {{-- <li><hr class="dropdown-divider"></li> --}}
                                {{-- <li><a class="dropdown-item" href="#">Account Setting</a></li> --}}
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="nav-link text-body font-weight-bold px-0">
                                        <i class="fa-solid fa-arrow-right-from-bracket me-1"></i>
                                        Logout
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </a></li>
                            </ul>
                        </div>
                        <!--//app-user-dropdown-->
                    </div>
                    <!--//app-utilities-->
                </div>
                <!--//row-->
            </div>
            <!--//app-header-content-->
        </div>
        <!--//container-fluid-->
    </div>
    <!--//app-header-inner-->
    @include('includes.sidebar')
</header>
<!--//app-header-->
