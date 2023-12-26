@extends('layout.app')

@section('content')
<div class="flex">
    @include('layout.sidebar')
    <div class="grid grid-cols-1 gap-2 px-5 pb-20 w-10/12" style="grid-auto-rows: min-content;">
        <div class="">
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
                </div>
            @endif
            @if (Session::has('success'))
                <div id="success"
                    class="w-full px-5 bg-green-500 text-white py-3 rounded items-center">
                    {{ Session::get('success') }}
                </div>
            @endif
        </div>
        <div class="mt-10 font-bold text-3xl">PMB Online Telkom University</div>
        <div class="mt-5">
            <a href="{{Route('dashboard.daftar_add')}}" class="border border-black px-10 py-3 hover:bg-slate-800 hover:text-white duration-200">Daftar Sekarang</a>
        </div>
    </div>
</div>
@endsection
