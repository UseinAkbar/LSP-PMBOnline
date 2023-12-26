@extends('layout.app')

@section('content')
<div class="flex">
    @include('layout.sidebar')
    <div class="px-5 py-10 w-10/12">
        <div class="mt-7 font-bold text-3xl">Update Data Pendaftaran Mahasiswa Baru</div>
        @if (count($errors) > 0)
        <div id="error" class="px-5 bg-red-500 text-white py-3 rounded items-center">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </div>
      @endif
        @if ($errors->first('wrong'))
            <div id="error" class="w-full px-5 bg-red-500 text-white py-3 rounded items-center">
                {{ $errors->first('wrong') }}
                <div class="float-right" onclick="closePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6  hover:rounded-full text-white hover:bg-red-800 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        @endif
        @if (Session::has('success'))
            <div id="success"
                class="w-full px-5 bg-green-500 text-white py-3 rounded -mt-16 items-center">
                {{ Session::get('success') }}
                <div class="float-right" onclick="closePopup()">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6  hover:rounded-full text-white hover:bg-green-800 hover:cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            </div>
        @endif
        <form action="{{route('dashboard.daftar_put', $data['id'])}}" method="post" class="mt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="id_admin" value="{{Auth::user()->id}}">
            <div class="flex flex-col w-1/2">
                <div class="mt-2 w-full space-y-2">
                    <div class="">Nama Lengkap</div>
                    <input type="text" name="nama_lengkap" value="{{old('nama_lengkap', $data['nama_lengkap'])}}" class="border border-black px-3 py-2 w-full" placeholder="Nama Lengkap">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Alamat KTP</div>
                    <input type="text" name="alamat_ktp" value="{{old('alamat_ktp', $data['alamat_ktp'])}}" class="border border-black px-3 py-2 w-full" placeholder="Alamat KTP">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Alamat Saat Ini</div>
                    <input type="text" name="alamat_sekarang" value="{{old('alamat_sekarang', $data['alamat_sekarang'])}}" class="border border-black px-3 py-2 w-full" placeholder="Alamat Saat Ini">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Kecamatan</div>
                    <input type="text" name="kecamatan" value="{{old('kecamatan', $data['kecamatan'])}}" class="border border-black px-3 py-2 w-full" placeholder="Kecamatan">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Kabupaten</div>
                    <div>
                        <select name="kabupaten" id="kabupaten" class="border border-black">
                            @foreach ($kabupaten as $k)
                            <option value="{{ $k->nama_kabupaten }}">{{ $k->nama_kabupaten }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Provinsi</div>
                    <div>
                        <select name="provinsi" id="provinsi" class="border border-black">
                            @foreach ($provinsi as $p)
                            <option value="{{ $p->nama_provinsi }}">{{ $p->nama_provinsi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Nomor Telepon</div>
                    <input type="number" name="noTelp" value="{{old('noTelp', $data['noTelp'])}}" class="border border-black px-3 py-2 w-full" placeholder="Nomor Telepon">                    
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Nomor HP</div>
                    <input type="number" name="noHp" value="{{old('noHp', $data['noHp'])}}" class="border border-black px-3 py-2 w-full" placeholder="Nomor HP">                    
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Email</div>
                    <input type="email" name="email" value="{{old('email', $data['email'])}}" class="border border-black px-3 py-2 w-full" placeholder="Email">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Kewarganegaraan</div>
                    <div>
                        <select name="kewarganegaraan" id="kewarganegaraan" class="border border-black">
                            <option value="WNI Asli">WNI Asli</option>
                            <option value="WNI Keturunan">WNI Keturunan</option>
                            <option value="WNI WNA">WNI WNA</option>
                        </select>
                    </div>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Tanggal Lahir</div>
                    <input type="date" name="tgl_lahir" value="{{old('tgl_lahir', $data['tgl_lahir'])}}" class="border border-black px-3 py-2 w-full" placeholder="Tanggal Lahir">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Kabupaten Lahir</div>
                    <div>
                        <select name="kabupaten_lahir" id="kabupaten_lahir" class="border border-black">
                            @foreach ($kabupaten as $k)
                            <option value="{{ $k->nama_kabupaten }}">{{ $k->nama_kabupaten }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Provinsi Lahir</div>
                    <div>
                        <select name="provinsi_lahir" id="provinsi_lahir" class="border border-black">
                            @foreach ($provinsi as $p)
                            <option value="{{ $p->nama_provinsi }}">{{ $p->nama_provinsi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Negara Lahir</div>
                    <input type="text" name="negara_lahir" value="{{old('negara_lahir', $data['negara_lahir'])}}" class="border border-black px-3 py-2 w-full" placeholder="Negara Lahir">
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Jenis Kelamin</div>
                        <select name="jenis_kelamin" id="jenis_kelamin" class="border border-black">
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Status Menikah</div>
                    <select name="status_menikah" id="status_menikah" class="border border-black">
                        <option value="Menikah">Menikah</option>
                        <option value="Belum Menikah">Belum Menikah</option>
                        <option value="Lain-lain (janda/duda)">Lain-lain (janda/duda)</option>
                    </select>
                </div>
                <div class="mt-2 w-full space-y-2">
                    <div class="">Agama</div>
                    <div>
                        <select name="nama_agama" id="nama_agama" class="border border-black">
                            @forelse ($agama as $a)
                                <option value="{{ $a->nama_agama }}">{{ $a->nama_agama }}</option>
                            @empty
                                Agama tidak tersedia
                            @endforelse
                        </select>
                    </div>
                </div>
                </div>
                <button type="submit">
                    <div class="border border-black px-10 py-2 mt-5 w-full text-center bg-white hover:bg-slate-800 hover:text-white">Update</div>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
