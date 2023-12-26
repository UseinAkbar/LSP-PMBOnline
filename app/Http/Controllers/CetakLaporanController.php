<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use Illuminate\Http\Request;

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \PDF;

class CetakLaporanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $riwayat_pendaftaran = Pendaftaran::where('users_id', '=', Auth::user()->id)->get();

        $pdf =PDF::loadView('dashboard.pendaftaran.laporan_pdf',['riwayat_pendaftaran'=>$riwayat_pendaftaran]);
        $pdf->setPaper('a4', 'landscape');

        return $pdf->download('laporan_pendaftaran.pdf');
    }
}
