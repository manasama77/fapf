@extends('dashboard_theme')

@section('aku_isi_mas')
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="card">
                <div class="card-header fw-bold">
                    <h1 class="card-title">Job Apply Information</h1>
                </div>
                <div class="card-body">
                    <h2>
                        <?= $pelamars->nama_jabatan ?>
                    </h2>
                    <hr />
                    <p>
                        Kota: <?= $pelamars->lokasi ?>
                    </p>
                    <p>
                        Status Kelengkapan:
                        @if ($status_kelengkapan)
                            <span class="badge bg-success"><i class="fa-solid fa-check fa-fw"></i> Lengkap</span>
                        @else
                            <span class="badge bg-warning"><i class="fa-solid fa-times fa-fw"></i> Belum Lengkap</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            {{-- error --}}
            <form action="{{ route('kelengkapan.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @php
                    $is_disabled = $status_kelengkapan;
                @endphp
                <div class="card">
                    <div class="card-header fw-bold">
                        <h1 class="card-title">Form Kelengkapan Data</h1>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_foto">
                                        Foto
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="path_foto" name="path_foto"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        required <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_ktp">
                                        KTP
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="path_ktp" name="path_ktp"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        required <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_kk">
                                        Kartu Keluarga
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="path_kk" name="path_kk"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        required <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_akta_kelahiran">
                                        Akta Kelahiran
                                    </label>
                                    <input type="file" class="form-control" id="path_akta_kelahiran"
                                        name="path_akta_kelahiran"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_ijasah">
                                        Ijasah
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="path_ijasah" name="path_ijasah"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        required <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_transkrip_nilai">
                                        Transkrip Nilai
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="path_transkrip_nilai"
                                        name="path_transkrip_nilai"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        required <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_sertifikat_pelatihan">
                                        Sertifikat Pelatihan
                                    </label>
                                    <input type="file" class="form-control" id="path_sertifikat_pelatihan"
                                        name="path_sertifikat_pelatihan"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_surat_pengalaman_kerja">
                                        Surat Pengalaman Kerja
                                    </label>
                                    <input type="file" class="form-control" id="path_surat_pengalaman_kerja"
                                        name="path_surat_pengalaman_kerja"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_slip_gaji">
                                        Slip Gaji
                                    </label>
                                    <input type="file" class="form-control" id="path_slip_gaji" name="path_slip_gaji"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_npwp">
                                        NPWP
                                    </label>
                                    <input type="file" class="form-control" id="path_npwp" name="path_npwp"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_bpjs_tk">
                                        BPJS Tenaga Kerja
                                    </label>
                                    <input type="file" class="form-control" id="path_bpjs_tk" name="path_bpjs_tk"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_bpjs_kesehatan">
                                        BPJS Kesehatan
                                    </label>
                                    <input type="file" class="form-control" id="path_bpjs_kesehatan"
                                        name="path_bpjs_kesehatan"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_buku_tabungan">
                                        Buku Tabungan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="path_buku_tabungan"
                                        name="path_buku_tabungan"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        required <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_buku_nikah">
                                        Buku Nikah
                                    </label>
                                    <input type="file" class="form-control" id="path_buku_nikah"
                                        name="path_buku_nikah"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_sertifikat_vaksin">
                                        Sertifikat Vaksin
                                    </label>
                                    <input type="file" class="form-control" id="path_sertifikat_vaksin"
                                        name="path_sertifikat_vaksin"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_skck">
                                        SKCK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file" class="form-control" id="path_skck" name="path_skck"
                                        accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document"
                                        required <?= $is_disabled ? 'disabled' : '' ?> />
                                </div>
                            </div>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-sm-12 col-md-3">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fa-solid fa-save fa-fw"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
