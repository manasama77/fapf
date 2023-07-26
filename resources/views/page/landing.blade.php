@extends('landing_theme')

@section('aku_isi_mas')
    <section class="c-section c-banner-slider--hero mb-0">
        <div class="row js-slider-banner" data-slider-dot="true">
            <div class="col c-banner-slider--hero__wrapper">
                <picture>
                    <source src="{{ asset('images/banner-fap-agri.jpeg') }}" srcset="{{ asset('images/banner-fap-agri.jpeg') }}"
                        media="(min-width: 769px)" alt="FAP-AGRI-CAREER" />
                    <img data-src="{{ asset('images/hero-banner.jpg') }}" class="lazy" alt="FAP-AGRI-CAREER" style="filter: brightness(75%);" />
                </picture>
                <div class="container" >
                    <div class="row c-banner-slider--hero__content">
                        <div class="col-12 col-md-5" style="color: #ffffff; margin-top: 230px;"  >
                            <h1 class="mb-2" >Kesempatan Berkarir Bersama FAP Agri</h1>
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

    <section class="c-section c-section--small--mb u-position u-position--sticky-top u-position--sticky-top--sec-top"
        style="margin-bottom: 20px;">
        <form action="{{ route('job-list') }}" method="GET" id="js-form-search">
            <div class="c-card--full-width">
                <div class="container">
                    <div class="row c-search justify-content-md-center">
                        <div class="col-12 col-md-5 align-self-center u-hide--mobile" id="js-filter-desktop">
                            <div class="d-flex">
                                <div class="col-6">
                                    <div class="c-dropdown">
                                        <div class="c-dropdown__select-box c-dropdown__select-box--rounded js-dropdown"
                                            id="js-title-city">
                                            Semua Kota
                                        </div>
                                        <div class="c-dropdown__list">
                                            <ul id="list-item-city">

                                                <li class="list-item">
                                                    <a href="{{ route('job-list') }}?lokasi=">
                                                        Semua Lokasi
                                                    </a>
                                                </li>
                                                @foreach ($unique_lokasis as $unique_lokasi)
                                                    <li class="list-item">
                                                        <a
                                                            href="{{ route('job-list') }}?lokasi={{ $unique_lokasi->lokasi }}">
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

                        <div class="col-12 col-md-7 align-self-center d-flex">
                            <div class="c-search__group ml-0 ml-md-2 mr-2 mr-md-0">
                                <input type="text" name="keyword" class="field-search" placeholder="Search Position..."
                                    value />
                                <button class="btn-search" type="submit">
                                    <i class="icon-search"></i>
                                    <span class="u-hide--mobile">Cari </span>
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

    <section class="c-section c-banner-slider c-banner-slider--thumbnail">
        <div class="container">
            <div class="row js-slider-banner-thumbnail" data-slider-dot="true" data-slider-arrows="true">
                <div class="col-12">
                    <div class="c-banner-slider--thumbnail__wrapper u-lazy u-lazy__image">
                        <picture>
                            <source src="{{ asset('images/0nvOVw8Ghgso.jpg') }}"
                                srcset="{{ asset('images/0nvOVw8Ghgso.jpg') }} 3000w" media="(min-width: 769px)"
                                alt="FAP-AGRI-CAREER" />
                            <img data-src="{{ asset('images/banner_slider.jpg') }}"
                                data-srcset="{{ asset('images/banner_slider.jpg') }} 400w, {{ asset('images/banner_slider.jpg') }} 800w, {{ asset('images/banner_slider.jpg') }} 3000w"
                                class="lazy" alt="FAP-AGRI-CAREER" />
                            <div class="u-lazy__placeholder-2"></div>
                        </picture>

                        <div class="row align-items-center c-banner-slider--thumbnail__content">
                            <div class="col-12 col-lg-6">
                                <h2 class="mb-2">FAP Learning Center</h2>
                                <p>
                                    FAP Agri menempatkan karyawan sebagai faktor esensial dari
                                    keberhasilan Perusahaan. Memiliki pekerja yang cakap dan
                                    handal sesuai dengan bidang, passion, dan kemampuannya
                                    menjadi tujuan pengembangan Sumber Daya Manusia di kami.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="c-banner-slider--thumbnail__wrapper u-lazy u-lazy__image">
                        <picture>
                            <source src="{{ asset('images/DsV5toZaWxkC.jpg') }}"
                                srcset="{{ asset('images/DsV5toZaWxkC.jpg') }} 3000w" media="(min-width: 769px)"
                                alt="FAP-AGRI-CAREER" />
                            <img data-src="{{ asset('images/DsV5toZaWxkC.jpg') }}"
                                data-srcset="{{ asset('images/DsV5toZaWxkC') }} 400w, {{ asset('images/DsV5toZaWxkC.jpg') }} 800w, {{ asset('images/DsV5toZaWxkC.jpg') }} 3000w"
                                class="lazy" alt="FAP-AGRI-CAREER" />
                            <div class="u-lazy__placeholder-2"></div>
                        </picture>

                        <div class="c-banner-slider--thumbnail__wrapper__mask"></div>
                        <span class="c-banner-slider--thumbnail__play js-show-popup" data-id="js-data-card-banner-2"></span>
                    </div>

                    <div class="u-hide--all" id="js-data-card-banner-2">
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/izDh15wrLXc"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="c-banner-slider--thumbnail__wrapper u-lazy u-lazy__image">
                        <picture>
                            <source src="{{ asset('images/uDNA02VmzrpO.jpg') }}"
                                srcset="{{ asset('images/uDNA02VmzrpO.jpg') }} 3000w" media="(min-width: 769px)"
                                alt="FAP-AGRI-CAREER" />
                            <img data-src="{{ asset('images/uDNA02VmzrpO.jpg') }}"
                                data-srcset="{{ asset('images/uDNA02VmzrpO') }} 400w, {{ asset('images/uDNA02VmzrpO.jpg') }} 800w, {{ asset('images/uDNA02VmzrpO.jpg') }} 3000w"
                                class="lazy" alt="FAP-AGRI-CAREER" />
                            <div class="u-lazy__placeholder-2"></div>
                        </picture>

                        <div class="c-banner-slider--thumbnail__wrapper__mask"></div>
                        <span class="c-banner-slider--thumbnail__play js-show-popup"
                            data-id="js-data-card-banner-3"></span>
                    </div>

                    <div class="u-hide--all" id="js-data-card-banner-3">
                        <div class="embed-responsive embed-responsive-21by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/E0OLn7ma304"
                                frameborder="0"
                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="c-popup" id="js-popup">
        <span class="close js-close-popup"></span>
        <div class="c-popup__content">
            <div class="body">
                <div id="js-popup-content" class="item-popup-content"></div>
            </div>
        </div>
    </div>

    <section class="c-section c-information--theme-gocareer">
        <div class="container c-information__wrapper px-2">
            <div class="row align-items-center">
                <div class="col-12 u-hide--tablet-desktop">
                    <h2 class="title mb-2">Ingin tahu lebih banyak?</h2>
                </div>
                <div class="col-12 col-md-6 pr-md-2">
                    <div class="c-information__image u-lazy u-lazy__image">
                        <picture>
                            <img data-src="{{ asset('images/BREAFING-SORE-44.jpeg') }}" alt="Curious for more image"
                                class="c-information__image--rounded lazy" />
                            <div class="u-lazy__placeholder-2"></div>
                        </picture>
                    </div>
                </div>
                <div class="col-12 col-md-6 pl-md-2">
                    <div class="row c-information__content">
                        <div class="col-12 u-hide--mobile">
                            <h2 class="title mb-2">Ingin tahu lebih banyak?</h2>
                        </div>
                        <div class="col-12">
                            <p class="description mb-2 mb-md-4"></p>
                        </div>
                        <div class="col-12">
                            <a href="{{ route('job-list') }}" class="col-auto">
                                <button class="btn-gocareer btn-default btn-default--theme-gocareer">
                                    Lihat Semua jobs
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="c-section c-information--theme-gocareer">
        <div class="container c-information__wrapper px-2">
            <div class="row align-items-center">
                <div class="col-12 u-hide--tablet-desktop">
                    <h2 class="title mb-2">Seperti apa petualangan di FAP-AGRI?</h2>
                </div>
                <div class="col-12 col-md-6 pl-md-2 order-1 order-md-2">
                    <div class="c-information__image u-lazy u-lazy__image">
                        <picture>
                            <img data-src="{{ asset('images/Socmed-Desktop.png') }}" alt="Curious for more image"
                                class="c-information__image--rounded lazy" />
                            <div class="u-lazy__placeholder-2"></div>
                        </picture>
                    </div>
                </div>
                <div class="col-12 col-md-6 pr-md-2 order-2 order-md-1">
                    <div class="row c-information__content">
                        <div class="col-12 u-hide--mobile">
                            <h2 class="title mb-2">Seperti apa petualangan di FAP-AGRI?</h2>
                        </div>
                        <div class="col-12">
                            <p class="description mb-2 mb-md-4">Yuk intip ke dalam!</p>
                        </div>

                        <div class="col-12 c-social c-social--black">
                            <div class="row c-social__items">
                                <a href="https://www.facebook.com/fapagri.official/" target="_blank"
                                    class="c-social__icon-wrapper">
                                    <i class="c-social__icon gi gi-facebook"></i>
                                </a>

                                <a href="https://www.linkedin.com/company/fap-agri/" target="_blank"
                                    class="c-social__icon-wrapper">
                                    <i class="c-social__icon gi gi-linkedin"></i>
                                </a>

                                <a href="https://www.instagram.com/fapagri.official/" target="_blank"
                                    class="c-social__icon-wrapper">
                                    <i class="c-social__icon gi gi-instagram"></i>
                                </a>

                                <a href="https://twitter.com/FAPA_Official" target="_blank"
                                    class="c-social__icon-wrapper">
                                    <i class="c-social__icon gi gi-twitter"></i>
                                </a>

                                <a href="https://www.youtube.com/@fapagri197" target="_blank"
                                    class="c-social__icon-wrapper">
                                    <i class="c-social__icon gi gi-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
