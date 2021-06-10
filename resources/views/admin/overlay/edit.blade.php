<x-app-layout>
    <x-slot name="title">
        Overlay Control
    </x-slot>

    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 pt-8 pb-4 flex items-center">
        <div class="text-black mx-auto">
            <h1 class="text-3xl font-semibold ">Overlay Control</h1>
        </div>
    </div>

    <div class="max-w-xl mx-auto sm:px-6 lg:px-8 pt-2">
        <div class="overflow-hidden shadow-md sm:rounded-lg">
            <div class="p-6 bg-white text-black">
                <form method="post" enctype="multipart/form-data" class="flex flex-col gap-4 w-100">
                    @csrf
                    @method('PATCH')

                    <div class="flex flex-col mb-1">
                        <x-label for="scene" class="font-bold">Scene</x-label>
                        <div class="flex">
                            <div class="flex mr-4"> 
                                <input type="radio" id="Welcome" name="scene" value="Welcome">
                                <x-label for="Welcome" class="ml-1">Welcome</x-label>
                            </div>
                            <div class="flex mr-4"> 
                                <input type="radio" id="Main" name="scene" value="Main">
                                <x-label for="Main" class="ml-1">Main</x-label>
                            </div>
                            <div class="flex mr-4"> 
                                <input type="radio" id="Chatting" name="scene" value="Chatting">
                                <x-label for="Chatting" class="ml-1">Chatting</x-label>
                            </div>
                            <div class="flex mr-4"> 
                                <input type="radio" id="BRB" name="scene" value="BRB">
                                <x-label for="BRB" class="ml-1">BRB</x-label>
                            </div>
                            <div class="flex mr-4"> 
                                <input type="radio" id="End" name="scene" value="End">
                                <x-label for="End" class="ml-1">End</x-label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="flex flex-col mb-1">
                        <x-label for="scene" class="font-bold">Components</x-label>
                        <div class="flex">
                            <div class="flex mr-4"> 
                                <input type="hidden" name="nowplaying" value="false">
                                <input type="checkbox" id="NowPlaying" name="nowplaying" value="true">
                                <x-label for="NowPlaying" class="ml-1">Now Playing</x-label>
                            </div>
                            <div class="flex mr-4"> 
                                <input type="hidden" name="calendar" value="false">
                                <input type="checkbox" id="Calendar" name="calendar" value="true">
                                <x-label for="Calendar" class="ml-1">Calendar</x-label>
                            </div>
                            <div class="flex mr-4"> 
                                <input type="hidden" name="chat" value="false">
                                <input type="checkbox" id="Chat" name="chat" value="true">
                                <x-label for="Chat" class="ml-1">Chat</x-label>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col mb-1">
                        <x-label for="scene" class="font-bold">Elements</x-label>
                        <div class="flex flex-col">
                            <div class="flex mb-1"> 
                                <x-label for="WelcomeTitle" class="mr-1 w-32">Welcome Title</x-label>
                                <x-input id="WelcomeTitle" name="WelcomeTitle"></x-input>
                            </div>
                            <div class="flex mb-1"> 
                                <x-label for="WelcomeSubtitle" class="mr-1 w-32">Welcome Subtitle</x-label>
                                <x-input id="WelcomeSubtitle" name="WelcomeSubtitle"></x-input>
                            </div>
                            <div class="flex mb-1"> 
                                <x-label for="BRBSubtitle" class="mr-1 w-32">BRB Subtitle</x-label>
                                <x-input id="BRBSubtitle" name="BRBSubtitle"></x-input>
                            </div>
                            <div class="flex mb-1"> 
                                <x-label for="EndSubtitle" class="mr-1 w-32">End Subtitle</x-label>
                                <x-input id="EndSubtitle" name="EndSubtitle"></x-input>
                            </div>    
                        </div>
                    </div>

                    <div class="flex">
                        <x-button id="refreshButton" class="text-center mx-auto">
                            {{ __('Refresh') }}
                        </x-button>
                        <div class="flex-grow"></div>
                        <x-button type="submit" name="submit" class="text-center mx-auto">
                            {{ __('Update') }}
                        </x-button>
                    </div>  
                </form>
            </div>
        </div>
    </div>

    <script>
        let updateTime = null
        function update() {
            fetch("/api/overlay")
            .then(function (response) {
                return response.json()
            })
            .then(function (data) {
                if (data.last_updated != update) {
                    updateTime = data.last_updated
                    console.log(data.last_updated)
                    document.getElementById(data.scene).checked = true;
                    document.getElementById("NowPlaying").checked = (data.components.nowplaying.shown == 'true');
                    document.getElementById("Calendar").checked = (data.components.calendar.shown == 'true');
                    document.getElementById("Chat").checked = (data.components.chat.shown == 'true');
                    document.getElementById("WelcomeTitle").value = data.elements.welcometitle
                    document.getElementById("WelcomeSubtitle").value = data.elements.welcomesubtitle
                    document.getElementById("BRBSubtitle").value = data.elements.brbsubtitle
                    document.getElementById("EndSubtitle").value = data.elements.endsubtitle
                }
            })
        }
        
        update()
    </script>

</x-app-layout>
