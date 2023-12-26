@extends('layout.app')

@section('navbar')
    @include('layout.navbar')
@endsection

@section('content')
    <div class="bg-primary-bg">
    @if ($errors->first('wrong'))
                <div id="error" class="w-full px-5 bg-red-500 text-white py-3 rounded items-center">
                    {{ $errors->first('wrong') }}
                    <div class="float-right" onclick="closePopupError()">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6  hover:rounded-full text-white hover:bg-red-800 hover:cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                </div>
        @endif
        <div class="">
            <div class="">
                <div class="grid grid-cols-2" style="height: 80vh;">
                    <div class="grid grid-cols-1 items-center px-10 py-20 bg-white text-white">
                        <div class="grid grid-cols-1 gap-5 justify-items-start">
                            <div class="text-6xl font-bold font-raleway text-black">
                                Ambil langkah masa depanmu bersama Telkom University
                            </div>
                            <p class="text-nunito font-semibold text-xl text-black" style="width: 70%;">Pendaftaran mahasiswa baru periode 2023/2024 baru saja dibuka!</p>
                            <a href="/dashboard/pendaftaran" class="px-8 py-2 bg-red-500 text-lg font-bold text-nunito rounded" style="justify-self: start;">Daftar Disini</a>
                        </div>
                    </div>
                    <div class="bg-red-200 bg-cover" style="background-image: url('/images/banner-home.webp');"></div>
                </div>
            </div>
        </div>
        <div class="py-20 grid grid-cols-1">
            <iframe width="800" height="600" src="https://www.youtube.com/embed/OYDzRuEuZjE?si=YEed6K0x7nJKxBIl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen class="mx-auto rounded-lg"></iframe>
        </div>
    </div>

    <script>
        function closePopupError() {
            document.getElementById('error').classList.add('hidden');
        }
    </script>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
