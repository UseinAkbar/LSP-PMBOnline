@extends('layout.app')

@section('content')
<div class="flex">
    @include('layout.sidebar')
    <div class="px-5 pb-10 w-10/12">
        <div class="my-5">
            @if ($errors->first('wrong'))
                <div id="error" class="w-full px-5 bg-red-500 text-white py-3 rounded items-center">
                    {{ $errors->first('wrong') }}
                </div>
            @endif
            @if (Session::has('success'))
                <div id="success"
                    class="w-full px-5 bg-green-500 text-white py-3 rounded items-center">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="mt-7 font-bold text-3xl">History Pendaftaran</div>
     
        <div class="mt-5 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-black dark:text-black">
                <thead class="text-xs text-white uppercase bg-slate-800 dark:bg-grey-300 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Pendaftar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat KTP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Alamat Saat Ini
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kecamatan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kabupaten
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Provinsi
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No Telp
                        </th>
                        <th scope="col" class="px-6 py-3">
                            No HP
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Kewarganegaraan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Menikah
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Tanggal Lahir
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Agama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $p)
                    <tr class="bg-white border-b dark:bg-white dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-200">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap dark:text-black">
                            {{ $loop->iteration }}
                        </th>
                        <td class="px-6 py-4">
                            {{$p['id']}}
                        </td>
                        <td class="px-6 py-4 font-medium">
                            {{$p['nama_lengkap']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['alamat_ktp']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['alamat_sekarang']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['kecamatan']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['kabupaten']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['provinsi']}}
                        </td>
                        <td class="px-6 py-4">
                        @isset($p['noTelp'])
                            0{{$p['noTelp']}}
                        @else
                            -
                        @endisset
                        </td>
                        <td class="px-6 py-4">
                            0{{$p['noHp']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['email']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['kewarganegaraan']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['status_menikah']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['tgl_lahir']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['jenis_kelamin']}}
                        </td>
                        <td class="px-6 py-4">
                            {{$p['agama']}}
                        </td>
                        <td class="px-6 py-4">
                            <a href="/cetaklaporan" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"><i class="fas fa-solid fa-print"></i> Cetak</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>  
    </div>
</div>
@endsection
