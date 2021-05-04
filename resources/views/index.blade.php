<x-app-layout>
    <x-slot name="title">
        Home
    </x-slot>

    <x-slot name="styles">
    .wave {
        animation-name: wave-animation;
        animation-duration: 2.5s;
        transform-origin: 70% 70%;
        display: inline-block;
    }

    @keyframes wave-animation {
        0% { transform: rotate(0.0deg) scale(1.2) }
        10% { transform: rotate(14.0deg) scale(1) }
        20% { transform: rotate(-8.0deg) }
        30% { transform: rotate(14.0deg) }
        40% { transform: rotate(-4.0deg) }
        50% { transform: rotate(10.0deg) }
        60% { transform: rotate(0.0deg) }
        100% { transform: rotate(0.0deg) }
    }
    </x-slot>

    <div class="w-full h-screen bg-gray-100 flex flex-col">
        <div class="flex-grow"></div>
        <div class="flex flex-col items-center mb-32">
            <section class="text-6xl lg:text-7xl pt-20 font-extrabold text-gray-900 flex flex-col">
                <span class="wave">👋</span>
            </section>
            <span class="text-4xl lg:text-5xl mx-auto mt-5 mb-2 font-bold">Howdy, I'm <span class="underline bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-red-500">Kieran</span></span>
            <span class="text-2xl lg:text-3xl mb-5 font-semibold text-gray-700">I make web stuff.</span>
            <div class="flex flex-gap-2">
                <a href="/portfolio" class="text-md lg:text-lg font-semibold p-1 px-3 rounded-2xl text-gray-700 hover:shadow-xl hover:text-white hover:bg-gray-700 transition">Portfolio</a>
                <a href="/github" class="text-md lg:text-lg font-semibold p-1 px-3 rounded-2xl text-gray-700 hover:shadow-xl hover:text-white hover:bg-gray-700 transition">Github</a>
                <a href="/contact" class="text-md lg:text-lg font-semibold p-1 px-3 rounded-2xl text-gray-700 hover:shadow-xl hover:text-white hover:bg-gray-700 transition">Contact</a>
            </div>
        </div>
        <div class="flex-grow"></div>
    </div>
</x-app-layout>
