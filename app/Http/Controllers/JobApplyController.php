<?php

namespace App\Http\Controllers;

use App\Mail\RegisterMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class JobApplyController extends Controller
{
    public function index($id)
    {
        $job_lists = DB::table('t_job_vacant')
            ->select([
                't_job_vacant.id',
                't_job_vacant.tgl_input as tgl_posted',
                't_job_vacant.tgl_dibutuhkan',
                't_job_vacant.status_karyawan',
                't_job_vacant.pengalaman',
                't_job_vacant.jk',
                't_job_vacant.lokasi',
                't_job_vacant.usia_min',
                't_job_vacant.usia_max',
                't_job_vacant.pendidikan',

                't_jabatan.kode_jabatan',
                't_jabatan.nama_jabatan',
                't_jabatan.reportTo as nama_departemen',
                't_jabatan.posisi as informasi_pekerjaan',
                't_jabatan.tugas',
                't_jabatan.kriteria',
            ])
            ->leftJoin('t_jabatan', 't_jabatan.kode_jabatan', '=', 't_job_vacant.jabatan')
            ->where('t_job_vacant.id', $id)
            ->where('t_job_vacant.status', 1)
            ->orderBy('t_job_vacant.tgl_input', 'desc')
            ->first();

        if (!$job_lists) {
            return redirect()->back();
        }

        $max_dob = Carbon::now()->subYears(17);

        return view('page.job_apply', [
            'id'        => $id,
            'job_lists' => $job_lists,
            'max_dob'   => $max_dob,
        ]);
    }

    public function store($id, Request $request)
    {
        $request->validate([
            'fname'              => 'required|min:3|max:255',
            'lname'              => 'required|min:3|max:255',
            'jk'                 => 'required',
            'national'           => 'required',
            'tempat_lahir'       => 'required',
            'tgl_lahir'          => 'required|date',
            'alamat'             => 'required',
            'email'              => 'required|email:rfc,dns',
            'hp'                 => 'required',
            'pendidikan'         => 'required',
            'jurusan'            => 'required',
            'ipk'                => 'required',
            'max_ipk'            => 'required',
            'status_universitas' => 'required',
            'lokasi_univ'        => 'required',
            'jurusan_sawit'      => 'required',
            'pengalaman'         => 'required',
            'pengalaman_kebun'   => 'required',
            'lokasi_kalimantan'  => 'required',
            'file'               => 'required|max:3145728|mimes:pdf,doc,docx',
            'file_surat'         => 'required|max:3145728|mimes:pdf,doc,docx',
        ]);

        $jabatans = DB::table('t_job_vacant')
            ->select([
                't_job_vacant.lokasi',
                't_jabatan.kode_jabatan',
                't_jabatan.nama_jabatan',
            ])
            ->leftJoin('t_jabatan', 't_jabatan.kode_jabatan', '=', 't_job_vacant.jabatan')
            ->where('t_job_vacant.id', $id)
            ->first();

        $n            = Carbon::now()->format('Ymd');
        $nama_lengkap = $request->fname . " " . $request->lname;
        $folder_name  = $n . "-" . $nama_lengkap;

        // upload
        $path_file       = $request->file('file')->store("public/pelamar/$folder_name");
        $path_file_surat = $request->file('file')->store("public/pelamar/$folder_name");

        $file_arr      = explode('/', $path_file);
        $file_filename = env('APP_URL') . "/storage/pelamar/" . $file_arr[2] . "/" . $file_arr[3];

        $file_surat_arr      = explode('/', $path_file_surat);
        $file_surat_filename = env('APP_URL') . "/storage/pelamar/" . $file_surat_arr[2] . "/" . $file_surat_arr[3];

        $exec = DB::table('t_pelamar')
            ->insert([
                'tgl_input'                   => Carbon::now(),
                'email_address'               => $request->email,
                'email'                       => $request->email,
                'nama_lengkap'                => $nama_lengkap,
                'fname'                       => $request->fname,
                'lname'                       => $request->lname,
                'jk'                          => $request->jk,
                'national'                    => $request->national,
                'hp'                          => $request->hp,
                'tempat_lahir'                => $request->tempat_lahir,
                'tgl_lahir'                   => $request->tgl_lahir,
                'alamat'                      => $request->alamat,
                'provinsi'                    => null,
                'kota'                        => null,
                'pendidikan'                  => $request->pendidikan,
                'universitas'                 => "",
                'status_universitas'          => $request->status_universitas,
                'lokasi_univ'                 => $request->lokasi_univ,
                'jurusan'                     => $request->jurusan,
                'jurusan_sawit'               => $request->jurusan_sawit,
                'ipk'                         => $request->ipk,
                'max_ipk'                     => $request->max_ipk,
                'posisi'                      => $jabatans->kode_jabatan,
                'status_pernikahan'           => null,
                'nama_ayah'                   => null,
                'pekerjaan_ayah'              => null,
                'nama_ibu'                    => null,
                'pekerjaan_ibu'               => null,
                'penempatan'                  => $jabatans->lokasi,
                'motivasi'                    => null,
                'tujuan'                      => null,
                'kelebihan'                   => null,
                'kekurangan'                  => null,
                'file_cv'                     => $file_filename,
                'file_surat'                  => $file_surat_filename,
                'fileupload'                  => null,
                'fileupload2'                 => null,
                'izin_orang_tua'              => null,
                'pendaftaran'                 => null,
                'setuju_orang_tua'            => null,
                'tgl_update'                  => null,
                'updated_by'                  => null,
                'status'                      => 1,
                'keterangan0'                 => null,
                'keterangan1'                 => null,
                'keterangan2'                 => null,
                'keterangan3'                 => null,
                'keterangan4'                 => null,
                'keterangan5'                 => null,
                'keterangan6'                 => null,
                'keterangan7'                 => null,
                'pengalaman'                  => $request->pengalaman,
                'pengalaman_kebun'            => $request->pengalaman_kebun,
                'lokasi_kalimantan'           => $request->lokasi_kalimantan,
                'tgl_interview'               => null,
                'activation_code'             => null,
                'login_code'                  => null,
                't_job_vacant_id'             => $id,
                'path_foto'                   => null,
                'path_ktp'                    => null,
                'path_akta_kelahiran'         => null,
                'path_ijasah'                 => null,
                'path_transkrip_nilai'        => null,
                'path_sertifikat_pelatihan'   => null,
                'path_surat_pengalaman_kerja' => null,
                'path_slip_gaji'              => null,
                'path_npwp'                   => null,
                'path_bpjs_tk'                => null,
                'path_bpjs_kesehatan'         => null,
                'path_buku_tabungan'          => null,
                'path_buku_nikah'             => null,
                'path_sertifikat_vaksin'      => null,
                'path_skck'                   => null,
            ]);

        if ($exec) {
            Mail::to($request->email)->send(new RegisterMail($nama_lengkap, $jabatans->nama_jabatan));
            return redirect()->route('job-apply.success');
        }

        return redirect()->back()->withErrors('Cannot connect to Database, please try again');
    }

    public function success()
    {
        return view('page.job_apply_success');
    }
}
