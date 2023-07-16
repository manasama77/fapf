<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $unique_lokasis = DB::table("t_job_vacant")
            ->select('lokasi')
            ->where('status', 1)
            ->groupBy('lokasi')
            ->orderBy('lokasi', 'asc')
            ->get();

        return view('page.landing', [
            'unique_lokasis' => $unique_lokasis,
        ]);
    }
}
