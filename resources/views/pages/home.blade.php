<x-app-layout>
    <x-slot name="title">
        Home
    </x-slot>

    @php
        $mainlinks = collect([
            ['name' => 'HASS', 'icon' => "homeassistant.png", 'link' => 'https://hass.home.aylo.net'], 
            ['name' => 'Plex', 'icon' => "plex.png", 'link' => 'https://plex.home.aylo.net'], 
            ['name' => 'Ombi', 'icon' => "ombi.png", 'link' => 'https://ombi.home.aylo.net'], 
        ]);
        $otherlinks = collect([
            ['name' => 'Tautulli', 'icon' => "tautulli.png", 'link' => 'https://tautulli.home.aylo.net'], 
            ['name' => 'Sonarr', 'icon' => "sonarr.png", 'link' => 'https://sonarr.home.aylo.net'], 
            ['name' => 'Radarr', 'icon' => "radarr.png", 'link' => 'https://radarr.home.aylo.net'], 
            ['name' => 'Torrent', 'icon' => "qbittorrent.png", 'link' => 'https://torrent.home.aylo.net'], 
            ['name' => 'Jackett', 'icon' => "jackett.png", 'link' => 'https://jackett.home.aylo.net'], 
            ['name' => 'Nginx PM', 'icon' => "nginx-pm.png", 'link' => 'https://nginx-pm.home.aylo.net'], 
            ['name' => 'Unifi', 'icon' => "unifi.png", 'link' => 'https://unifi.intnet.home.aylo.net'], 
        ]);
    @endphp

    <x-slot name="scripts">
        <script>

        </script>
    </x-slot>

    <div class="w-full flex flex-col md:h-screen text-white" style="background: url('static/home/bg.webp')">
        <div class="flex-grow"></div>
        <div class="flex flex-wrap justify-center pt-4 my-6 sm:my-0">
        @foreach($mainlinks as $link)
            <a href="{{ $link['link'] }}" class="bg-gray-700 mx-2 my-2 p-3 rounded-xl shadow hover:bg-gray-400 transition">
                <img src="static/home/{{ $link['icon'] }}" class="w-24 sm:w-32 sm:h-32 mx-auto"></img>
                <p class="font-semibold mt-3 text-lg text-center">{{ $link['name'] }}</p>
            </a>
        @endforeach
        </div>
        <div class="flex flex-wrap justify-center pt-4 sm:pt-0 pb-4">
        @foreach($otherlinks as $link)
            <a href="{{ $link['link'] }}" class="bg-gray-800 mx-2 my-2 p-3 rounded-xl shadow hover:bg-gray-400 transition">
                <img src="static/home/{{ $link['icon'] }}" class="w-20 h-20 p-2"></img>
                <p class="font-semibold mt-3 text-center">{{ $link['name'] }}</p>
            </a>
        @endforeach
        </div>
        <div class="flex-grow"></div>
    </div>
</x-app-layout>