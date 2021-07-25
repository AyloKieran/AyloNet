<x-app-layout>
    <x-slot name="title">
        Home Links
    </x-slot>

    @php
        $mainlinks = collect([
            ['name' => 'HASS', 'icon' => "homeassistant.png", 'link' => 'https://hass.dy4.aylo.net'], 
            ['name' => 'Plex', 'icon' => "plex.png", 'link' => 'https://plex.dy4.aylo.net'], 
            ['name' => 'Ombi', 'icon' => "ombi.png", 'link' => 'https://ombi.dy4.aylo.net'], 
        ]);
        $otherlinks = collect([
            ['name' => 'Tautulli', 'icon' => "tautulli.png", 'link' => 'https://tautulli.dy4.aylo.net'], 
            ['name' => 'Sonarr', 'icon' => "sonarr.png", 'link' => 'https://sonarr.dy4.aylo.net'], 
            ['name' => 'Radarr', 'icon' => "radarr.png", 'link' => 'https://radarr.dy4.aylo.net'], 
            ['name' => 'Torrent', 'icon' => "qbittorrent.png", 'link' => 'https://torrent.dy4.aylo.net'], 
            ['name' => 'Jackett', 'icon' => "jackett.png", 'link' => 'https://jackett.dy4.aylo.net'], 
            ['name' => 'Pihole', 'icon' => "pihole.png", 'link' => 'https://pihole.dy4.aylo.net/admin/'], 
            ['name' => 'Nginx PM', 'icon' => "nginx-pm.png", 'link' => 'https://nginx-pm.dy4.aylo.net'], 
            ['name' => 'Unifi', 'icon' => "unifi.png", 'link' => 'https://unifi.dy4.aylo.net'], 
        ]);
    @endphp

    <x-slot name="scripts">
        <script>

        </script>
    </x-slot>

    <div class="w-full flex flex-col flex-grow text-white" style="background: url('static/home/bg.webp')">
        <div class="flex-grow"></div>
        <div class="flex flex-wrap justify-center ">
        @foreach($mainlinks as $link)
            <a href="{{ $link['link'] }}" class="bg-gray-700 mx-2 my-2 p-3 rounded-xl shadow hover:bg-gray-400 transition">
                <img src="static/home/{{ $link['icon'] }}" class="w-24 sm:w-32 sm:h-32 mx-auto" />
                <p class="font-semibold mt-3 text-lg text-center">{{ $link['name'] }}</p>
            </a>
        @endforeach
        </div>
        <div class="flex flex-wrap justify-center pt-0 pb-4">
        @foreach($otherlinks as $link)
            <a href="{{ $link['link'] }}" class="bg-gray-800 mx-2 my-2 p-3 rounded-xl shadow hover:bg-gray-400 transition">
                <img src="static/home/{{ $link['icon'] }}" class="w-20 h-20 p-2" />
                <p class="font-semibold mt-3 text-center">{{ $link['name'] }}</p>
            </a>
        @endforeach
        </div>
        <div class="flex-grow"></div>
    </div>
</x-app-layout>