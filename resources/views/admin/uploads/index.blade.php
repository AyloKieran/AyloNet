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

    </div>
</x-app-layout>
