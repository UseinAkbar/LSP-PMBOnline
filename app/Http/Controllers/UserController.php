<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('login');
    }

    public function home()
    {
        return view('home');
    }

    public function pendaftaran()
    {
        return view('dashboard.pendaftaran.daftar');
    }

    public function dashboard_user()
    {
        return view('dashboard.user.user_read');
    }

    public function registerAccount(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];

        $customMessages = [
            'required' => ':attribute tidak boleh kosong.',
            'unique' => ':attribute sudah terdaftar.',
            'email' => ':attribute harus berupa email.',
            'min' => ':attribute minimal :min karakter.',
            'same' => ':attribute tidak sama dengan password.',
        ];

        $this->validate($request, $rules, $customMessages);
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();
        return redirect()->route('user.login')->with('success', 'Registrasi Berhasil');
    }

    public function daftar()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        $customMessages = [
            'required' => ':attribute tidak boleh kosong.'
        ];

        $this->validate($request, $rules, $customMessages);


        if (Auth::attempt($request->only('email', 'password'))) {
            if(Auth::user()->id == 1) {
                return redirect()->route('dashboard.list_pendaftaran')->with('success', 'Login Berhasil');
            } else {
                return redirect()->route('dashboard.home')->with('success', 'Login Berhasil');
            }
        }

        return back()->withErrors([
            'wrong' => 'Email atau password anda salah',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.user.user_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ];

        $customMessages = [
            'required' => ':attribute tidak boleh kosong.',
            'unique' => ':attribute sudah terdaftar.',
            'email' => ':attribute harus berupa email.',
            'min' => ':attribute minimal :min karakter.',
            'same' => ':attribute tidak sama dengan password.',
        ];

        $this->validate($request, $rules, $customMessages);
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();
        return redirect()->route('dashboard.list_pendaftar')->with('success', 'Data Pendaftar Berhasil Ditambah!');
    }

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
        $data = User::find($id);
        return view('dashboard.user.user_edit', ['data' => $data]);
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
        $user = User::find($id);

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('dashboard.list_pendaftar')->with('success', 'Berhasil Mengubah Data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('dashboard.list_pendaftar')->with('success', 'Data Berhasil Dihapus');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login')->with('success', 'Berhasil Logout');
    }
}
