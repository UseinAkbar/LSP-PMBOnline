<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\User;
use App\Models\Agama;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->isAdmin == 1) {
            $data = Pendaftaran::all();
            return view('dashboard.pendaftaran.daftar_read', ['data' => $data]);
        }
    }

    public function history()
    {
        if (Auth::user()->isAdmin == 0) {
            $data = Pendaftaran::where('users_id', '=', Auth::user()->id)->get();
            return view('dashboard.pendaftaran.daftar_history', ['data' => $data]);
        }
    }

    public function listPendaftar()
    {
        $data = User::all()->where('isAdmin','0');   
        return view('dashboard.user.user_list', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabupaten = Kabupaten::all();
        $provinsi = Provinsi::all();
        $agama = Agama::all();
        return view('dashboard.pendaftaran.daftar_create', ['kabupaten' => $kabupaten, 'provinsi' => $provinsi, 'agama' => $agama]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $countPendaftaran = Pendaftaran::where('users_id', '=', Auth::user()->id)->count();
        if($countPendaftaran >= 1) {
            return redirect()->route('dashboard.history')->withErrors(['wrong' => 'Kamu sudah mendaftar!']);
        } else {
            $rules = [
                'nama_lengkap' => 'required',
                'alamat_ktp' => 'required',
                'alamat_sekarang' => 'required',
                'kecamatan' => 'required',
                'kabupaten' => 'required',
                'provinsi' => 'required',
                'noHp' => 'required',
                'email' => 'required|email|unique:pendaftaran',
                'kewarganegaraan' => 'required',
                'tgl_lahir' => 'required',
                'kabupaten_lahir' => 'required',
                'provinsi_lahir' => 'required',
                'jenis_kelamin' => 'required',
                'status_menikah' => 'required'
            ];
    
            $customMessages = [
                'required' => ':attribute tidak boleh kosong.',
                'unique' => ':attribute sudah terdaftar.',
                'email' => ':attribute harus berupa email.',
                'min' => ':attribute minimal :min karakter.',
                'same' => ':attribute tidak sama dengan password.',
            ];
            $this->validate($request, $rules, $customMessages);
    
            try {
                $pendaftaran = Pendaftaran::create([
                    'users_id' => Auth::user()->id,
                    'nama_lengkap' => $request->nama_lengkap,
                    'alamat_ktp' => $request->alamat_ktp,
                    'alamat_sekarang' => $request->alamat_sekarang,
                    'kecamatan' => $request->kecamatan,
                    'kabupaten' => $request->kabupaten,
                    'provinsi' => $request->provinsi,
                    'noTelp' => $request->noTelp,
                    'noHp' => $request->noHp,
                    'email' => $request->email,
                    'kewarganegaraan' => $request->kewarganegaraan,
                    'tgl_lahir' => $request->tgl_lahir,
                    'kabupaten_lahir' => $request->kabupaten_lahir,
                    'provinsi_lahir' => $request->provinsi_lahir,
                    'negara_lahir' => $request->negara_lahir,
                    'jenis_kelamin' => $request->jenis_kelamin,
                    'status_menikah' => $request->status_menikah,
                    'agama' => $request->nama_agama
                ]);
                $pendaftaran->save();
        
                return redirect()->route('dashboard.history')->with('success', 'Pendaftaran Mahasiswa Baru Berhasil!');
     
            } catch (\Throwable $th) {
                //throw $th;
                dd($th->getMessage());
                DB::rollback();
            }
        }
    }

    // public function tampil()
    // {
    //     $data = Peminjaman::find($id);
    //     return view('dashboard.peminjaman.transaksi_read', ['data' => $data]);
    // }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Pendaftaran::find($id);
        $kabupaten = Kabupaten::all();
        $provinsi = Provinsi::all();
        $agama = Agama::all();
        return view('dashboard.pendaftaran.daftar_edit', 
        ['data' => $data, 'kabupaten' => $kabupaten, 'provinsi' => $provinsi, 'agama' => $agama]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pendaftaran = Pendaftaran::find($id);

        $pendaftaran->nama_lengkap = $request->nama_lengkap;
        $pendaftaran->alamat_ktp = $request->alamat_ktp;
        $pendaftaran->alamat_sekarang = $request->alamat_sekarang;
        $pendaftaran->kecamatan = $request->kecamatan;
        $pendaftaran->kabupaten = $request->kabupaten;
        $pendaftaran->provinsi = $request->provinsi;
        $pendaftaran->noTelp = $request->noTelp;
        $pendaftaran->noHp = $request->noHp;
        $pendaftaran->email = $request->email;
        $pendaftaran->kewarganegaraan = $request->kewarganegaraan;
        $pendaftaran->tgl_lahir = $request->tgl_lahir;
        $pendaftaran->kabupaten_lahir = $request->kabupaten_lahir;
        $pendaftaran->provinsi_lahir = $request->provinsi_lahir;
        $pendaftaran->negara_lahir = $request->negara_lahir;
        $pendaftaran->jenis_kelamin = $request->jenis_kelamin;
        $pendaftaran->status_menikah = $request->status_menikah;
        $pendaftaran->agama = $request->nama_agama;
        $pendaftaran->save();

        if (Auth::user()->isAdmin == 1) {
            return redirect()->route('dashboard.list_pendaftaran')->with('success', 'Berhasil Mengubah Data');
        } else {
            return redirect()->route('pmb.home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendaftaran = Pendaftaran::find($id);
        $pendaftaran->delete();
        return redirect()->back()->with('success', 'Berhasil Menghapus Data');
    }
}
