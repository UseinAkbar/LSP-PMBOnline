<div class="w-2/12 text-white bg-slate-800 min-h-screen" id="sidebar">
    <div class="px-5">
        <div class="font-bold text-md mt-4 pb-6 uppercase text-center">
            <div class="">Dashboard</div>
            <div class="">PMB Online</div>
        </div>
        <hr>
        <div class="mt-6">
        </div>
        @auth
            @if(Auth::user()->isAdmin == 1)
                <div class="mt-6">
                    <div class="space-y-3 mt-5">
                        <a href="{{route('dashboard.list_pendaftaran')}}"
                            class="flex space-x-3 {{ Route::is('dashboard.list_pendaftaran') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                            <div class="w-5 text-center">
                                <i class="fas fa-file hover:text-white text-slate-400"></i>
                            </div>
                            <div class="text-sm font-semibold uppercase">Data Pendaftaran</div>
                        </a>
                        <a href="{{route('dashboard.list_pendaftar')}}"
                            class="flex space-x-3 {{ Route::is('dashboard.list_pendaftar') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                            <div class="w-5 text-center">
                                <i class="fas fa-list-ul hover:text-white text-slate-400"></i>
                            </div>
                            <div class="text-sm font-semibold uppercase">List Pendaftar</div>
                        </a>
                    </div>
                </div>
            @endif
                <div class="mt-6">
                    <div class="space-y-3 mt-5">
                        @if(Auth::user()->isAdmin == 0)
                        <a href="{{route('pmb.home')}}"
                            class="flex space-x-3 {{ Route::is('pmb.home') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                            <div class="w-5 text-center">
                                <i class="fas fa-home hover:text-white text-slate-400"></i>
                            </div>
                            <div class="text-sm font-semibold uppercase">Home</div>
                        </a>
                        <a href="{{route('dashboard.home')}}"
                            class="flex space-x-3 {{ Route::is('dashboard.home') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                            <div class="w-5 text-center">
                                <i class="fas fa-user hover:text-white text-slate-400"></i>
                            </div>
                            <div class="text-sm font-semibold uppercase">Daftar</div>
                        </a>
                        <a href="{{route('dashboard.history')}}"
                            class="flex space-x-3 {{ Route::is('dashboard.history') ? 'bg-slate-500 text-white' : '' }} items-center hover:bg-slate-500 hover:text-white rounded p-2">
                            <div class="w-5 text-center">
                                <i class="fas fa-people-carry hover:text-white text-slate-400"></i>
                            </div>
                            <div class="text-sm font-semibold uppercase">history pendaftaran</div>
                        </a>
                        @endif
                        <form action="{{route('user.logout')}}" method="post">
                            @csrf
                            @method('POST')
                            <button type="submit"
                                class="flex w-full space-x-3 items-center {{ Route::is('user.logout') ? 'bg-slate-500 text-white' : '' }} hover:bg-slate-500 hover:text-white rounded p-2">
                                <div class="w-5 text-center">
                                    <i class="fas fa-door-open hover:text-white text-slate-400"></i>
                                </div>
                                <div type="submit" class="text-sm font-semibold uppercase">Logout</div>
                            </button>
                        </form>
                    </div>
                </div>
        @endauth
    </div>
</div>
