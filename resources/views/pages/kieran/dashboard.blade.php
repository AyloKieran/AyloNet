<x-app-layout>
    <x-slot name="title">
        Kieran Dashboard
    </x-slot>
    
    <div class="flex flex-col flex-grow text-center">
        <div class="mt-24"></div>
        <div class="mb-4 hidden" id="no_events_container">
            <h2 class="text-3xl font-black">All done! 😄</h2>
        </div>
        <div class="mb-4" id="loading_container">
            <h2 class="text-3xl text-gray-600 font-black">
                <i class="fas fa-spinner text-gray-400 animate-spin mr-2"></i>
                Loading
            </h2>
        </div>
        <div class="mb-4 hidden" id="error_container">
            <h2 class="text-3xl text-red-800 font-black">Error 😢</h2>
        </div>
        <div class="mb-4 hidden" id="current_container">
            <h2 class="text-lg">Current Event</h2>
            <h3 class="font-black text-3xl" id="current_title">Loading</h3>
            <h4 class="font-semibold text-2xl" id="current_remaining">Loading</h4>
        </div>
        <div class="mb-4 text-gray-700 hidden" id="next_container">
            <h2 class="text-sm">Next Event</h2>
            <h3 class="font-semibold text-lg" id="next_title">Loading</h3>
            <h4 class="font-light text-md" id="next_in">Loading</h4>
        </div>
        <div class="flex-grow"></div>
    </div>

    <script>
        var page = (function () {
            var showContainer = function (container) {
                if (container.classList.contains("hidden")) {
                    container.classList.toggle("hidden");
                }
            }

            var hideContainer = function (container) {
                if (!container.classList.contains("hidden")) {
                    container.classList.toggle("hidden");
                }
            }

            return {
                showContainer: showContainer,
                hideContainer: hideContainer,
                no_events_container: document.getElementById("no_events_container"),
                loading_container: document.getElementById("loading_container"),
                error_container: document.getElementById("error_container"),
                current_container: document.getElementById("current_container"),
                current_title: document.getElementById("current_title"),
                current_remaining: document.getElementById("current_remaining"),
                next_container: document.getElementById("next_container"),
                next_title: document.getElementById("next_title"),
                next_in: document.getElementById("next_in")
            };            
        })();

        var dateParse = (function () {
            var getTimestampFromDifference = function (difference) {
                return `${_getHours(difference)}:${_getMinutes(difference)}:${_getSeconds(difference)}`;
            }

            var _getHours = function(difference) {
                return Math.floor(difference / (1000 * 60 * 60))
            }

            var _getMinutes = function(difference) {
                var result = Math.floor(difference / (1000 * 60) - (_getHours(difference) * 60))
                return result > 9 ? result : `0${result}`
            }

            var _getSeconds = function(difference) {
                var result =  Math.floor(difference / (1000) - (_getHours(difference) * 60 * 60) - (_getMinutes(difference) * 60))
                return result > 9 ? result : `0${result}`
            }

            return {
                getTimestampFromDifference: getTimestampFromDifference
            };
        })();
        
        var getData = function () {
            fetch("https://aylo.net/api/calendar-events")
                .then(function (response) {
                    return response.json();
                })
                .then(function (data) {
                    page.hideContainer(page.loading_container);
                    console.log(data);

                    if(data.length > 0) {
                        if (data.length > 1) {
                            var next_event = data[1];
                            page.showContainer(page.next_container);
                            page.next_title.innerText = next_event.title;
                            page.next_in.innerText = dateParse.getTimestampFromDifference(Math.abs(Date.now() - Date.parse(next_event.start)));
                        } else {
                            page.hideContainer(page.next_container)
                        }

                        var current_event = data[0];
                        page.current_title.innerText = current_event.title;
                        page.current_remaining.innerText = dateParse.getTimestampFromDifference(Date.parse(current_event.end) - Date.now());

                        page.showContainer(page.current_container);

                    } else {
                        page.showContainer(page.no_events_container);
                        page.hideContainer(page.current_container);
                        page.hideContainer(page.next_container);
                    }
                })
                .catch(function () {
                    page.hideContainer(page.loading_container);
                    page.hideContainer(page.no_events_container);
                    page.hideContainer(page.current_container);
                    page.hideContainer(page.next_container);
                    page.showContainer(page.error_container);
                });
        };

        setInterval(function() {
            getData();
        }, 1000)

        getData();
    </script>
</x-app-layout>