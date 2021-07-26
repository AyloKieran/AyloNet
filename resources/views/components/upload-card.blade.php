@props(['upload'])
<div class="w-100 sm:w-52 flex flex-col bg-gray-200 rounded-md shadow-md p-2 m-2 mx-auto">
    <div class="flex flex-col bg-gray-100 w-100 h-32 rounded-md shadow-xs mb-2">
        <div class="flex-grow"></div>
        <div class="flex">
            <div class="flex-grow"></div>
            @if(in_array(explode(".", $upload->uploadUrl )[1], array("jpg", "png", "webp", "gif", "bmp", "tiff")))
            <img class="object-cover h-32" src="/{{ $upload->uploadUrl }}">
            @else
            <i class="fas fa-paperclip fa-2x"></i>
            @endif
            <div class="flex-grow"></div>
        </div>
        <div class="flex-grow"></div>
    </div>
    <div class="flex">
        {{ $upload->creator()->name }}
        <div class="flex-grow"></div>

        <a href="{{ route('admin.uploads.edit', [$upload]) }}">
            <button class="bg-blue-400 w-7 h-7 rounded shadow text-white mr-1">
                <i class="fas fa-pencil-alt"></i>
            </button>
        </a>
        
        <a href="{{ route('admin.uploads.edit', [$upload]) }}">
            <button class="bg-truegray-700 w-7 h-7 rounded shadow text-white">
                <i class="far fa-clipboard"></i>
            </button>
        </a>
    </div>
</div>
