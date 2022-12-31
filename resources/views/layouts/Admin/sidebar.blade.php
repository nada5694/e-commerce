<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <a class="navbar-brand m-0" href="javascript:void(0)" target="_blank">
        <span class="ms-1 font-weight-bold">Fashion Gate Dashboard</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{route('dashboard')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fa-solid fa-house text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Wepsite</span>
            </a>
        </li>
        @if(auth()->user()->user_type == "admin" || auth()->user()->user_type == "moderator")
            <li class="nav-item">
                <a class="nav-link {{ route('users.index') }}" href="{{ route('users.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="ni ni-single-02 text-info text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a  class="nav-link {{ route('products.index') }}" href="{{ route('products.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-box-open text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ route('categories.index') }}" href="{{ route('categories.index') }}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    {{-- <i class="ni ni-credit-card text-success text-sm opacity-10"></i> --}}
                    <i class="fa-solid fa-align-justify text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Categories</span>
                </a>
            </li>
        @elseif(auth()->user()->user_type == "vendor")
            <!------------- Start route products ------------->
            <li class="nav-item">
                <a  class="nav-link {{ route('products.index') }}" href="{{ route('products.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-box-open text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Products</span>
                </a>
            </li>
            <!------------- End route products ------------->
        @endif
    </aside>
