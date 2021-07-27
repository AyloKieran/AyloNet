<a class="h-32 flex flex-col bg-gray-100 rounded-md shadow-md" href="/{{ $upload->uploadUrl }}">
    <div class="flex-grow"></div>
    <div class="flex">
        <div class="flex-grow"></div>
        @if(in_array(explode(".", $upload->uploadUrl )[1], array("jpg", "png", "webp", "gif", "bmp", "tiff")))
        <img class="object-cover h-32 rounded-md" src="/{{ $upload->uploadUrl }}">
        @else
        <i class="fas fa-paperclip fa-2x"></i>
        @endif
        <div class="flex-grow"></div>
    </div>
    <div class="flex-grow"></div>
</a>