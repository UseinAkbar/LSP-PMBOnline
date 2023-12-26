@extends('layout.app')

@section('navbar')
    @include('layout.navbar')
@endsection

@section('content')
    <div class="bg-primary-bg">
        <div class="flex py-20 w-full">
            <div class="m-auto w-2/6">
                <div class="flex justify-center items-center">
                    <div class="w-full bg-white p-8 py-[5rem] rounded-xl">
                        @if ($errors->first('wrong'))
                            <div id="error" class="w-full px-5 bg-red-500 text-white py-3 rounded -mt-10 items-center">
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
                        <div class="font-raleway text-3xl font-bold text-center pt-2 pb-10">Daftar</div>
                        <form action="{{ Route('user.register') }}" method="POST" class="space-y-6">
                            @csrf
                            <div class="">
                                <div>
                                    <div class="relative">
                                        <div class="absolute top-1/2 left-7 transform -translate-x-1/2 -translate-y-1/2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="text-black w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                            </svg>

                                        </div>
                                        <input class=" bg-gray-100 rounded py-3 w-full px-12 border border-black"
                                            type="text" name="nama" id="" placeholder="Nama"
                                            value="{{ old('nama') }}">
                                    </div>
                                    @if ($errors->first('nama'))
                                        <div class="text-sm text-red-500">*{{ $errors->first('nama') }}</div>
                                    @endif
                                </div>                
                            </div>
                            <div>
                                <div class="relative">
                                    <div class="absolute top-1/2 left-7 transform -translate-x-1/2 -translate-y-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                                        </svg>

                                    </div>
                                    <input class=" bg-gray-100 rounded py-3 w-full px-12 border border-black"
                                        type="email" name="email" id="" placeholder="Alamat Email"
                                        value="{{ old('email') }}">
                                </div>
                                @if ($errors->first('email'))
                                    <div class="text-sm text-red-500">*{{ $errors->first('email') }}</div>
                                @endif
                            </div>
                            <div>
                                <div class="relative">
                                    <div class="absolute top-1/2 left-7 transform -translate-x-1/2 -translate-y-1/2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="text-black w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                                        </svg>

                                    </div>
                                    <input class=" bg-gray-100 rounded py-3 w-full px-12 border border-black"
                                        type="password" name="password" id="" placeholder="Password">
                                </div>
                                @if ($errors->first('password'))
                                    <div class="text-sm text-red-500">*{{ $errors->first('password') }}</div>
                                @endif
                            </div>
                            <div class="float-right font-nunito font-semibold">
                                <span>Sudah Punya Akun? </span>
                                <a href="{{ route('user.login') }}" class="underline hover:text-primary-pink">Masuk</a>
                            </div>
                            <button type="submit"
                                class="bg-primary-pink py-2 w-full font-nunito font-semibold bg-red-500 hover:bg-slate-300 hover:text-black rounded text-white">Daftar</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function closePopup() {
            document.getElementById('error').classList.add('hidden');
        }
    </script>
@endsection

@section('footer')
    @include('layout.footer')
@endsection
