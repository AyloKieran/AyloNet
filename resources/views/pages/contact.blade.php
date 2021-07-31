<x-app-layout>
    <x-slot name="title">
        Contact
    </x-slot>

    <x-slot name="styles">
        @livewireStyles
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold ">Contact</h1>
        </div>
    </div>

    <x-card class="pt-4">
        <div class="mt-2 flex flex-col">
            <p class="w-100 text-center">Howdy partner 🤠 I'd love to hear from you!</p>
            <p class="w-100 text-center">Please fill out the form below and I'll get back to you ASAP.</p>
            <div class="mt-5">
                <h1 class="text-lg font-semibold text-center">Contact Me</h1>
                <livewire:contact />
            </div>
        </div>
    </x-card>

    @livewireScripts
</x-app-layout>
