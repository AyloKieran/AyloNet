<x-app-layout>
    <x-slot name="title">
        {{ $post->title }}
    </x-slot>

    <x-slot name="scripts">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.7.1/tinymce.min.js" integrity="sha512-RnlQJaTEHoOCt5dUTV0Oi0vOBMI9PjCU7m+VHoJ4xmhuUNcwnB5Iox1es+skLril1C3gHTLbeRepHs1RpSCLoQ==" crossorigin="anonymous"></script>
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold ">{{ $post->title }}</h1>
        </div>
    </div>

    <div class="flex pt-4 flex-col xl:flex-row">
        <div class="flex-grow"></div>
        <x-card>
                {!! $post->content !!}
        </x-card>
        <x-card class="w-100 xl:w-96 xl:pl-0">
            <div class="w-96">
                <a href="#" class="flex flex-row">
                    <div class="w-10">
                    @if(!$post->creator()->avatar)
                        <svg class="h-10 w-10 p-1 fill-current text-gray-400 rounded-full bg-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    @else
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ $post->creator()->avatar }}"></img>
                    @endif
                    </div>

                    <div class="mx-2 my-auto h-6 flex flex-col justify-center items-center">
                        <span class="text-md text-black font-semibold overflow-hidden hover:text-truegray-900 transition">{{ $post->creator()->name }}</span>
                    </div>
                </a>
                <p class="text-truegray-500 mt-2 text-sm" title="{{ $post->created_at }}">Written {{ $post->created_at->diffForHumans(null, false, true) }}</p>
                @if($post->created_at != $post->updated_at)
                    <p class="text-truegray-500 text-sm" title="{{ $post->updated_at }}">Updated {{ $post->updated_at->diffForHumans(null, false, true) }}</p>
                @endif
            </div>
        </x-card>
        <div class="flex-grow"></div>
    </div>

    <script>
        var editor_config = {
            path_absolute: "{{URL::to('/')}}",
            selector: "textarea",
            plugins: [
                "autolink lists link image charmap preview hr anchor searchreplace", 
                "wordcount visualblocks code fullscreen insertdatetime media table",
                "contextmenu directionality emoticons paste textcolor colorpicker textpattern"],
            toolbar: "undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | forecolor backcolor | bulllist unlist | outdent indent | link | preview fullscreen",
            branding: false
        }

        tinymce.init(editor_config);
    </script>
</x-app-layout>
