<div id="popupContainer" class="fixed flex flex-col bottom-0 right-0 w-5/6 sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 h-auto bg-gray-700 opacity-0 hover:opacity-100 text-white m-6 px-6 py-4 rounded-xl shadow-lg transition-all pointer-events-none">
    <div class="flex">
        <p id="popupTitle" class="flex-grow text-lg font-bold"></p>
        <a id="popupClose" class="pl-4 font-bold text-gray-500 hover:text-white cursor-pointer transition">X</a>
    </div>
    <p id="popupSubtitle" class="mb-1 -mt-1 text-gray-200"></p>
    <div id="popupProgress" class="bg-white rounded-xl opacity-25" style="height: 2px; width: 0%"></div>
</div>

<script>
    var popup = (function() {
        var __popupcontainer = document.getElementById("popupContainer");
        var __title = document.getElementById("popupTitle");
        var __subtitle = document.getElementById("popupSubtitle");
        var __progress = document.getElementById("popupProgress");
        var __closebutton = document.getElementById("popupClose");

        var __timeout = 10;

        function update(title, subtitle) {
            __title.innerText = title;
            __subtitle.innerText = subtitle;
            
            _start = new Date()
            _end = _start.setSeconds(_start.getSeconds() + __timeout);

            _show();

            var _progressCalculator = setInterval(function () {
                _now = Date.now();
                _diff = (((_now - _end) * -1) / 100);
                __progress.style.width = `${_diff}%`;

                if (_now > _end) {
                    clearInterval(_progressCalculator);
                    _hide();
                }
            }, 25)

        }

        function _hide() {
            __popupcontainer.classList.remove("opacity-90");
            __popupcontainer.classList.add("opacity-0");
            __popupcontainer.classList.remove("pointer-events-auto");
            __popupcontainer.classList.add("pointer-events-none");
        }

        function _show() {
            __popupcontainer.classList.add("opacity-90");
            __popupcontainer.classList.remove("opacity-0");
            __popupcontainer.classList.add("pointer-events-auto");
            __popupcontainer.classList.remove("pointer-events-none");
        }

        (function init() {
            __closebutton.addEventListener('click', function () {
                _hide();
            })
        })();

        return {
            update: update
        }
    })();

</script>