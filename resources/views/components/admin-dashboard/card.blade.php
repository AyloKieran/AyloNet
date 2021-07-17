@props(['route', 'colour', 'icon', 'title', 'content'])

<a class="flex bg-white rounded-md shadow-md p-3 mb-2 w-100 hover:bg-gray-50 group transition" href="{{ $route }}">
    <div class="{{ $colour }} bg-opacity-75 group-hover:bg-opacity-90 rounded-full w-12 h-12 mr-2 flex text-white transition">
        <div class="flex-grow"></div>
        <i class="{{ $icon }} fa-lg w-12 text-center align-middle my-auto"></i>
        <div class="flex-grow"></div>
    </div>
    <div class="flex flex-col">
        <h4 class="text-lg font-semibold text-gray-700">{{ $title }}</h4>
        <div class="text-gray-500 text-sm" title="{{ $content }}">{{ $content }}</div>
    </div>
</a>