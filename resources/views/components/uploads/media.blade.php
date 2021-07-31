<a class="h-32 flex flex-col bg-gray-100 rounded-md shadow-md" href="/{{ $upload->uploadUrl }}">
    <div class="flex-grow"></div>
    <div class="flex">
        <div class="flex-grow"></div>
        <?php $fileExtention = explode(".", $upload->uploadUrl)[1] ?>
        @if(in_array($fileExtention, array("jpg", "png", "webp", "gif", "bmp", "tiff")))
            <img class="object-cover h-32 rounded-md" src="/{{ $upload->uploadUrl }}">
        @else
        @switch($fileExtention)
            @case("mp4")
                <i class="fas fa-video fa-2x"></i>
                @break
            @case("mp3")
                <i class="fas fa-volume-up fa-2x"></i>
                @break
            @case("pdf")
                <i class="far fa-file fa-2x"></i>
                @break
            @default
                <i class="fas fa-paperclip fa-2x"></i>
        @endswitch
        @endif
        <div class="flex-grow"></div>
    </div>
    <div class="flex-grow"></div>
</a>