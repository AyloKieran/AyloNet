<x-guest-layout>
    <x-slot name="title">
        Home
    </x-slot>

    <x-slot name="styles">
    .wave {
        animation-name: wave-animation;
        animation-duration: 1s;
        transform-origin: 70% 70%;
        display: inline-block;
    }

    @keyframes wave-animation {
        0% { transform: rotate(0.0deg) }
        20% { transform: rotate(14.0deg) scale(1.18) }
        40% { transform: rotate(-8.0deg) scale(1) }
        60% { transform: rotate(14.0deg) }
        80% { transform: rotate(0.0deg) }
    }
    </x-slot>

    <div class="w-full flex flex-col md:h-screen mt-32 md:mt-0">
        <div class="flex-grow"></div>
        <div class="flex flex-col items-center md:mb-32">
            <section class="text-6xl lg:text-7xl pt-20 font-extrabold text-gray-900 flex flex-col">
                <span class="wave">👋</span>
            </section>
            <span class="text-4xl lg:text-5xl mx-auto mt-5 mb-2 font-bold">Howdy, I'm <span class="underline bg-clip-text text-transparent bg-gradient-to-r from-purple-500 to-red-500">Kieran.</span></span>
            <span class="text-xl lg:text-2xl mb-5 font-semibold text-gray-700">I make web stuff.</span>
            <div class="flex flex-gap-2">
                <a href="/portfolio" class="text-md lg:text-lg font-semibold p-1 px-3 rounded-3xl text-gray-500 hover:shadow-xl hover:text-white hover:bg-gray-600 transition">Portfolio</a>
                <a href="/github" class="text-md lg:text-lg font-semibold p-1 px-3 rounded-3xl text-gray-500 hover:shadow-xl hover:text-white hover:bg-gray-600 transition">Github</a>
                <a href="/contact" class="text-md lg:text-lg font-semibold p-1 px-3 rounded-3xl text-gray-500 hover:shadow-xl hover:text-white hover:bg-gray-600 transition">Contact</a>
            </div>
        </div>
        <div class="flex-grow"></div>
    </div>
</x-app-layout>
