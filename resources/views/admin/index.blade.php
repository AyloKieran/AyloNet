<x-app-layout>
    <x-slot name="title">
        Admin
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold ">Admin Area</h1>
        </div>
    </div>

    <div class="max-w-6xl w-100 mx-auto flex items-center">
        <div class="w-100 flex flex-col flex-wrap xl:flex-row">
            <x-admin-dashboard.column>
                <x-admin-dashboard.column-title>Users</x-admin-dashboard.column-title>
                <x-admin-dashboard.card title="Total Users" content="{{ $users->count() }}" icon="fas fa-user-friends"
                    colour="bg-red-800" route="{{ route('admin.users') }}" />
                <x-admin-dashboard.card title="Last Sign Up"
                    content="'{{ $users->first()->name }}' - {{ $users->first()->created_at->diffForHumans(null, false, true) }}"
                    icon="fas fa-user-plus" colour="bg-red-700"
                    route="{{ route('admin.users.edit', $users->first() ) }}" />
            </x-admin-dashboard.column>

            @if ($redirections->count() > 0)
            <x-admin-dashboard.column>
                <x-admin-dashboard.column-title>Redirections</x-admin-dashboard.column-title>
                <x-admin-dashboard.card title="Total Redirections" content="{{ $redirections->count() }}"
                    icon="fas fa-directions" colour="bg-green-900" route="{{ route('admin.redirections') }}" />
                <x-admin-dashboard.card title="Total Redirects" content="{{ $redirectionStatistics->sum('usage') }}"
                    icon="fas fa-redo-alt" colour="bg-green-800" route="{{ route('admin.redirections') }}" />
                <x-admin-dashboard.card title="Last Redirect"
                    content="'{{ $redirectionStatistics->first()->redirection()->get()->first()->route }}' - {{ $redirectionStatistics->first()->updated_at->diffForHumans(null, false, true) }}"
                    icon="fas fa-compass" colour="bg-green-700"
                    route="{{ route('admin.redirections.edit', $redirectionStatistics->first()->redirection()->get()->first()) }}" />
            </x-admin-dashboard.column>
            @endif

            @if ($posts->count() > 0)
            <x-admin-dashboard.column>
                <x-admin-dashboard.column-title>Posts</x-admin-dashboard.column-title>
                <x-admin-dashboard.card title="Total Posts" content="{{ $posts->count() }}" icon="fas fa-newspaper"
                    colour="bg-blue-900" route="{{ route('admin.posts') }}" />
                <x-admin-dashboard.card title="Latest Post"
                    content="'{{ $posts->first()->title }}' - {{ $posts->first()->updated_at->diffForHumans(null, false, true) }} ({{ $posts->first()->creator()->name }})"
                    icon="fas fa-paper-plane" colour="bg-blue-700"
                    route="{{ route('admin.posts.edit', $posts->first()) }}" />
            </x-admin-dashboard.column>
            @endif

            @if ($uploads->count() > 0)
            <x-admin-dashboard.column>
                <x-admin-dashboard.column-title>Uploads</x-admin-dashboard.column-title>
                <x-admin-dashboard.card title="Total Uploads" content="{{ $uploads->count() }}" icon="fas fa-file-upload"
                    colour="bg-pink-900" route="{{ route('admin.uploads') }}" />
                <x-admin-dashboard.card title="Total Uploads Size" content="{{ $uploadsSize }}GB" icon="far fa-hdd" 
                    colour="bg-pink-800" route="{{ route('admin.uploads') }}" />
                <x-admin-dashboard.card title="Latest Upload"
                    content="'{{ $uploads->first()->name }}' - {{ $uploads->first()->created_at->diffForHumans(null, false, true) }} ({{ $uploads->first()->creator()->name }})"
                    icon="fas fa-file-import" colour="bg-pink-700"
                    route="{{ route('admin.uploads.edit', $uploads->first()) }}" />
            </x-admin-dashboard.column>
            @endif

            @if ($lists->count() > 0)
            <x-admin-dashboard.column>
                <x-admin-dashboard.column-title>Lists</x-admin-dashboard.column-title>
                <x-admin-dashboard.card title="Total Lists" content="{{ $lists->count() }}" icon="fas fa-stream"
                    colour="bg-purple-900" route="/decisionmaker" />
                <x-admin-dashboard.card title="Latest List"
                    content="'{{ $lists->first()->name }}' - {{ $lists->first()->created_at->diffForHumans(null, false, true) }} ({{ $lists->first()->creator()->name }})"
                    icon="fas fa-clipboard-list" colour="bg-purple-800"
                    route="/decisionmaker?list={{ $lists->first()->id }}" />
            </x-admin-dashboard.column>
            @endif

            <x-admin-dashboard.column>
                <x-admin-dashboard.column-title>Deployment</x-admin-dashboard.column-title>

                <a class="flex bg-white rounded-md shadow-md p-3 mb-2 w-100 hover:bg-gray-50 group transition"
                    href="/github">
                    <div
                        class="bg-yellow-700 bg-opacity-75 group-hover:bg-opacity-90 rounded-full w-12 h-12 mr-2 flex text-white transition">
                        <div class="flex-grow"></div>
                        <i class="fas fa-code-branch fa-lg w-12 text-center align-middle my-auto"></i>
                        <div class="flex-grow"></div>
                    </div>
                    <div class="flex flex-grow">
                        <div class="flex flex-col flex-grow">
                            <h4 class="text-lg font-semibold text-gray-700">Version</h4>
                            <div class="text-gray-500 text-sm" title="{{ $version }}">{{ $version }}</div>
                        </div>
                        <div id="updateArea"
                            class="bg-yellow-900 bg-opacity-50 group hover:bg-opacity-90 rounded-full w-8 h-8 ml-2 my-auto flex text-white transition animate-spin">
                            <div class="flex-grow"></div>
                            <form class="w-8 h-8 text-center align-middle my-auto" method="POST" action="{{ route('admin.update') }}">
                                @csrf
                                <button class="h-8">
                                    <i id="updateIcon" class="fas fa-spinner fa-sm w-8"></i>
                                </button>
                            </form>
                            <div class="flex-grow"></div>
                        </div>
                    </div>
                </a>

                @php
                if (env('APP_ENV') == 'prod') {
                $env = "Production";
                } else {
                $env = "Development";
                }

                @endphp
                <x-admin-dashboard.card title="Environment" content="{{ $env }}" icon="fas fa-file-code"
                    colour="bg-yellow-600" route="/github" />


            </x-admin-dashboard.column>
        </div>

    </div>

    <script>
        (function () {
            fetch("/api/version")
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    var update = data["updateAvailable"];

                    var updateArea = document.getElementById("updateArea"); 
                    var updateIcon = document.getElementById("updateIcon"); 

                    if(update) {
                        updateArea.classList.toggle("animate-spin");
                        updateArea.classList.toggle("bg-yellow-900");
                        updateArea.classList.toggle("bg-green-700");
                        updateIcon.classList.toggle("fa-spinner");
                        updateIcon.classList.toggle("fa-cloud-upload-alt");
                    } else {
                        updateArea.classList.toggle("hidden");
                    }
                })
                .catch(function () {
                    updateArea.classList.toggle("animate-spin");
                    updateArea.classList.toggle("bg-yellow-900");
                    updateArea.classList.toggle("bg-red-900");
                    updateIcon.classList.toggle("fa-spinner");
                    updateIcon.classList.toggle("fa-exclamation");
                });
        })();
    </script>
</x-app-layout>
