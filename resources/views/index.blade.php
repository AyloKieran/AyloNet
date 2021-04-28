<x-app-layout>
    <x-slot name="title">
        Home
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-truegray-500 border-b border-truegray-600">
                    @auth
                    You're logged in!
                    @else
                    You're not logged in
                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
