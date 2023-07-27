<div class="row align-items-center c-header__menu">
    <div class="col">
        <a href="/">
            <picture class="c-header__logo">
                <source srcset="{{ asset('images/fap-agri-career-navbar.png') }}" media="(max-width: 768px)">
                <img src="{{ asset('images/fap-agri-career-navbar.png') }}" alt="FAP-Agri career logo">
            </picture>
        </a>
    </div>
    <div class="col-9 u-hide--tablet">
        <div class="row c-header__link d-flex justify-content-end">
            <div class="col-auto">
                <a href="/" class="{{ Request::segment(1) == null ? 'active' : '' }}">Home</a>
            </div>
            <div class="col-auto">
                <a href="{{ route('job-list') }}" class="{{ Request::segment(1) == 'job-list' ? 'active' : '' }}">Job
                    List</a>
            </div>

            <div class="col-auto">
                <a href="https://fap-agri.com/">Website</a>
            </div>

            <div class="col-auto">
                <a href="{{ route('login') }}" class="{{ Request::segment(1) == 'login' ? 'active' : '' }}">
                    <i class="fa-solid fa-right-to-bracket fa-fw"></i> Login
                </a>
            </div>

        </div>
    </div>
</div>
