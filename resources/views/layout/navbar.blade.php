<div class="bg-white">
    <div class=" px-10 font-nunito">
        <div class=" flex items-center justify-between py-5">
            <a href='/' class="text-2xl font-bold font-raleway hover:underline flex items-center gap-4">
                <img src="{{ asset('images/logo_telkom.png') }}" alt="Telkom University Logo" class="w-10 h-10 object-cover">
                PMB Telkom University
            </a>
            <div class="flex space-x-5 items-center">
                <div>
                    @if (Auth::user() != null)
                        <div class="flex space-x-3">
                            @if(Auth::user()->isAdmin == 1)
                            <a href="{{ route('dashboard.list_pendaftaran') }}" class=" font-semibold  text-black py-2 px-4 rounded-lg hover:underline">Halo, {{ Auth::user()->nama }}</a>
                            @else
                            <a href="{{ route('dashboard.index') }}" class=" font-semibold  text-black py-2 px-4 rounded-lg hover:underline">Halo, {{ Auth::user()->nama }}</a>
                            @endif
                            <form method="POST" action="{{ route('user.logout') }}">
                                @csrf
                                <button type="submit"
                                    class="font-semibold bg-red-500 hover:bg-orange-800 text-white py-2 px-4 rounded-lg">Logout</button>
                            </form>
                        </div>
                    @else
                        <a href="{{ route('user.login') }}"
                            class=" font-semibold bg-red-500 hover:bg-slate-300 text-white py-2 px-4 rounded-lg">Masuk
                            /
                            Daftar</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
