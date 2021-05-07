<form method="POST" action="contact" {{$attributes->merge(['class' => 'text-center bg-gray-50 rounded-xl shadow sm:w-min w-full mx-auto p-3'])}}>
    @CSRF
    <div class="flex flex-col mx-auto w-100 sm:w-96">
        @if (session('success'))
        <p class="text-green-700 mb-2 text-sm bg-gray-200 rounded shadow-md font-semibold py-1">{{ session('success') }}
        </p>
        @endif
        @if (session('failure'))
        <p class="text-red-700 mb-2 text-sm bg-gray-200 rounded shadow-md font-semibold py-1">{{ session('failure') }}
        </p>
        @endif
        <div class="flex flex-col sm:flex-row">
            <div class="flex flex-col w-full mr-0 sm:mr-1 mb-1">
                <x-label for="name" class="font-bold">Name</x-label>
                <x-input id="name" name="name" class="{{ $errors->has('name') ? 'border-red-400' : '' }} px-1"
                    value="{{ old('name') }}"></x-input>
                @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col w-full ml-0 sm:ml-1 mb-1">
                <x-label for="email" class="font-bold">Email</x-label>
                <x-input id="email" name="email" class="{{ $errors->has('email') ? 'border-red-400' : '' }} px-1"
                    value="{{ old('email') }}"></x-input>
                @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-col w-full mb-1">
            <x-label for="subject" class="font-bold">Subject</x-label>
            <x-input id="subject" name="subject" class="{{ $errors->has('subject') ? 'border-red-400' : '' }} px-3"
                value="{{ old('subject') }}"></x-input>
            @error('subject')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col w-full">
            <x-label for="message" class="font-bold">Message</x-label>
            <textarea id="message" name="message" rows="5"
                class="rounded-md shadow-sm border border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 {{ $errors->has('message') ? 'border-red-400' : '' }}">{{ old('message') }}</textarea>
            @error('message')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <x-button class="mt-4">Submit</x-button>
</form>
