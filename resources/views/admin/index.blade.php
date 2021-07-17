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
                    <x-admin-dashboard.card title="Total Posts" content="{{ $posts->count() }}"
                        icon="fas fa-newspaper" colour="bg-blue-900" route="{{ route('admin.posts') }}" />
                    <x-admin-dashboard.card title="Latest Post"
                        content="'{{ $posts->first()->title }}' - {{ $posts->first()->updated_at->diffForHumans(null, false, true) }} ({{ $posts->first()->creator()->name }})"
                        icon="fas fa-paper-plane" colour="bg-blue-700"
                        route="{{ route('admin.posts.edit', $posts->first()) }}" />
                </x-admin-dashboard.column>
            @endif
        </div>

    </div>
</x-app-layout>
