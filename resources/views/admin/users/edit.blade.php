<x-app-layout>
    <x-slot name="title">
        Edit User
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold ">Edit User</h1>
        </div>
    </div>

    <x-card class="pt-4">
        <h1 class="text-xl font-semibold text-center">User Details</h1>
        <div class="mt-2 flex">
            <x-user-card :user="$user" class="mx-auto"></x-user-card>
        </div>
    </x-card>

    <x-card class="pt-4">
        <h1 class="text-xl font-semibold text-center">Update Roles</h1>
        <div class="flex flex-1 flex-grow flex-col bg-gray-100 rounded-lg mx-2 p-2 mb-2 lg:mb-0 max-w-sm mx-auto">
            <h2 class="font-semibold mx-auto mb-2">Role</h2>
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update.role', [$user]) }}">
                @CSRF
                @METHOD('PATCH')

                <div class="flex flex-col w-100">
                    <x-label for="role" class="mr-2 text-left font-bold align-middle">Role name:</x-label>
                    <x-input type="text" name="role" id="role" value="{{ $user->user_role }}" class="w-100" />

                    @error('role')
                        <p class="text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex mt-2"> 
                    <div class="flex-grow"></div>
                        <x-button>Submit</x-button>
                </div>
            </form>
        </div>
    </x-card>

    <x-card class="pt-4">
        <h1 class="text-xl font-semibold text-center mb-2">Update Details</h1>
        @if($user->provider == "google")
            <h2 class="text-sm font-semibold text-center mb-2 mx-2 rounded-lg text-red-600 bg-yellow-100">User is using a Google Account. Unable to edit information here.</h2>
        @endif
        <div class="flex flex-col lg:flex-row text-center">
            <div class="flex flex-1 flex-grow flex-col bg-gray-100 rounded-lg mx-2 p-2 mb-2 lg:mb-0">
                <h2 class="font-semibold mx-auto mb-2">Avatar</h2>
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update.avatar', [$user]) }}">
                    @CSRF
                    @METHOD('PATCH')
                    @if($user->provider == "google")
                        <x-input id="avatar" name="avatar" type="file" class="w-100" disabled></x-input>
                    @else
                        <x-input id="avatar" name="avatar" type="file" class="w-100"></x-input>

                        @error('avatar')
                            <p class="text-red-400">{{ $message }}</p>
                        @enderror
                    @endif

                    <div class="flex mt-2"> 
                        <div class="flex-grow"></div>
                        @if($user->provider == "google")
                            <x-button disabled>Upload</x-button>
                        @else
                            <x-button>Upload</x-button>
                        @endif
                    </div>
                </form>
            </div>
            <div class="flex flex-1 flex-grow flex-col bg-gray-100 rounded-lg mx-2 p-2 mb-2 lg:mb-0">
                <h2 class="font-semibold mx-auto mb-2">Details</h2>
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update.details', [$user]) }}">
                    @CSRF
                    @METHOD('PATCH')
                    @if($user->provider == "google")
                        <div class="flex flex-col w-100">
                            <x-label for="name" class="mr-2 text-left font-bold align-middle">Name:</x-label>
                            <x-input type="text" name="name" id="name" class="w-100 bg-gray-100" disabled></x-input>
                        </div>
                        <div class="flex flex-col w-100">
                            <x-label for="email" class="mr-2 mt-1 text-left font-bold align-middle">Email:</x-label>
                            <x-input type="text" name="email" id="email" class="w-100 bg-gray-100" disabled></x-input>
                        </div>
                    @else
                        <div class="flex flex-col w-100">
                            <x-label for="name" class="mr-2 text-left font-bold align-middle">Name:</x-label>
                            <x-input type="text" name="name" id="name" value="{{ $user->name }}"
                                class="w-100" />

                            @error('name')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col w-100">
                            <x-label for="email" class="mr-2 mt-1 text-left font-bold align-middle">Email:</x-label>
                            <x-input type="text" name="email" id="email" value="{{ $user->email }}"
                                class="w-100" />

                            @error('email')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif

                    <div class="flex mt-2"> 
                        <div class="flex-grow"></div>
                        @if($user->provider == "google")
                            <x-button disabled>Submit</x-button>
                        @else
                            <x-button>Submit</x-button>
                        @endif
                    </div>
                </form>
            </div>
            <div class="flex flex-1 flex-grow flex-col bg-gray-100 rounded-lg mx-2 p-2 mb-2 lg:mb-0">
                <h2 class="font-semibold mx-auto mb-2">Password</h2>
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.users.update.password', [$user]) }}">
                    @CSRF
                    @METHOD('PATCH')
                    @if($user->provider == "google")
                        <div class="flex flex-col w-100">
                            <x-label for="newpassword" class="mr-2 text-left font-bold align-middle">New Password:</x-label>
                            <x-input type="password" name="newpassword" id="newpassword" class="w-100 bg-gray-100" disabled/>
                        </div>
                        <div class="flex flex-col w-100">
                            <x-label for="confirmpassword" class="mr-2 text-left font-bold align-middle">Confirm Password:</x-label>
                            <x-input type="password" name="confirmpassword" id="confirmpassword" class="w-100 bg-gray-100" disabled/>
                        </div>
                    @else
                        <div class="flex flex-col w-100">
                            <x-label for="password" class="mr-2 text-left font-bold align-middle">New Password:</x-label>
                            <x-input type="password" name="password" id="password" class="w-100" />

                            @error('password')
                                <p class="text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex flex-col w-100">
                            <x-label for="password_confirmation" class="mr-2 text-left font-bold align-middle">Confirm Password:</x-label>
                            <x-input type="password" name="password_confirmation" id="password_confirmation" class="w-100" />
                        </div>
                    @endif

                    <div class="flex mt-2"> 
                        <div class="flex-grow"></div>
                        @if($user->provider == "google")
                            <x-button disabled>Submit</x-button>
                        @else
                            <x-button>Submit</x-button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </x-card>

    <x-card class="pt-4 pb-4">
        <h1 class="text-xl font-semibold text-center">Admin Actions</h1>
        <div class="flex flex-col sm:w-72 w-full mx-auto mt-4">
            @if($user->provider == "aylo.net")
                <div class="flex mb-1">
                    <span class="my-auto flex-grow font-bold">Send Email Verification</span>
                    <form method="POST" action="{{ route('admin.users.resendEmailVerification', [$user]) }}">
                        @CSRF
                        <x-button class="bg-green-500 border-green-600 hover:bg-green-600 hover:border-green-700 focus:ring-green-200 w-24">Send</x-button>
                    </form>
                </div>
            @endif
            <div class="flex">
                <span class="my-auto flex-grow font-bold">Delete Account</span>
                <form method="POST" action="{{ route('admin.users.delete', [$user]) }}">
                    @CSRF
                    @METHOD('DELETE')
                    <x-button class="bg-red-500 border-red-600 hover:bg-red-600 hover:border-red-700 focus:ring-red-200 w-24" onclick="return confirm('Are you sure you want to continue?')">Delete</x-button>
                </form>
            </div>
        </div>
    </x-card>
</x-app-layout>
