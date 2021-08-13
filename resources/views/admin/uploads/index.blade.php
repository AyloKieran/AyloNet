<x-app-layout>
    <x-slot name="title">
        Admin Uploads
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto flex">
            <h1 class="text-3xl font-semibold ">Uploads</h1>
        </div>
    </div>

    <x-card>
        <div class="flex">
            <div class="flex-grow"></div>
            <div class="flex">
                <div class="mr-2">
                    <form class="bg-white w-full rounded-lg shadow text-sm">
                        <input class="border-none focus:outline-none rounded-lg" type="search" name="search" placeholder="Search"
                            value="{{ request()->get('search') }}">
                        <button type="submit" class="px-3">
                            <i class="fas fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </div>

                <a href="{{ route('admin.uploads.create') }}" class="my-auto">
                    <x-button>
                        Create
                    </x-button>
                </a>
            </div>
        </div>
        <div class="text-truegray-600">
            <div class="w-100 mt-4 flex flex-wrap justify-center">
                @forelse ($uploads as $upload)
                    <x-upload-card :upload="$upload" />
                @empty
                    There are no Uploads to show.
                @endforelse
            </div>

            <div class="pt-4">
                {{ $uploads->links() }}
            </div>
        </div>
    </x-card>

    <div class="fixed flex flex-col bottom-0 right-0 w-5/6 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 h-auto bg-gray-700 opacity-90 hover:opacity-100 text-white m-6 px-6 py-4 rounded-xl shadow-lg transition">
        <div class="flex">
            <p class="flex-grow text-lg font-bold">Clipboard</p>
            <a class="pl-4 font-bold text-gray-500 hover:text-white transition">X</a>
        </div>
        <p class="mb-1 -mt-1 text-gray-200">Copied to clipboard</p>
        <div class="bg-white rounded-xl opacity-25" style="height: 2px; width: 100%"></div>
    </div>

    <script>
        function copyToClipboard(url) {
            formattedUrl = '{{URL::to("/")}}' + '/' + url;
            console.log(formattedUrl);
            navigator.clipboard.writeText(formattedUrl).then(function() {
                console.log("success")
            });
        }
    </script>
</x-app-layout>
