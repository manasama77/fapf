<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class ReportController extends Controller
{
    public function index()
    {
        $departements = DB::table('t_department')->where('active', 1)->orderBy('nama_department', 'asc')->get();
        $jabatans     = DB::table('t_jabatan')->where('active', 1)->orderBy('nama_jabatan', 'asc')->get();
        return view('report', [
            'departements' => $departements,
            'jabatans'     => $jabatans,
        ]);
    }

    public function chart1(Request $request)
    {
        $collection = DB::table('t_job_vacant')
            ->select('t_job_vacant.tgl_dibutuhkan')
            ->where('t_job_vacant.status', 1)
            ->whereYear('t_job_vacant.tgl_dibutuhkan', Carbon::now());

        if ($request->kode_jabatan) {
            $collection->where(function (Builder $query) use ($request) {
                $query
                    ->where('t_job_vacant.jabatan', $request->kode_jabatan);
            });
        }

        if ($request->kode_departement) {
            $collection->where(function (Builder $query) use ($request) {
                $query
                    ->where('t_job_vacant.unit_kerja', $request->kode_departement);
            });
        }

        $sql        = $collection->toSql();
        $collection = $collection->get();

        $data_label = [];
        $data_value = [];

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1, date('Y')));
            $filtered = $collection->filter(function ($value, $key) use ($i) {
                return Carbon::parse($value->tgl_dibutuhkan)->format('m') == $i;
            });

            array_push($data_label, $month);
            array_push($data_value, $filtered->count());
        }
        return response()->json([
            'code'       => 200,
            'message'    => 'OK',
            'data_label' => $data_label,
            'data_value' => $data_value,
            'sql'        => $sql,
        ]);
    }

    public function chart2(Request $request)
    {
        $collection = DB::table('t_pelamar')
            ->select('t_pelamar.tgl_input')
            ->leftJoin('t_job_vacant', 't_job_vacant.id', '=', 't_pelamar.t_job_vacant_id')
            ->where('t_job_vacant.status', 1)
            ->whereYear('t_job_vacant.tgl_input', Carbon::now());

        if ($request->kode_jabatan) {
            $collection->where(function (Builder $query) use ($request) {
                $query
                    ->where('t_pelamar.posisi', $request->kode_jabatan);
            });
        }

        if ($request->kode_departement) {
            $collection->where(function (Builder $query) use ($request) {
                $query
                    ->where('t_job_vacant.unit_kerja', $request->kode_departement);
            });
        }

        $sql        = $collection->toSql();
        $collection = $collection->get();

        $data_label = [];
        $data_value = [];

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1, date('Y')));
            $filtered = $collection->filter(function ($value, $key) use ($i) {
                return Carbon::parse($value->tgl_input)->format('m') == $i;
            });

            array_push($data_label, $month);
            array_push($data_value, $filtered->count());
        }
        return response()->json([
            'code'       => 200,
            'message'    => 'OK',
            'data_label' => $data_label,
            'data_value' => $data_value,
            'sql'        => $sql,
        ]);
    }

    public function chart3(Request $request)
    {
        $jabatans = DB::table('t_jabatan')
            ->select([
                't_jabatan.kode_jabatan',
                't_jabatan.nama_jabatan',
                DB::raw('count(*) as count')
            ])
            ->leftJoin('t_job_vacant', 't_job_vacant.jabatan', '=', 't_jabatan.kode_jabatan')
            ->where('t_jabatan.active', 1)
            ->whereDate('t_job_vacant.tgl_dibutuhkan', '>', Carbon::now())
            ->groupBy([
                't_jabatan.kode_jabatan',
                't_jabatan.nama_jabatan',
            ])
            ->get();

        $data_label = [];
        $data_value = [];
        foreach ($jabatans as $jabatan) {
            $nama_jabatan = $jabatan->nama_jabatan;
            $count        = $jabatan->count;

            array_push($data_label, $nama_jabatan);
            array_push($data_value, $count);
        }


        return response()->json([
            'code'       => 200,
            'message'    => 'OK',
            'data_label' => $data_label,
            'data_value' => $data_value,
        ]);
    }
}
