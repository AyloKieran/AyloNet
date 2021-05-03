<x-app-layout>
    <x-slot name="title">
        User
    </x-slot>

    <x-card class="pt-4">
        <h1 class="text-xl font-semibold">User Details</h1>
        <div class="mt-2 flex">
            <div class="flex bg-gray-100 rounded shadow p-3 pr-5 mx-auto">
                <div>
                    @if(!Auth::user()->avatar)
                    <svg class="h-24 w-24 p-1 fill-current text-gray-400 rounded-full bg-gray-600"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    @else
                    <img class="h-20 w-20 rounded-full shadow" src="{{ Auth::user()->avatar }}"></img>
                    @endif
                </div>
                <div class="ml-4 my-auto flex flex-col">
                    <span class="text-lg font-semibold">
                        {{ Auth::user()->name }} 

                        @can('admin')
                            <span class="text-xs text-gray-600">
                                (Admin)
                            </span>
                        @endcan
                    </span>
                    <span class="text-sm">
                        {{ Auth::user()->email }}
                        @if(Auth::user()->email_verified_at)
                            <span class="text-green-700 text-sm">(Verified)</span>
                        @else
                            <span class="text-red-700 text-sm">(Unverified)</span>
                        @endif
                    </span>
                    <span class="text-xs text-gray-600">
                        Joined: <span title="{{ Auth::user()->created_at }}">{{ Auth::user()->created_at->diffForHumans() }}</span> via {{ Auth::user()->provider }}
                    </span>
                </div>
            </div>
        </div>
    </x-card>

    <x-card class="pt-4">
        <h1 class="text-xl font-semibold">Update User Details</h1>
        content here.
    </x-card>

    <x-card class="pt-4">
        <h1 class="text-xl font-semibold">User Actions</h1>
        <div class="flex flex-col w-72 mt-4">
            <div class="flex">
                <span class="my-auto flex-grow font-bold">Delete Account</span>
                <form method="POST" action="{{ route('deleteUser') }}">
                    @CSRF
                    @METHOD('DELETE')
                    <x-button class="bg-red-500 border-red-600 hover:bg-red-600 hover:border-red-700" onclick="return confirm('You are deleting your account; this action is irreversable. \\n\\nThis will also remove any of your actions on the site.\\n\\nAre you sure you want to continue?')">Delete</x-button>
                </form>
            </div>
        </div>
    </x-card>
</x-app-layout>
