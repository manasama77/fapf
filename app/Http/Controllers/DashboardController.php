<?php

namespace App\Http\Controllers;

use App\Mail\KelengkapanMail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->session()->get('t_pelamar_id') && !$request->session()->get('email') && !$request->session()->get('nama_lengkap')) {
            return redirect()->route('logout');
        }

        $pelamars = DB::table('t_pelamar')
            ->select([
                't_jabatan.nama_jabatan',
                't_job_vacant.lokasi',
                't_pelamar.tgl_interview',

                't_pelamar.path_foto',
                't_pelamar.path_ktp',
                't_pelamar.path_kk',
                't_pelamar.path_ijasah',
                't_pelamar.path_transkrip_nilai',
                't_pelamar.path_buku_tabungan',
                't_pelamar.path_skck',
            ])
            ->leftJoin('t_job_vacant', 't_job_vacant.id', '=', 't_pelamar.t_job_vacant_id')
            ->leftJoin('t_jabatan', 't_jabatan.kode_jabatan', '=', 't_job_vacant.jabatan')
            ->where('t_pelamar.id', $request->session()->get('t_pelamar_id'))
            ->first();

        if (!$pelamars) {
            return redirect()->route('logout');
        }

        $status_kelengkapan = $this->cek_status_kelengkapan($pelamars);

        return view('page.dashboard', [
            'pelamars'           => $pelamars,
            'status_kelengkapan' => $status_kelengkapan,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'path_foto'                   => 'required|max:3145728|mimes:pdf,doc,docx',
            'path_ktp'                    => 'required|max:3145728|mimes:pdf,doc,docx',
            'path_kk'                     => 'required|max:3145728|mimes:pdf,doc,docx',
            'path_akta_kelahiran'         => 'nullable|max:3145728|mimes:pdf,doc,docx',
            'path_ijasah'                 => 'required|max:3145728|mimes:pdf,doc,docx',
            'path_transkrip_nilai'        => 'required|max:3145728|mimes:pdf,doc,docx',
            'path_sertifikat_pelatihan'   => 'nullable|max:3145728|mimes:pdf,doc,docx',
            'path_surat_pengalaman_kerja' => 'nullable|max:3145728|mimes:pdf,doc,docx',
            'path_slip_gaji'              => 'nullable|max:3145728|mimes:pdf,doc,docx',
            'path_npwp'                   => 'nullable|max:3145728|mimes:pdf,doc,docx',
            'path_bpjs_tk'                => 'nullable|max:3145728|mimes:pdf,doc,docx',
            'path_bpjs_kesehatan'         => 'nullable|max:3145728|mimes:pdf,doc,docx',
            'path_buku_tabungan'          => 'required|max:3145728|mimes:pdf,doc,docx',
            'path_buku_nikah'             => 'nullable|max:3145728|mimes:pdf,doc,docx',
            'path_sertifikat_vaksin'      => 'nullable|max:3145728|mimes:pdf,doc,docx',
            'path_skck'                   => 'required|max:3145728|mimes:pdf,doc,docx',
        ]);

        $path_foto                   = $request->file('path_foto');
        $path_ktp                    = $request->file('path_ktp');
        $path_kk                     = $request->file('path_kk');
        $path_akta_kelahiran         = $request->file('path_akta_kelahiran');
        $path_ijasah                 = $request->file('path_ijasah');
        $path_transkrip_nilai        = $request->file('path_transkrip_nilai');
        $path_sertifikat_pelatihan   = $request->file('path_sertifikat_pelatihan');
        $path_surat_pengalaman_kerja = $request->file('path_surat_pengalaman_kerja');
        $path_slip_gaji              = $request->file('path_slip_gaji');
        $path_npwp                   = $request->file('path_npwp');
        $path_bpjs_tk                = $request->file('path_bpjs_tk');
        $path_bpjs_kesehatan         = $request->file('path_bpjs_kesehatan');
        $path_buku_tabungan          = $request->file('path_buku_tabungan');
        $path_buku_nikah             = $request->file('path_buku_nikah');
        $path_sertifikat_vaksin      = $request->file('path_sertifikat_vaksin');
        $path_skck                   = $request->file('path_skck');

        if ($path_foto) {
            $path_foto = $this->upload($request, 'path_foto');
        }

        if ($path_ktp) {
            $path_ktp = $this->upload($request, 'path_ktp');
        }

        if ($path_kk) {
            $path_kk = $this->upload($request, 'path_kk');
        }

        if ($path_akta_kelahiran) {
            $path_akta_kelahiran = $this->upload($request, 'path_akta_kelahiran');
        }

        if ($path_ijasah) {
            $path_ijasah = $this->upload($request, 'path_ijasah');
        }

        if ($path_transkrip_nilai) {
            $path_transkrip_nilai = $this->upload($request, 'path_transkrip_nilai');
        }

        if ($path_sertifikat_pelatihan) {
            $path_sertifikat_pelatihan = $this->upload($request, 'path_sertifikat_pelatihan');
        }

        if ($path_surat_pengalaman_kerja) {
            $path_surat_pengalaman_kerja = $this->upload($request, 'path_surat_pengalaman_kerja');
        }

        if ($path_slip_gaji) {
            $path_slip_gaji = $this->upload($request, 'path_slip_gaji');
        }

        if ($path_npwp) {
            $path_npwp = $this->upload($request, 'path_npwp');
        }

        if ($path_bpjs_tk) {
            $path_bpjs_tk = $this->upload($request, 'path_bpjs_tk');
        }

        if ($path_bpjs_kesehatan) {
            $path_bpjs_kesehatan = $this->upload($request, 'path_bpjs_kesehatan');
        }

        if ($path_buku_tabungan) {
            $path_buku_tabungan = $this->upload($request, 'path_buku_tabungan');
        }

        if ($path_buku_nikah) {
            $path_buku_nikah = $this->upload($request, 'path_buku_nikah');
        }

        if ($path_sertifikat_vaksin) {
            $path_sertifikat_vaksin = $this->upload($request, 'path_sertifikat_vaksin');
        }

        if ($path_skck) {
            $path_skck = $this->upload($request, 'path_skck');
        }

        $exec = DB::table("t_pelamar")
            ->where('email', $request->session()->get('email'))
            ->where('id', $request->session()->get('t_pelamar_id'))
            ->update([
                'path_foto'                   => $path_foto,
                'path_ktp'                    => $path_ktp,
                'path_kk'                     => $path_kk,
                'path_akta_kelahiran'         => $path_akta_kelahiran,
                'path_ijasah'                 => $path_ijasah,
                'path_transkrip_nilai'        => $path_transkrip_nilai,
                'path_sertifikat_pelatihan'   => $path_sertifikat_pelatihan,
                'path_surat_pengalaman_kerja' => $path_surat_pengalaman_kerja,
                'path_slip_gaji'              => $path_slip_gaji,
                'path_npwp'                   => $path_npwp,
                'path_bpjs_tk'                => $path_bpjs_tk,
                'path_bpjs_kesehatan'         => $path_bpjs_kesehatan,
                'path_buku_tabungan'          => $path_buku_tabungan,
                'path_buku_nikah'             => $path_buku_nikah,
                'path_sertifikat_vaksin'      => $path_sertifikat_vaksin,
                'path_skck'                   => $path_skck,
                'tgl_update'                  => Carbon::now(),
            ]);

        if ($exec) {
            // return new KelengkapanMail($request->session()->get('nama_lengkap'));
            Mail::to($request->session()->get('email'))->send(new KelengkapanMail($request->session()->get('nama_lengkap')));
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors('Cannot connect to Database, please try again');
    }

    protected function cek_status_kelengkapan($pelamars)
    {
        $jerami['path_foto']            = $pelamars->path_foto;
        $jerami['path_ktp']             = $pelamars->path_ktp;
        $jerami['path_kk']              = $pelamars->path_kk;
        $jerami['path_ijasah']          = $pelamars->path_ijasah;
        $jerami['path_transkrip_nilai'] = $pelamars->path_transkrip_nilai;
        $jerami['path_buku_tabungan']   = $pelamars->path_buku_tabungan;
        $jerami['path_skck']            = $pelamars->path_skck;

        return !in_array(null, $jerami, false);
    }

    protected function upload($request, $file)
    {
        $n            = Carbon::now()->format('Ymd');
        $nama_lengkap = $request->session()->get('nama_lengkap');
        $folder_name  = $n . "-" . $nama_lengkap;

        $path      = $request->file($file)->store("public/pelamar/$folder_name");
        $file_arr  = explode('/', $path);
        $file_name = env('APP_URL') . "/storage/pelamar/" . $file_arr[2] . "/" . $file_arr[3];
        return $file_name;
    }
}
