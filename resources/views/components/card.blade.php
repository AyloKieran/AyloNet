<div {{ $attributes->merge(['class' => 'max-w-5xl mx-auto sm:px-6 lg:px-8 pt-2']) }}>
    <div class="overflow-hidden shadow-md sm:rounded-lg">
        <div class="p-6 bg-white text-black">
            {{ $slot }}
        </div>
    </div>
</div>
