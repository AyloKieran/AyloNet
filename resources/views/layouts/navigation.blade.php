<nav class="w-72 bg-truegray-700 hidden md:flex md:flex-col shadow-xl">
    <div class="bg-truegray-800 shadow-xl py-3">
        <a href="{{ route('home') }}"><img class="w-1/3 mx-auto" src="{{ asset('aylo.svg') }}"></img></a>
    </div>

    <div class="flex-grow py-3">
        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
            Home
        </x-nav-link>
        <x-nav-link :href="'portfolio'" :active="request()->path() == 'portfolio'">
            Portfolio
        </x-nav-link>
        <x-nav-link :href="'github'">
            Github
        </x-nav-link>
        <x-nav-link :href="'contact'" :active="request()->path() == 'contact'">
            Contact
        </x-nav-link>
    </div>

    @auth
        <div class="bg-truegray-800 shadow-xl flex flex-row p-2">

            @if(!auth()->user()->avatar)
                <svg class="h-8 w-8 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            @else
                <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->avatar }}"></img>
            @endif

            <div class="mx-2 h-auto flex flex-col justify-center items-center">
                <span class="text-md text-truegray-300">{{ Auth::user()->name }}</span>
            </div>
            <div class="flex-grow"></div>
            <div class="h-auto flex flex-col justify-center items-center text-truegray-400 hover:text-white transition">
                <a href="#">
                    <i class="fas fa-sliders-h"></i>
                </a>
            </div>
            <div class="h-auto flex flex-col justify-center items-center text-truegray-400 hover:text-white transition ml-4 mr-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button>
                    <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        </div>
    @endauth
</nav>