<div class="w-full flex flex-col h-screen text-white bg-gray-900 text-center">
    @if ($this->chosen == "")
    <h1 class="text-3xl font-semibold mt-6 md:mt-12 mb-6">Decision Maker</h1>
        <ul class="list text-black flex flex-col">
            @foreach ($this->options as $key => $item)
            <li class="mx-auto px-2 pb-1 w-100 md:w-96">
                <div class="flex mx-auto">
                    <input class="rounded-l-xl w-100" wire:model='options.{{ $key }}'  type="text">
                    <div class="flex">
                        <button class="add bg-red-500 hover:bg-red-600 transition py-auto px-3 rounded-r-xl"
                            wire:click="removeInput({{ $key }})">✖</button>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="flex mx-auto mt-4 w-100 md:w-96">

            <x-button class="bg-blue-700 hover:bg-blue-800 flex-grow mx-1" wire:click="addInput">
                Add Item
            </x-button>

            <x-button class="bg-red-700 hover:bg-red-800 mx-1" wire:click="resetOptions">
                Reset
            </x-button>

            <x-button class="bg-green-700 hover:bg-green-800 mx-1" wire:click="submit" wire:loading.attr="disabled">
                <div class="flex text-center">
                    <div wire:loading.class.remove="hidden" class="hidden">
                        <i class="fas fa-spinner animate-spin mr-2"></i>
                    </div>
                    Submit
                </div>
            </x-button>
        </div>
    @else
    <div class="flex flex-col mx-auto mt-4 w-100 md:w-96">
        <h2 class="text-3xl font-semibold mt-6 md:mt-12 mb-24">{{ $this->chosen }}</h2>
        <h2 class="text-xl font-semibold">Chosen from:</h2>
        <h2 class="text-lg text-gray-400">
            @foreach($this->options as $option)
            {{ $option }}<br>
            @endforeach
        </h2>
        <x-button class="bg-red-700 hover:bg-red-800 mx-1 mt-4" wire:click="resetOptions">
            Reset
        </x-button>
    </div>
    @endif
</div>
