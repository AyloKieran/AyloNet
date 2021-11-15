@props(['upload'])
<div class="w-2/3 sm:w-52 flex flex-col bg-gray-200 rounded-md shadow-md p-2 m-1">
    <div class="flex flex-col w-100 rounded-md shadow-xs">
        @component('components.uploads.media', ['upload' => $upload])
        @endcomponent
    </div>
    <div class="flex flex-col">
        <h3 class="text-center font-semibold m-2">{{ $upload->name }}</h3>
        <div class="flex">
            <div>
                <img src="/{{ $upload->creator()->avatar }}"
                    class="h-7 w-7 rounded-full border-solid border-2 border-gray-700"
                    title="{{ $upload->creator()->name }}" />
            </div>
            <div class="text-xs flex flex-col justify-center items-center ml-1">
                <span
                    title="{{ $upload->created_at }}">{{ $upload->created_at->diffForHumans(null, false, true) }}</span>
            </div>
            <div class="flex-grow"></div>
            <a href="{{ route('admin.uploads.edit', [$upload]) }}">
                <button class="bg-blue-400 w-7 h-7 rounded shadow text-white mr-1">
                    <i class="fas fa-pencil-alt"></i>
                </button>
            </a>

            <a href="{{ route('admin.uploads.edit', [$upload]) }}">
                <button class="bg-truegray-700 w-7 h-7 rounded shadow text-white" onclick="event.preventDefault(); copyToClipboard('{{ $upload->uploadUrl }}')">
                    <i class="far fa-clipboard"></i>
                </button>
            </a>
        </div>
    </div>
</div>