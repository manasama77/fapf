<div class="wrapper">
    <div class="wrapper__header row align-items-center">
        <div clas="col">
            <img src="{{ asset('images/t2LAH9odCtAr.png') }}" alt="logo FAP-Agri career">
        </div>
        <div class="wrapper__header__close js-side-menu" data-target="js-content-side-munu"></div>
    </div>
    <div class="wrapper__list-menu">
        <ul>
            <li class="active">
                <a href="/" class="{{ Request::segment(1) == null ? 'active' : '' }}">Home</a>
            </li>
            <li class="col-auto">
                <a href="{{ route('job-list') }}" class="{{ Request::segment(1) == 'job-list' ? 'active' : '' }}">Job
                    List</a>
            </li>

            <li class="col-auto">
                <a href="https://fap-agri.com/">Website</a>
            </li>

            <li class="col-auto">
                <a href="{{ route('login') }}" class="{{ Request::segment(1) == 'login' ? 'active' : '' }}">
                    <i class="fa-solid fa-right-to-bracket fa-fw"></i> Login
                </a>
            </li>
        </ul>
    </div>
</div>
