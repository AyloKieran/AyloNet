<x-app-layout>
    <x-slot name="title">
        Create Redirection
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto flex">
            <a href="{{ route('admin.redirections') }}"><i class="fas fa-long-arrow-alt-left fa-lg mr-4"></i></a>
            <h1 class="text-3xl font-semibold ">Create Redirection</h1>
        </div>
    </div>

    <div class="max-w-xl mx-auto sm:px-6 lg:px-8 pt-2">
        <div class="overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 bg-white text-black">
                <form method="post" enctype="multipart/form-data" class="flex flex-col gap-4">
                    @csrf
                    <div class="grid grid-cols-2 items-center">
                        <label for="route">Route:</label>
                        <input type="text" name="route" id="route" value="{{ old('route') }}"
                            class="rounded-lg shadow border-gray-300 dark:bg-truegray-600 dark:border-transparent">

                        @error('route')
                            <p class="text-red-400 col-span-3">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="grid grid-cols-2 items-center">
                        <label for="url">Url:</label>
                        <input type="url" name="url" id="url" value="{{ old('url') }}"
                            class="rounded-lg shadow border-gray-300 dark:bg-truegray-600 dark:border-transparent">

                        @error('url')
                            <p class="text-red-400 col-span-3">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" name="submit">
                        {{ __('Create') }}
                    </button>

                </form>
            </div>
        </div>
    </div>

    </div>
</x-app-layout>
