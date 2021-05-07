<x-app-layout>
    <x-slot name="title">
        {{ __('429') }}
    </x-slot>

    <div class="w-full bg-gray-100 flex flex-col md:h-screen mt-32 md:mt-0">
        <div class="flex-grow"></div>
        <div class="flex flex-col items-center">
            <h1 class="text-3xl text-gray-700">Whoops!</h1>
            <p class="text-lg text-gray-600">You're doing that too often (slow down) 😥</p>
            <section class="text-9xl pt-20 pb-16 font-extrabold text-gray-900">
                <span>4</span>
                <span class="px-3">2</span>
                <span>9</span>
            </section>
            <div class="text-gray-900">
                <a href="{{ url()->previous() }}" class="bg-gray-300 p-2 rounded-md shadow-md hover:bg-gray-400 transition opacity-75 hover:opacity-90">Go Back</a>
            </div>
        </div>
        <div class="flex-grow"></div>
    </div>
</x-app-layout>
