@extends('landing_theme')

@section('aku_isi_mas')
    <section class="c-section c-banner-slider--hero mb-0">
        <div class="row js-slider-banner" data-slider-dot="true">
            <div class="col c-banner-slider--hero__wrapper">
                <picture>
                    <source src="{{ asset('images/banner-fap-agri.jpeg') }}" srcset="{{ asset('images/banner-fap-agri.jpeg') }}"
                        media="(min-width: 769px)" alt="FAP-AGRI-CAREER" />
                    <img data-src="{{ asset('images/hero-banner.jpg') }}" class="lazy" alt="FAP-AGRI-CAREER" />
                </picture>
                <div class="container">
                    <div class="row c-banner-slider--hero__content">
                        <div class="col-12 col-md-5">
                            <h1 class="mb-2">Kesempatan Berkarir Bersama FAP Agri</h1>
                            <p>
                                FAP Agri memiliki komitmen untuk menghasilkan produk
                                berkualitas, ramah lingkungan dengan berpegang teguh pada tata
                                kelola yang baik untuk mencapai kinerja unggul, mewujudkan
                                kesejahteraan karyawan, serta menjadikan masyarakat mitra
                                setara yang saling menguntungkan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="c-section c-section--small--mb u-position u-position--sticky-top u-position--sticky-top--sec-top ">
        <form action="{{ route('job-list') }}" method="GET" id="js-form-search">
            <div class="c-card--full-width">
                <div class="container">
                    <div class="row c-search justify-content-md-center">

                        <div class="col-12 col-md-5 align-self-center u-hide--mobile" id="js-filter-desktop">
                            <div class="d-flex">
                            </div>
                        </div>

                        <div class="col-12 col-md-7 align-self-center d-flex">
                            <div class="c-search__group  ml-0 ml-md-2 mr-2 mr-md-0 ">
                                <input type="hidden" name="lokasi" value="{{ request()->input('lokasi') ?? null }}">
                                <input type="text" name="keyword" class="field-search" placeholder="Search Position..."
                                    value="{{ request()->input('keyword') ?? null }}">
                                <button class="btn-search" type="submit">
                                    <i class="icon-search"></i>
                                    <span class="u-hide--mobile">
                                        Cari
                                    </span>
                                </button>
                            </div>

                            <span class="icon-filter align-self-center js-switch-filter u-hide--desktop"
                                data-target="switch-filter"></span>

                        </div>

                    </div>
                </div>
            </div>
        </form>

    </section>

    <section class="c-section px-2">
        <div class="container">
            <div class="row">

                <div class="col-12 pl-0 pl-md-2">

                    <div class="row align-items-center c-toolbar c-toolbar--menu c-toolbar--theme-gocareer mb-3 u-hide--desktop js-menu-downtop"
                        data-target="city">
                        <div class="col-3">
                            <p><i class="c-toolbar__icon icon-location"></i></p>
                        </div>
                        <div class="col-6">
                            <p class="">
                                Pilih Kota
                            </p>
                        </div>
                        <div class="col-3">
                            <p><i class="c-toolbar__icon icon-caret-down"></i></p>
                        </div>
                    </div>

                    <div class="row mb-0 mb-md-4">
                        <div class="col-12 col-md-5 align-self-center offset-md-3">
                            <h2 class="mb-2 mb-md-0 u-title--jobs">
                                Job list
                            </h2>
                        </div>
                    </div>

                    <hr class="c-hr mt-2 mb-2 mt-md-3 mb-md-3 offset-md-3">

                    <div class="row">

                        <div class="col-12 col-md-3 u-hide--mobile pr-0 pr-md-2">
                            <div class="u-position u-position--sticky-top u-position--sticky-top--ter-top">

                                <div class="c-filter--card">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="c-filter--card__selectbox">
                                                <span
                                                    class="u-font-weight__bold c-filter--card__selectbox__label">Kota</span>
                                                <div class="c-dropdown">
                                                    <p class="u-fg--gocareer c-filter--card__selectbox__info js-dropdown js-menu-downtop"
                                                        data-target="city">
                                                        {{ request()->input('lokasi') ?? 'Semua Lokasi' }}
                                                    </p>

                                                    <div class="c-dropdown__list">
                                                        <ul class="u-hide--mobile">

                                                            <li class="list-item">
                                                                <a
                                                                    href="{{ route('job-list') }}?lokasi=&keyword={{ request()->input('keyword') }}">
                                                                    Semua Lokasi
                                                                </a>
                                                            </li>
                                                            @foreach ($unique_lokasis as $unique_lokasi)
                                                                <li class="list-item">
                                                                    <a
                                                                        href="{{ route('job-list') }}?lokasi={{ $unique_lokasi->lokasi }}&keyword={{ request()->input('keyword') }}">
                                                                        {{ $unique_lokasi->lokasi }}
                                                                    </a>
                                                                </li>
                                                            @endforeach

                                                        </ul>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="col-12 col-md-9 c-job-list">

                            @if ($job_lists->count() == 0)
                                <div class="row">
                                    <h1>Job List Empty. Come back again later</h1>
                                </div>
                            @else
                                @foreach ($job_lists as $job_list)
                                    <div class="row">
                                        <div class="col-12 c-job-list__item">
                                            <div class="c-card">
                                                <div class="c-card__body p-2">
                                                    <div class="row">
                                                        <div class="col-1 u-text-align__center--desktop">
                                                            <p class="u-font-weight__bold u-fg--goride">
                                                                {{ $loop->iteration }}
                                                            </p>
                                                        </div>

                                                        <div class="col-11">
                                                            <div class="row">
                                                                <div class="col-12 col-md-6 ">
                                                                    <p class="u-font-weight__bold mb-1 mb-md-0">
                                                                        <a
                                                                            href="{{ route('job-list.show', $job_list->id) }}">
                                                                            {{ $job_list->nama_jabatan }}
                                                                        </a>
                                                                    </p>
                                                                </div>
                                                                <div class="col-12 col-md-6 align-self-center">
                                                                    <div class="row">
                                                                        <div
                                                                            class="col-6 col-md-6 u-text-align__center--desktop">
                                                                            <p
                                                                                class="u-font-10--mb u-font-weight__bold u-fg--goride">
                                                                                Kota</p>
                                                                            <p>{{ $job_list->lokasi }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    {{ $job_lists->links() }}

                </div>
            </div>

            <form action="#" method="GET" id="js-form-filter">
                <input type="hidden" name="country" id="val-country" value="">
                <input type="hidden" name="city" id="val-city" value="">
            </form>
        </div>
    </section>
@endsection
