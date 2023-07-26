<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobListController extends Controller
{
    public function index(Request $request)
    {
        $unique_lokasis = DB::table("t_job_vacant")
            ->select('lokasi')
            ->where('status', 1)
            ->groupBy('lokasi')
            ->orderBy('lokasi', 'asc')
            ->get();

        $job_lists = DB::table('t_job_vacant')
            ->select([
                't_job_vacant.id',
                't_job_vacant.skill',
                't_job_vacant.lokasi',
                't_jabatan.nama_jabatan',
            ])
            ->leftJoin('t_jabatan', 't_jabatan.kode_jabatan', '=', 't_job_vacant.jabatan')
            ->where('t_job_vacant.status', 1)
            ->orderBy('t_job_vacant.tgl_input', 'desc');

        if ($request->lokasi) {
            $job_lists->where('t_job_vacant.lokasi', $request->lokasi);
        }

        if ($request->keyword) {
            $job_lists->where('t_jabatan.nama_jabatan', 'like', '%' . $request->keyword . '%');
        }

        $job_lists = $job_lists->paginate(10);

        $job_lists = $job_lists->appends([
            'lokasi'  => $request->lokasi ?? null,
            'keyword' => $request->keyword ?? null,
        ]);

        return view('page.job_list', [
            'unique_lokasis' => $unique_lokasis,
            'job_lists'      => $job_lists,
        ]);
    }

    public function show($id)
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
                't_jabatan.departemen',
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

        return view('page.job_list_show', [
            'job_lists' => $job_lists,
        ]);
    }
}
