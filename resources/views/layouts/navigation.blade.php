<nav x-data="{ open: false }" class="w-full flex flex-col bg-gray-800 md:hidden">
    <div class="flex items-center md:hidden p-1">
        <div class="pl-2">
            <a href="{{ route('home') }}">
                <x-logo class="h-8"></x-logo>
            </a>
        </div>
        <div class="flex-grow"></div>
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="'portfolio'" :active="request()->path() == 'portfolio'">
                {{ __('Portfolio') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
        @auth
            <a href="{{ route('user') }}" class="flex items-center px-4 hover:bg-gray-600 transition">
                <div class="flex-shrink-0">
                    @if(!auth()->user()->avatar)
                        <svg class="h-10 w-10 fill-current text-gray-500 font-semibold" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    @else
                        <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->avatar }}"></img>
                    @endif
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-truegray-300">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-truegray-200">{{ Auth::user()->email }}</div>
                </div>
            </a>

            <div class="mt-3 space-y-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    
                    @can('admin')
                        <x-responsive-nav-link :href="'admin'">
                            {{ __('Admin') }}
                        </x-responsive-nav-link>
                    @endcan

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
            @else
                <x-responsive-nav-link :href="route('login')">
                        {{ __('Log in') }}
                </x-responsive-nav-link>
            @endauth
        </div>
    </div>
</nav>

<nav class="w-72 flex-grow min-h-screen bg-gray-800 hidden md:flex md:flex-col shadow-xl fixed">
    <div class="bg-gray-900 shadow-xl py-3">
        <a href="{{ route('home') }}">
            <x-logo class="px-auto h-12 w-100"></x-logo>
        </a>
    </div>

    <div class="flex-grow py-3">
        <x-nav-link :href="route('home')" :icon="'fas fa-home'" :active="request()->routeIs('home')">
            Home
        </x-nav-link>
        <x-nav-link :href="'/portfolio'" :active="request()->path() == 'portfolio'">
            Portfolio
        </x-nav-link>
        <x-nav-link :href="'/github'">
            Github
        </x-nav-link>
        <x-nav-link :href="'/contact'" :active="request()->path() == 'contact'">
            Contact
        </x-nav-link>
    </div>


    <div class="bg-gray-900 flex flex-row p-2">
        @auth
            <a href="{{ route('user') }}" class="flex flex-row">
            <div class="w-10">
            @if(!auth()->user()->avatar)
                <svg class="h-10 w-10 p-1 fill-current text-gray-400 rounded-full bg-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            @else
                <img class="h-10 w-10 rounded-full" src="{{ auth()->user()->avatar }}"></img>
            @endif
            </div>

            <div class="mx-2 my-auto h-6 flex flex-col justify-center items-center">
                <span class="text-md text-truegray-300 overflow-hidden hover:text-white transition" title="{{ Auth::user()->email }} ({{ Auth::user()->provider }})">{{ Auth::user()->name }}</span>
            </div>
            </a>
            <div class="flex-grow"></div>
            @can('admin')
            <div class="h-auto flex flex-col justify-center items-center text-truegray-400 hover:text-white transition">
                <a href="{{ route('admin') }}" title="Admin Panel">
                    <i class="fas fa-sliders-h"></i>
                </a>
            </div>
            @endcan
            <div class="h-auto flex flex-col justify-center items-center text-truegray-400 hover:text-white transition ml-4 mr-1">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button title="Log out">
                    <i class="fas fa-sign-out-alt"></i>
                    </button>
                </form>
            </div>
        @else
            <x-nav-auth></x-nav-auth>
        @endauth
        </div>
        
</nav>