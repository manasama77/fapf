<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function auth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email:rfc,dns|exists:t_pelamar,email',
            'password' => 'required|numeric',
        ], [
            'email.exists' => 'Kamu belum terdaftar sebagai pelamar FAP AGRI Career',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pelamars = DB::table('t_pelamar')->where('email', $request->email)->where('login_code', $request->password)->first();

        if (!$pelamars) {
            return redirect()->back()->withErrors('Kamu belum terdaftar sebagai pelamar FAP AGRI Career')->withInput();
        } elseif ($pelamars->status != 3) {
            if (in_array($pelamars->status, [1, 2])) {
                return redirect()->back()->withErrors('Lamaran sedang dalam proses pengecekan')->withInput();
            } elseif (in_array($pelamars->status, [4, 5, 6, 7, 8, 9, 10, 11, 12, 13])) {
                return redirect()->back()->withErrors('Lamaran sudah diterima, kamu tidak perlu melengkapi data kembali')->withInput();
            }

            return redirect()->back()->withErrors('Warning unknown status ' . $pelamars->status . ', please contact admin')->withInput();
        }

        $request->session()->put('t_pelamar_id', $pelamars->id);
        $request->session()->put('email', $pelamars->email);
        $request->session()->put('nama_lengkap', $pelamars->nama_lengkap);

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }
}
