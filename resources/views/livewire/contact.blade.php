<form class="text-center bg-gray-50 rounded-xl shadow md:w-11/12 w-100 mx-auto p-3" wire:submit.prevent="submit">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    @CSRF
    <div class="flex flex-col mx-auto w-100 sm:w-96 md:w-100 lg:w-1/2">
        @if (session('success'))
            <p class="text-green-800 text-sm bg-green-300 rounded shadow-md font-semibold py-1">{{ session('success') }}</p>
        @else
        @if (session('failure'))
            <p class="text-red-700 mb-2 text-sm bg-gray-200 rounded shadow-md font-semibold py-1">{{ session('failure') }}</p>
        @endif
        <div class="flex flex-col sm:flex-row">
            <div class="flex flex-col w-full mr-0 sm:mr-1 mb-1">
                <x-label for="name" class="font-bold">Name</x-label>
                <x-input id="name" name="name" wire:model="name" class="{{ $errors->has('name') ? 'border-red-400' : '' }} px-1 w-100"
                    value="{{ old('name') }}"></x-input>
                @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col w-full ml-0 sm:ml-1 mb-1">
                <x-label for="email" class="font-bold">Email</x-label>
                <x-input id="email" name="email" wire:model="email" class="{{ $errors->has('email') ? 'border-red-400' : '' }} px-1 w-100"
                    value="{{ old('email') }}"></x-input>
                @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-col w-full mb-1">
            <x-label for="subject" class="font-bold">Subject</x-label>
            <x-input id="subject" name="subject" wire:model="subject" class="{{ $errors->has('subject') ? 'border-red-400' : '' }} px-3"
                value="{{ old('subject') }}"></x-input>
            @error('subject')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col w-full">
            <x-label for="message" class="font-bold">Message</x-label>
            <textarea id="message" name="message" wire:model="message" rows="5"
                class="rounded-md shadow-sm border border-gray-300 focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50 {{ $errors->has('message') ? 'border-red-400' : '' }}">{{ old('message') }}</textarea>
            @error('message')
            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
    <x-button class="mt-4" wire:loading.attr="disabled">
        <div class="flex">
            <div wire:loading.class.remove="hidden" class="hidden">
                <i class="fas fa-spinner animate-spin mr-2"></i>
            </div>
            Submit
        </div>
    </x-button>
    @endif
</form>
