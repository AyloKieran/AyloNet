@props(['route', 'colour', 'icon', 'title'])

<a class="flex bg-white rounded-md shadow-md p-2 mb-2 w-100 hover:bg-gray-50 group transition" href="{{ $route }}">
    <div class="{{ $colour }} bg-opacity-75 group-hover:bg-opacity-90 rounded-full w-8 h-8 mr-2 flex text-white transition">
        <div class="flex-grow"></div>
        <i class="{{ $icon }} fa-md w-8 text-center align-middle my-auto"></i>
        <div class="flex-grow"></div>
    </div>
    <div class="flex flex-col">
        <h4 class="my-auto text-lg font-semibold text-gray-700">{{ $title }}</h4>
    </div>
</a>