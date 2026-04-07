<div class="header">

    <div class="header-left active">
        <a href="{{ route('home') }}" class="logo" style="display:flex; justify-content:center; width:100%;">
            <img src="{{ asset('assets/img/logo.png') }}" alt="" style="height: 70px; width: auto; padding: 6px 10px; background: #fff; border-radius: 10px; box-shadow: 0 4px 14px rgba(0,0,0,0.12);">
        </a>
        <a href="{{ route('home') }}" class="logo-small" style="display:none; justify-content:center; width:100%;">
            <img src="{{ asset('assets/img/logo.png') }}" alt="" style="height: 44px; width: auto; padding: 4px 6px; background: #fff; border-radius: 8px; box-shadow: 0 3px 10px rgba(0,0,0,0.12);">
        </a>
        <a id="toggle_btn" href="javascript:void(0);"></a>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    <ul class="nav user-menu">
        <li class="nav-item has-arrow flag-nav">
            <a class="nav-link" href="{{ route('pos') }}" style="background-color: rgb(217, 180, 112)">
                <img src="{{ asset('assets/img/icons/sales1.svg') }}" alt="" height="20">POS
            </a>
        </li>
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="javascript:void(0);" class="dropdown-toggle nav-link userset" data-bs-toggle="dropdown">
                <span class="user-img"><img src="{{ asset('assets/img/IbraEngineer Logo 2 COPY.png') }}" alt="">
                <span class="status online"></span></span>
            </a>
            <div class="dropdown-menu menu-drop-user">
                <div class="profilename">
                    <div class="profileset">
                        @if (Auth::check())
                        <span class="user-img">
                            <img src="{{ asset('avatars/'.Auth::user()->profilePic) }}" alt="">
                            <span class="status online"></span>
                        </span>
                        <div class="profilesets">
                            @if(Auth::user()!==null)
                            <h6>{{ Auth::user()->username }}</h6>
                            @endif
                            <h5>{{ Auth::user()->role }}</h5>
                        </div>
                        @else
                        <script type="text/javascript">
                            window.location.href = "{{ url('/') }}";
                        </script>
                        @endif

                    </div>
                    <hr class="m-0">
                    <a class="dropdown-item" href="{{ route('profile') }}"> <i class="me-2" data-feather="user"></i>Mon Profile</a>
                    <hr class="m-0">
                    <a href="{{ route('storefront') }}" target="_blank" class="dropdown-item"> <i class="me-2" data-feather="shopping-cart"></i>Magasin</a>
                    <hr class="m-0">
                    <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="dropdown-item logout pb-0" style="border:0; background:transparent; width:100%; text-align:left;">
                            <img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2" alt="img">Deconnection
                        </button>
                    </form>
                </div>
            </div>
        </li>
    </ul>

    <div class="dropdown mobile-user-menu">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item">
                @if (Auth::check())
                <span class="user-img">
                    <img src="{{ asset('avatars/'.Auth::user()->profilePic) }}" alt="">
                    <span class="status online"></span>
                </span>
                <div class="profilesets">
                    @if(Auth::user()!==null)
                    <h6>{{ Auth::user()->username }}</h6>
                    @endif
                </div>
                @else
                <script type="text/javascript">
                    window.location.href = "{{ url('/') }}";
                </script>
                @endif
            </a>
            <a class="dropdown-item" href="{{ route('pos') }}" style="background-color: rgb(217, 180, 112)">
                <img src="{{ asset('assets/img/icons/sales1.svg') }}" class="me-2" alt="" height="20">POS
            </a>
            <a class="dropdown-item" href="{{ route('profile') }}"> <i class="me-2" data-feather="user"></i>Mon Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item" style="border:0; background:transparent; width:100%; text-align:left;">
                    <img src="{{ asset('assets/img/icons/log-out.svg') }}" class="me-2" alt="img">Deconnection
                </button>
            </form>
        </div>
    </div>

</div>
