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

    <div class="container my-5">
        <div class="row">
            <div class="col-sm-8 pr-3">
                <h3 class="mt-2">
                    {{ $job_lists->kode_jabatan }} - {{ $job_lists->nama_jabatan }}
                </h3>
                <hr />

                <h4 class="mt-2">Job Description</h4>
                <p>
                    {{ $job_lists->informasi_pekerjaan }}
                </p>

                <h4 class="mt-2">Key Responsibilities</h4>
                <p>
                    {{ $job_lists->tugas }}
                </p>

                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    <a href="{{ route('job-apply', $job_lists->id) }}">
                        <button class="btn-gocareer btn-default btn-default--theme-gocareer">
                            Apply for Job
                        </button>
                    </a>
                    <a href="{{ route('job-list') }}" class="my-2">
                        <button class="btn-gocareer btn-default btn-outline--theme-gocareer">
                            Back to List
                        </button>
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="c-card">
                    <div class="c-card__body p-2">
                        <h3 class="mb-2">Job Overview</h3>
                        <p class="mb-2">Posted
                            date:<br />{{ Carbon\Carbon::parse($job_lists->tgl_posted)->diffForHumans() }}</p>
                        <p class="mb-2">Expiration
                            date:<br />{{ Carbon\Carbon::parse($job_lists->tgl_dibutuhkan)->format('d/M/Y') }}</p>
                        <p class="mb-2">Departemen:<br />{{ $job_lists->nama_departemen }}</p>
                        <p class="mb-2">Location:<br />{{ $job_lists->lokasi }}</p>
                        <p class="mb-2">Employee Status:<br />{{ $job_lists->status_karyawan }}</p>
                        <p class="mb-2">Experience:<br />{{ $job_lists->pengalaman }} years</p>
                        <p class="mb-2">Age Requirement:<br />{{ $job_lists->usia_min }} ~ {{ $job_lists->usia_max }}
                            years</p>
                        <p class="mb-2">Gender:<br />{{ $job_lists->jk = 'L' ? 'Male' : 'Female' }}</p>
                        <p class="mb-2">Education:<br />{{ $job_lists->pendidikan }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
