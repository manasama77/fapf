@extends('landing_theme')

@section('aku_isi_mas')
    <section class="c-section c-banner-slider--hero mb-0">
        <div class="row js-slider-banner" data-slider-dot="true">
            <div class="col c-banner-slider--hero__wrapper">
                <picture>
                    <source src="{{ asset('images/1jKsECHMBc2y.jpg') }}" srcset="{{ asset('images/1jKsECHMBc2y.jpg') }}"
                        media="(min-width: 769px)" alt="FAP-AGRI-CAREER" />
                    <img data-src="{{ asset('images/hero-banner012x_3.jpg') }}" class="lazy" alt="FAP-AGRI-CAREER" />
                </picture>
                <div class="container">
                    <div class="row c-banner-slider--hero__content">
                        <div class="col-12 col-md-5">
                            <h1 class="mb-2">Job Apply Success</h1>
                            <p>
                                CV & Juga Application Letter kamu akan segera diproses.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
