<x-app-layout>
    <x-slot name="title">
        Portfolio
    </x-slot>

    <x-slot name="scripts">
        <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
    </x-slot>

    <div class="text-center bg-white">
        <div class="pt-16 text-white" style="background-image: url('static/portfolio/bg1.webp')">
            <div class="flex flex-col text-center">
                <div class="flex-grow"></div> 
                <img src="static/portfolio/kieran.webp" class="rounded-full w-32 mx-auto"></img>
                <div class="flex flex-col ml-0 mt-3 mb-6 sm:mb-0 md:-mb-8">
                    <h1 class="font-bold text-3xl">Hello! I'm Kieran.</h1>
                    <div class="flex flex-row mx-auto">
                        <h2 class="text-lg text-gray-300 h-6 mr-1 mb-8 lg:mb-4" id="typed"></h2>
                    </div>
                </div>
                <img src="static/portfolio/separator1.webp" class="w-100"></img>
                <div class="flex-grow"></div> 
            </div>
        </div>
        <div class="py-8 sm:py-0">
            <h2 class="text-2xl font-semibold mb-6">What I Do</h2>
            <div class="flex flex-col sm:flex-row md:flex-col lg:flex-row max-w-6xl mx-auto">
                <div
                    class="flex-1 flex-grow mx-6 sm:mx-3 md:mx-4 mb-2 flex flex-row sm:flex-col md:flex-row lg:flex-col p-3 bg-gray-100 rounded-xl shadow">
                    <div class="my-auto">
                        <i class="fas fa-film fa-3x text-gray-700 mr-6 ml-3 sm:mb-2 sm:mr-3 md:mb-0 md:mr-6 lg:mb-2 lg:mr-3"></i>
                    </div>
                    <p
                        class="flex-grow flex flex-col text-left sm:text-center md:text-left lg:text-center">
                        <span class="font-bold text-gray-700">Video Editing</span>
                        <span class="text-sm text-gray-700">I am competent in the Adobe Creative Cloud software packages, having worked on professional productions</span>
                    </p>
                </div>

                <div
                    class="flex-1 flex-grow mx-6 sm:mx-3 md:mx-4 mb-2 flex flex-row sm:flex-col md:flex-row lg:flex-col p-3 bg-gray-100 rounded-xl shadow">
                    <div class="my-auto">
                        <i
                            class="fas fa-camera-retro fa-3x text-gray-700 mr-6 ml-3 sm:mb-2 sm:mr-3 md:mb-0 md:mr-6 lg:mb-2 lg:mr-3"></i>
                    </div>
                    <p
                        class="flex-grow flex flex-col text-left sm:text-center md:text-left lg:text-center">
                        <span class="font-bold text-gray-700">Photography</span>
                        <span class="text-sm text-gray-700">I studied photography, based on my enjoyment of bending the rules of art and want to create something different</span>
                    </p>
                </div>

                <div
                    class="flex-1 flex-grow mx-6 sm:mx-3 md:mx-4 mb-2 flex flex-row sm:flex-col md:flex-row lg:flex-col p-3 bg-gray-100 rounded-xl shadow">
                    <div class="my-auto">
                        <i class="fas fa-server fa-3x text-gray-700 mr-6 ml-3 sm:mb-2 sm:mr-3 md:mb-0 md:mr-6 lg:mb-2 lg:mr-3"></i>
                    </div>
                    <p
                        class="flex-grow flex flex-col text-left sm:text-center md:text-left lg:text-center">
                        <span class="font-bold text-gray-700">Server Management</span>
                        <span class="text-sm text-gray-700">I host a range of servers and services, gaming servers as well as a complete smart home and media management solution</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="mt-6 text-white" style="background-image: url('static/portfolio/bg3.webp')">
            <img src="static/portfolio/separator2.webp" class="w-100"></img>
            <h2 class="text-2xl font-semibold mt-8 md:mt-8 lg:mt-0 mb-6">Education & Experience</h2>
            <div class="flex flex-col sm:flex-row md:flex-col lg:flex-row">
                <div class="flex-1 flex-grow text-center sm:text-right md:text-center lg:text-right mx-2">
                    <h3 class="font-semibold text-lg">Past</h3>
                    <h4 class="mt-3">
                        <span class="font-semibold">GCSEs</span> - RSA Academy
                    </h4>
                    <p class="text-xs text-gray-300">(Aug 2012 - Jun 2017)</p>
                    <p class="text-sm">A*, A*, A*, A*, A*</p>
                    <p class="text-xs">B, B, C, C, D*</p>

                    <h4 class="mt-3">
                        <span class="font-semibold">A Levels</span> - Dudley Sixth
                    </h4>
                    <p class="text-xs text-gray-3400">(Aug 2017 - Jun 2019)</p>
                    <p class="text-sm">A, A, D* @ A Level</p>
                    <p class="text-xs">A, B, D* @ AS Level</p>
                </div>
                <div class="flex-1 flex-grow text-center sm:text-left md:text-center lg:text-left mx-2">
                    <h3 class="font-semibold text-lg mt-4 sm:mt-0 md:mt-4 lg:mt-0">Current</h3>
                    <h4 class="mt-3">
                        Staffordshire Uni - <span class="font-semibold">Undergraduate</span>
                    </h4>
                    <p class="text-xs text-gray-300">(Aug 2019 - Jun 2023)</p>
                    <p class="text-sm">BSc (Hons) Computer Science (w/ Placement)</p>
                    <p class="text-xs">79.5% <span class="text-gray-300">(1st)</span> @ Year 1</p>

                    <h4 class="mt-3">
                        Pinewood Technologies - <span class="font-semibold">Placement</span>
                    </h4>
                    <p class="text-xs text-gray-300">(Jun 2021 - Jun 2022)</p>
                    <p class="text-sm">Software Development Placement (Web)</p>
                </div>
            </div>
            <div class="mt-8 mb-12 lg:mb-0">
                <a href="{{ route('contact') }}" class="text-md font-semibold p-1 px-3 rounded-3xl bg-gray-700 text-white hover:shadow-xl hover:text-white hover:bg-gray-900 transition">Contact for more info</a>
            </div>
            <img src="static/portfolio/separator6.webp" class="w-100"></img>
        </div>
        <div class="pt-6 lg:pt-0 text-white" style="background-color: #0397d6">
            <!-- <h2 class="text-2xl font-semibold">Harmony</h2> -->
            <img src="static/portfolio/harmony-white.svg" class="mx-auto h-16"></img>
            <h2 class="text-lg font-semibold text-gray-300 mb-10 -mt-5" style="margin-left: 4.5em;">Ecommerce Music Store</h2>
            <div class="flex flex-col lg:flex-row max-w-6xl px-4 xl:mx-auto text-left">
                <div class="flex-1">
                    <div class="flex-1 flex-grow flex flex-col">
                        <img src="static/portfolio/harmony.webp"></img>
                    </div>
                    <div class="flex-grow"></div>
                </div>
                <div class="flex-1 flex-grow flex flex-col">
                    <div class="flex-1 mx-2 ml-0 lg:ml-4 flex flex-col flex-grow">
                        <div class="flex flex-col mt-4 lg:mt-0 flex-grow">
                            <p class="font-semibold">A Bespoke Ecommerce store for an online music shop.</p>
                            <p class="text-sm font-semibold">Made with a group to fit customer’s requirements which included:</p>
                            <ul class="list-inside list-disc ml-2 text-gray-100">
                                <li>Homepage</li>
                                <ul class="list-inside list-disc ml-6 text-xs">
                                    <li>Carousel</li>
                                    <li>New Music Releases</li>
                                    <li>New Merch</li>
                                    <li>Upcoming Events</li>
                                    <li>Newsletter Sign-up</li>
                                </ul>
                                <li>Music & Merch Listings</li>
                                <ul class="list-inside list-disc ml-6 text-xs">
                                    <li>With Search page (type & names)</li>
                                    <li>Size / Type selectors</li>
                                </ul>
                                <li>Cart</li>
                                <li>Admin Panel</li>
                                <li>Fully Responsive Design</li>
                            </ul>
                            <div class="flex-grow"></div>
                            <div class="flex">
                                <div class="flex-grow"></div>
                                <a class="text-xs p-2 bg-blue-400 border border-blue-500 hover:bg-blue-500 hover:border-blue-600 rounded-lg transition shadow-sm hover:shadow-md" href="https://harmony.aylo.net">View Project <i class="fas fa-angle-double-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img src="static/portfolio/separator3.webp" class="mt-8 w-100"></img>
        </div>
        <div class="pt-6 sm:pt-0 pb-12">
            <h2 class="text-2xl font-semibold mb-6">Projects</h2>
            <div class="flex flex-col lg:flex-row max-w-6xl px-4 xl:mx-auto text-left">
                <div class="flex-1">
                    <div class="flex-1 flex-grow flex flex-col mb-2 bg-gray-100 rounded-xl p-2 shadow-md">
                        <img class="w-100 rounded-xl shadow" src="static/portfolio/PEI.webp"></img>
                        <div class="m-2 mb-0">
                            <h3 class="text-xl"><span class="font-semibold">Photography</span> - Experimental Imagery <span class="text-gray-700 text-sm">Jan 2019</span></h3>
                            <p class="text-sm mb-1">An A* Project based on breaking the rules of photography and carving your own path. For this, I also created a video outcome which went above and beyond the brief.</p>
                        </div>
                        <div class="flex">
                            <div class="flex-grow"></div>
                            <a class="text-xs p-2 bg-gray-100 border border-gray-300 hover:bg-gray-300 hover:border-gray-400 rounded-lg transition shadow-sm hover:shadow-md" href="http://dl.aylo.net/Experimental%20Imagery%20Final.pdf">View Project <i class="fas fa-angle-double-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="flex-grow"></div>
                </div>
                <div class="flex-1 flex-grow flex flex-col">
                    <div class="flex-1 mx-2 flex flex-col mb-2 bg-gray-100 rounded-xl p-2 shadow-md">
                        <div class="flex">
                            <img class="w-32 h-32 rounded-xl shadow" src="static/portfolio/PPS.webp"></img>
                            <div class="ml-2 flex-col">
                                <h3 class="text-lg"><span class="font-semibold">Photography</span> - Parts and Sections <span class="text-gray-600 text-xs">Apr 2019</span></h3>
                                <p class="text-sm mb-1">An A* Project based on breaking the rules of photography and carving your own path. For this, I also created a video outcome which went above and beyond the brief.</p>
                                <div class="flex-grow"></div>
                                <div class="flex">
                                    <div class="flex-grow"></div>
                                    <a class="text-xs p-2 bg-gray-100 border border-gray-300 hover:bg-gray-300 hover:border-gray-400 rounded-lg transition shadow-sm hover:shadow-md" href="http://dl.aylo.net/Experimental%20Imagery%20Final.pdf">View Project <i class="fas fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 mx-2 flex flex-col mb-2 bg-gray-100 rounded-xl p-2 shadow-md">
                        <div class="flex">
                            <img class="w-32 h-32 rounded-xl shadow" src="static/portfolio/ALG.webp"></img>
                            <div class="ml-2 flex flex-col">
                                <h3 class="text-lg"><span class="font-semibold">ayloNet</span> <span class="text-gray-600 text-xs">2019 - Current</span></h3>
                                <p class="text-sm mb-1">A collection of servers and services that run my home automation and media management.</p>
                                <div class="flex-grow"></div>
                                <div class="flex">
                                    <div class="flex-grow"></div>
                                    <a class="text-xs p-2 bg-gray-100 border border-gray-300 hover:bg-gray-300 hover:border-gray-400 rounded-lg transition shadow-sm hover:shadow-md" href="https://aylo.net">View Project <i class="fas fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex-1 mx-2 flex flex-col mb-2 bg-gray-100 rounded-xl p-2 shadow-md">
                        <div class="flex">
                            <img class="w-32 h-32 rounded-xl shadow" src="static/portfolio/GPC.webp"></img>
                            <div class="ml-2 flex flex-col">
                                <h3 class="text-lg"><span class="font-semibold">Graphic Products</span> Coursework <span class="text-gray-600 text-xs">Jun 2017</span></h3>
                                <p class="text-sm mb-1">An A* project created for GCSE Graphics Products to a proposal surrounding the design and production of bottles and their packaging.</p>
                                <div class="flex-grow"></div>
                                <div class="flex">
                                    <div class="flex-grow"></div>
                                    <a class="text-xs p-2 bg-gray-100 border border-gray-300 hover:bg-gray-300 hover:border-gray-400 rounded-lg transition shadow-sm hover:shadow-md" href="http://dl.aylo.net/GCSE%20Graphics%20Coursework.pdf">View Project <i class="fas fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-grow"></div>
                </div>
            </div>
        </div>
        <!-- <div class="text-white" style="background-image: url('static/portfolio/bg2.webp')">
            <img src="static/portfolio/separator4.webp" class="w-100"></img>
            <h2 class="text-2xl font-semibold mt-8 sm:mt-0">Contact</h2>
            <p class="text-gray-300">See something you like or want more info?</p>
            <p class="text-gray-300">Give me a shout and I'll get back to you ASAP 😄</p>
            <h3 class="text-lg font-semibold text-center mt-6">Contact Me</h3>
            <div class="mx-4 sm:mx-0">
                <x-contact-card class="bg-gray-300 text-black"/>
            </div>
            <img src="static/portfolio/separator1.webp" class="mt-8 w-100"></img>
            <span id="contact"></span>
        </div> -->
    </div>

    <script>
        var typed = new Typed('#typed', {
            strings: ["Computer Science Student", "Tech Support Guru", "Professional Cat Whisperer"],
            typeSpeed: 50,
            backSpeed: 25,
            backDelay: 2550,
            showCursor: true,
            loop: true
        });
    </script>
</x-app-layout>
