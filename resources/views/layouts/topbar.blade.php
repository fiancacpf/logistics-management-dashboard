<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box">
                <a href="index" class="logo logo-dark" style="position: relative">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/logo.svg') }}" alt="" height="28">
                    </span>
                    <span class="logo-lg position-absolute start-50 translate-middle-x" style="top: 0;">
                        <img src="{{ URL::asset('build/images/logo-dark.png') }}" alt="" height="48">
                    </span>
                </a>

                <a href="index" class="logo logo-light" style="position: relative">
                    <span class="logo-sm">
                        <img src="{{ URL::asset('build/images/logo-light.svg') }}" alt="" height="28">
                    </span>
                    <span class="logo-lg position-absolute start-50 translate-middle-x" style="top: 0;">
                        <img src="{{ URL::asset('build/images/logo-light.png') }}" alt="" height="48">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-support"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end" style="height: 60px;">
                    <div class="px-lg-2" style="display: block; height: 100%;">
                        <ul class="list-inline" style="height: 100%; display: flex; justify-content: space-around; align-items: center;">
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" class="social-list-item" style="background-color: #E1306C; color: white; border-color: #E1306C;">
                                    <i class="mdi mdi-instagram"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" class="social-list-item" style="background-color: #25D366; color: white; border-color: #25D366;">
                                    <i class="mdi mdi-whatsapp"></i>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript:void(0)" class="social-list-item bg-danger text-white border-danger">
                                    <i class="mdi mdi-email"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect fullscreen-btn" data-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ asset('build/images/users/user-dummy-img.jpg') }}"
             alt="" class="rounded-circle header-profile-user"
            alt="{{Auth::user()->name}}" title="{{Auth::user()->name}}" />
                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">
                        @php
                            $fullName = Auth::user()->name;
                            $names = explode(' ', $fullName);

                            if (count($names) > 1) {
                                $firstLetter = Str::substr($names[0], 0, 1);
                                $lastName = end($names);
                                $showName = $firstLetter . '. ' . $lastName;
                            } else {
                                $showName = $fullName;
                            }
                        @endphp
                        {{ $showName }}
                    </span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <a class="dropdown-item" href="javascript:void(0)"><i
                            class="bx bx-lock-open font-size-16 align-middle me-1"></i> <span
                            key="t-lock-screen" style="text-decoration: line-through;">Shut down system</span></a>
                </div>
            </div>
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                    <i class="bx bx-cog bx-spin"></i>
                </button>
            </div>
        </div>
    </div>
</header>