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
        0% { transform: rotate( 0.0deg) }
        10% { transform: rotate(14.0deg) }  /* The following five values can be played with to make the waving more or less extreme */
        20% { transform: rotate(-8.0deg) }
        30% { transform: rotate(14.0deg) }
        40% { transform: rotate(-4.0deg) }
        50% { transform: rotate(10.0deg) }
        60% { transform: rotate( 0.0deg) }  /* Reset for the last half to pause */
        100% { transform: rotate( 0.0deg) }
    }
    </x-slot>

    <div class="w-full h-screen bg-gray-100 flex flex-col">
        <div class="flex-grow"></div>
        <div class="flex flex-col items-center">
            <section class="text-9xl pt-20 pb-16 font-extrabold text-gray-900 flex flex-col">
                <span class="wave">👋</span>
                <span class="text-5xl mx-auto mt-5 font-semibold">Howdy</span>
            </section>
        </div>
        <div class="flex-grow"></div>
    </div>
</x-app-layout>
