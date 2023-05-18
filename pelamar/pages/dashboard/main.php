<?php
function statusKelengkapan($row)
{
    $jerami['path_foto']                   = $row->path_foto;
    $jerami['path_ktp']                    = $row->path_ktp;
    $jerami['path_akta_kelahiran']         = $row->path_akta_kelahiran;
    $jerami['path_ijasah']                 = $row->path_ijasah;
    $jerami['path_transkrip_nilai']        = $row->path_transkrip_nilai;
    $jerami['path_setifikat_pelatihan']    = $row->path_setifikat_pelatihan;
    $jerami['path_surat_pengalaman_kerja'] = $row->path_surat_pengalaman_kerja;
    $jerami['path_slip_gaji']              = $row->path_slip_gaji;
    $jerami['path_npwp']                   = $row->path_npwp;
    $jerami['path_bpjs_tk']                = $row->path_bpjs_tk;
    $jerami['path_bpjs_kesehatan']         = $row->path_bpjs_kesehatan;
    $jerami['path_buku_tabungan']          = $row->path_buku_tabungan;
    $jerami['path_buku_nikah']             = $row->path_buku_nikah;
    $jerami['path_sertifikat_vaksin']      = $row->path_sertifikat_vaksin;
    $jerami['path_skck']                   = $row->path_skck;

    return !in_array(null, $jerami, false);
}

$_SESSION['token'] = md5(uniqid(mt_rand(), true));

$sql = sprintf(
    "SELECT
        t_jabatan.nama_jabatan,
        t_job_vacant.lokasi,
        t_pelamar.tgl_interview,

        t_pelamar.path_foto,
        t_pelamar.path_ktp,
        t_pelamar.path_akta_kelahiran,
        t_pelamar.path_ijasah,
        t_pelamar.path_transkrip_nilai,
        t_pelamar.path_setifikat_pelatihan,
        t_pelamar.path_surat_pengalaman_kerja,
        t_pelamar.path_slip_gaji,
        t_pelamar.path_npwp,
        t_pelamar.path_bpjs_tk,
        t_pelamar.path_bpjs_kesehatan,
        t_pelamar.path_buku_tabungan,
        t_pelamar.path_buku_nikah,
        t_pelamar.path_sertifikat_vaksin,
        t_pelamar.path_skck
    FROM
        t_pelamar
        LEFT JOIN t_job_vacant ON t_job_vacant.id = t_pelamar.t_job_vacant_id 
        left join t_jabatan on t_jabatan.kode_jabatan = t_job_vacant.jabatan
    WHERE
        t_pelamar.id = %s
    LIMIT 1",
    $_SESSION['t_pelamar_id'],
);

$query = $pdo->query($sql);
$nr    = $query->rowCount();
?>


<?php
if ($nr == 1) {
    $row = $query->fetchObject();
    $tgl_interview_obj = new DateTime($row->tgl_interview);
?>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="card">
                <div class="card-header fw-bold">
                    <h1 class="card-title">Job Apply Information</h1>
                </div>
                <div class="card-body">
                    <h2>
                        <?= $row->nama_jabatan; ?>
                    </h2>
                    <hr />
                    <p>
                        Kota: <?= $row->lokasi; ?>
                    </p>
                    <p>
                        Status Kelengkapan:
                        <?php
                        if (statusKelengkapan($row)) {
                            echo '<span class="badge bg-success"><i class="fa-solid fa-check fa-fw"></i> Lengkap</span>';
                        } else {
                            echo '<span class="badge bg-warning"><i class="fa-solid fa-times fa-fw"></i> Belum Lengkap</span>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <?php if (isset($_SESSION['wrong'])) { ?>
                <div class="alert alert-danger">
                    <?php
                    function show_error($item, $key)
                    {
                        if (strpos($key, 'err') !== false) {
                            echo $_SESSION[$key] . "<br />";
                        }
                    }
                    array_walk_recursive($_SESSION, 'show_error');
                    ?>
                </div>
            <?php } ?>
            <form action="<?= APP_URL; ?>/form_kelengkapan.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="token" name="token" value="<?= $_SESSION['token'] ?? ''; ?>" />
                <?php
                $is_disabled = statusKelengkapan($row);
                ?>
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
                                    <!-- <input type="file" class="form-control" id="path_foto" name="path_foto" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_foto" name="path_foto" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_ktp">
                                        KTP
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_ktp" name="path_ktp" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_ktp" name="path_ktp" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_akta_kelahiran">
                                        Akta Kelahiran
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_akta_kelahiran" name="path_akta_kelahiran" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_akta_kelahiran" name="path_akta_kelahiran" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_ijasah">
                                        Ijasah
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_ijasah" name="path_ijasah" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_ijasah" name="path_ijasah" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_transkrip_nilai">
                                        Transkrip Nilai
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_transkrip_nilai" name="path_transkrip_nilai" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_transkrip_nilai" name="path_transkrip_nilai" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_setifikat_pelatihan">
                                        Sertifikat Pelatihan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_setifikat_pelatihan" name="path_setifikat_pelatihan" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_setifikat_pelatihan" name="path_setifikat_pelatihan" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_surat_pengalaman_kerja">
                                        Surat Pengalaman Kerja
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_surat_pengalaman_kerja" name="path_surat_pengalaman_kerja" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_surat_pengalaman_kerja" name="path_surat_pengalaman_kerja" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_slip_gaji">
                                        Slip Gaji
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_slip_gaji" name="path_slip_gaji" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_slip_gaji" name="path_slip_gaji" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_npwp">
                                        NPWP
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_npwp" name="path_npwp" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_npwp" name="path_npwp" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_bpjs_tk">
                                        BPJS Tenaga Kerja
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_bpjs_tk" name="path_bpjs_tk" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_bpjs_tk" name="path_bpjs_tk" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_bpjs_kesehatan">
                                        BPJS Kesehatan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_bpjs_kesehatan" name="path_bpjs_kesehatan" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_bpjs_kesehatan" name="path_bpjs_kesehatan" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_buku_tabungan">
                                        Buku Tabungan
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_buku_tabungan" name="path_buku_tabungan" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_buku_tabungan" name="path_buku_tabungan" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_buku_nikah">
                                        Buku Nikah
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_buku_nikah" name="path_buku_nikah" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_buku_nikah" name="path_buku_nikah" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_sertifikat_vaksin">
                                        Sertifikat Vaksin
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_sertifikat_vaksin" name="path_sertifikat_vaksin" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_sertifikat_vaksin" name="path_sertifikat_vaksin" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="mb-2">
                                    <label for="path_skck">
                                        SKCK
                                        <span class="text-danger">*</span>
                                    </label>
                                    <!-- <input type="file" class="form-control" id="path_skck" name="path_skck" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" <?= $is_disabled ? "disabled" : ""; ?> /> -->
                                    <input type="file" class="form-control" id="path_skck" name="path_skck" accept="image/*, application/pdf, application/msword, application/vnd.openxmlformats-officedocument.wordprocessingml.document" required <?= $is_disabled ? "disabled" : ""; ?> />
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
<?php } ?>