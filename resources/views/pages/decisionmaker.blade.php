<x-app-layout>
    <x-slot name="title">
        Decision Maker
    </x-slot>

    <x-slot name="scripts">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </x-slot>

    <div id="container" class="w-full flex flex-col h-screen text-white bg-gray-900 text-center">
        <h1 class="text-3xl font-semibold mt-6 md:mt-12 mb-6">Decision Maker</h1>
        <ul class="list text-black flex flex-col">
            <li class="mx-auto px-2 pb-1 w-100 md:w-96">
                <div class="flex mx-auto">
                    <input type="text" id="addvalue" class="rounded-l-xl w-100">
                    <div class="flex">
                        <button class="add bg-green-500 hover:bg-green-600 transition py-auto px-3 rounded-r-xl" type="button">➕</button>
                    </div>
                </div>
            </li>
        </ul>
        <button id="generate" onclick="generate()" class="mt-12"><span class="bg-blue-500 p-2 rounded-lg">Generate</span></button>
    </div>

    <script>
        values = []

        $(".add").on("click", function () {
            addvalue = document.getElementById("addvalue")
            addItem(addvalue.value);
            addvalue.value = "";
        });

        input = document.getElementById("addvalue")
        input.addEventListener("keyup", function (event) {
            if (event.keyCode === 13) {
                event.preventDefault();
                document.getElementsByClassName("add")[0].click();
            }
            if (event.ctrlKey && event.keyCode == 13) {
                generate()
            }
        })
        input.focus()

        function addItem(value) {
            if (value != "") {
                li = document.createElement("li")
                li.setAttribute('class', "mx-auto px-2 w-100 md:w-96")
                div1 = document.createElement("div")
                div1.setAttribute("class", "flex mx-auto")
                input = document.createElement("input")
                input.setAttribute("type", "text")
                input.setAttribute("class", "input rounded-l-xl w-100")
                input.value = value
                div1.appendChild(input)
                div2 = document.createElement("div")
                div2.setAttribute("class", "flex")
                button = document.createElement("button")
                button.setAttribute("class", "deleteMe bg-red-500 hover:bg-red-600 transition py-auto px-3 rounded-r-xl")
                button.setAttribute("type", "button")
                button.innerText = "🗑️"
                div2.appendChild(button)
                div1.appendChild(div2)
                li.appendChild(div1)
                document.getElementsByTagName("ul")[0].appendChild(li)

                $(".deleteMe").on("click", function () {
                    $(this).closest("li").remove();
                });
            }
        }

        function generate() {
            if (checkValid()) {
                for (let item of document.getElementsByClassName("input")) {
                    value = item.value
                    console.log(value)
                    if (value != "") {
                        values.push(value)
                    }
                }
                clearPage()
                chosenvalue = choose(values)
                console.log(chosenvalue)
                createValue(chosenvalue)
            }
        }

        function checkValid() {
            list = document.getElementsByTagName("input").length - 2
            input = document.getElementById("addvalue").value

            if (list > 1 && input != "") {
                return true
            } else if (list > 2) {
                return true
            }
        }

        function choose(arr) {
            return arr[Math.floor(Math.random() * arr.length)];
        }

        function clearPage() {
            document.getElementsByTagName("h1")[0].remove()
            document.getElementsByClassName("list")[0].remove()
            document.getElementById("generate").remove()
        }

        function createValue(value)
        {
            container = document.getElementById("container")
            text = document.createElement("h1")
            text.setAttribute('class', "text-4xl font-bold mt-6 md:mt-12 mb-24")
            text.innerText = value
            text2 = document.createElement("h2")
            text2.setAttribute('class', "text-xl font-semibold")
            text2.innerText = "Chosen from:"
            text3 = document.createElement("h2")
            text3.setAttribute('class', "text-lg text-gray-400")
            text3.innerHTML = values.join("<br>")
            container.appendChild(text)
            container.appendChild(text2)
            container.appendChild(text3)
        }
    </script>
</x-app-layout>