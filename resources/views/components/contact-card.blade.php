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
    <x-button class="mt-4" id="intermediate-button">Submit</x-button>

    <div class="modal fixed w-100 h-full top-0 left-0 md:pl-72 mt-12 md:mt-0 flex opacity-0 pointer-events-none transition duration-1000">
        <div class="modal-overlay absolute bg-black opacity-70 w-full h-full z-40"></div>

        <div class="modal-container absolute h-full w-full md:pr-72 flex flex-col z-50">
            <div class="flex-grow"></div>  
            <div class="w-full flex">
                <div class="flex-grow"></div>
                <div class="modal-content bg-gray-100 p-6 text-left rounded-xl shadow-xl max-w-lg">
                    <div class="flex flex-col justify-between items-center">
                        <div class="flex w-100">
                            <p class="text-2xl font-bold text-gray-800 pb-2">Hold Up!</p>
                            <div class="flex-grow"></div>
                            <div class="modal-close cursor-pointer z-50 text-gray-800 dark:text-white pt-1">
                                <svg class="fill-current" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="text-center">
                            <p>Due to spam on this form, I have to ask people to complete a test to prove they're human.</p>
                            <p class="text-sm">(I know that'll be super hard for you 😉)</p>
                        </div>
                        <div class="pt-2">
                            Captcha Content
                        </div>
                        <div>
                            <x-button class="mt-4">Submit</x-button>
                        </div>
                    </div>
                </div>
                <div class="flex-grow"></div>
            </div>
            <div class="flex-grow"></div>
        </div>
    </div>

</form>

<script>
    document.getElementById("intermediate-button").addEventListener('click', function(event) {
        toggleModal();
        event.preventDefault();
    });
    document.getElementsByClassName("modal-close")[0].addEventListener('click', function(event) {
        toggleModal();
    });

    function toggleModal(){
        const modal = document.querySelector('.modal');
        modal.classList.toggle('opacity-0');
        modal.classList.toggle('pointer-events-none');
    }

</script>