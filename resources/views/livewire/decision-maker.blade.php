<div class="flex-grow lg:h-screen flex flex-col lg:flex-row text-white bg-gray-900 text-center px-4 md:px-0">
    <div class="flex flex-col flex-grow">
        @if ($this->chosen == "")
        <h1 class="text-3xl font-semibold mt-6 md:mt-12 mb-6">
            @if ($this->listName != "")
            {{ $this->listName }}
            @else
            Decision Maker
            @endif
        </h1>
        <ul class="list text-black flex flex-col">
            @foreach ($this->options as $key => $item)
            <li class="mx-auto px-2 pb-1 w-100 md:w-96">
                <div class="flex mx-auto">
                    <input class="rounded-l-xl w-100" wire:model='options.{{ $key }}' type="text">
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

            <x-button class="bg-red-700 hover:bg-red-800 mx-1" wire:click="newList">
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
            <x-button class="bg-red-700 hover:bg-red-800 mx-1 mt-4" wire:click="newList">
                Reset
            </x-button>
        </div>
        @endif
    </div>
    @if (auth()->user())
    <div class="flex flex-col lg:bg-gray-800 mx-auto w-100 md:w-2/3 lg:w-2/5 xl:w-1/4 mt-20 lg:mt-0">
        <h2 class="text-xl font-semibold py-4 bg-gray-900">Saved Lists</h2>
        <div class="lg:overflow-y-scroll bg-gray-800 rounded-xl lg:rounded-none flex-grow">
            @forelse($this->lists as $list)
            <div class="flex bg-gray-700 hover:bg-gray-600 transition rounded-xl lg:rounded-none {{ $loop->last ? '' : 'mb-2' }}">
                <a wire:click="selectList('{{ $list->id }}')" class="flex-grow">
                    <h3 class="font-semibold text-lg">{{ $list->name != "" ? $list->name : "No Name" }}</h3>
                    <p class="text-gray-300">
                        @foreach(unserialize($list->list) as $listItem)
                        @if ($loop->last)
                        {{ $listItem }}
                        @else
                        {{ $listItem }},
                        @endif
                        @endforeach
                    </p>
                </a>
                <button wire:click="deleteList('{{$list->id}}')" class="rounded-xl bg-red-800 hover:bg-red-700 transition px-4 lg:rounded-r-none">🗑</button>
            </div>
            @empty
            <p class="my-2">No saved lists.</p>
            @endforelse
        </div>
        <div class="flex-grow"></div>
        <div class="flex flex-col px-5 py-4 bg-gray-900">
            <label for="listName" class="text-left mx-2 text-sm font-semibold">List Name:</label>
            <input class="rounded-xl text-black mx-1" wire:model='listName' type="text" id="listName">
            <div class="flex flex-grow">
                <x-button class="bg-blue-700 hover:bg-blue-800 mx-1 mt-2 text-xs" wire:click="newList">
                    New List
                </x-button>
                <div class="flex-grow"></div>
                @if (!$this->list || $this->listUser == auth()->user()->id)
                <x-button class="bg-green-700 hover:bg-green-800 mx-1 mt-2" wire:click="saveList">
                    @if($this->list != "")
                    Update
                    @else
                    Save
                    @endif
                </x-button>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>
