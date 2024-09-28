<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JobQuest</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <!-- Alpine js link  -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-black text-white font-hanken pb-20">
    <div class="">
        {{-- <nav class=" md:flex justify-between items-center py-4 border-b border-white/10">
            <div>
                <a href="/" class="flex space-x-2 items-center">
                    <img src="{{Vite::asset('resources/images/logo.png')}}" alt="" class="w-7">
                    <p class="font-bold text-lg">Job<span class="text-blue-600 font-extrabold">Quest</span></p>
                </a>
            </div>
            <div class="space-x-6 font-bold">
                <a href="/">Jobs</a>
                <a href="#">Careers</a>
                <a href="#">Salaries</a>
                <a href="#">Companies</a>
            </div>
            @auth
            <div class="space-x-6 font-bold flex">
                <a href="/jobs/create">Post a Job</a>

                <form method="POST" action="/logout">
                    @csrf
                    @method('DELETE')
                    <button>Log Out</button>
                </form>
            </div>
            @endauth

            @guest
            <div class="space-x-6 font-bold">
                <a href="/register">Sign Uo</a>
                <a href="/login">Log In</a>
            </div>
            @endguest

        </nav> --}}
        <nav x-data="accordion(6)"
            class=" flex flex-wrap items-center max-w-[986px] mx-auto justify-between w-full px-4 py-5 tracking-wide border-b border-white/10  md:py-4">
            <!-- Left nav -->
            <div class="flex items-center">
                <a href="/" class="flex space-x-2 items-center">
                    <img src="{{Vite::asset('resources/images/logo.png')}}" alt="" class="w-7">
                    <p class="font-bold text-lg">Job<span class="text-blue-600 font-extrabold">Quest</span></p>
                </a>
            </div>
            <!-- Toggle button -->
            <div @click="handleClick()" x-data="{open : false}" class="block text-gray-600 cursor-pointer lg:hidden">
                <button @click="open = ! open" class="w-6 h-6 text-lg">
                    <svg x-show="! open" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"
                        :clas="{'transition-full each-in-out transform duration-500':! open}">
                        <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect>
                        <path d="M7.94977 11.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M7.94977 23.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M7.94977 35.9498H39.9498" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>

                    <svg x-show="open" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-x">
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg>
                </button>
            </div>
            <!-- End toggle button -->

            <!-- Toggle menu -->
            <div x-ref="tab" :style="handleToggle()"
                class="relative w-full overflow-hidden transition-all duration-700 lg:hidden max-h-0">
                <div class="flex flex-col my-3 space-y-2 text-lg hover:font-b text-gray-600">
                    <a href="/jobs" class="hover:text-gray-900"><span>Jobs</span></a>
                    <hr>
                    <a href="#" class="hover:text-gray-900"><span>Career</span></a>
                    <hr>
                    <a href="#" class="hover:text-gray-900"><span>Companies</span></a>
                </div>

                <div>
                    @auth
                    <div class="space-x-6 font-bold flex">
                        <a href="/jobs/create"
                            class="whitespace-nowrap text-base font-medium hover:text-gray-300 transition-colors duration-500 text-white">Post
                            a Job</a>

                        <form method="POST" action="/logout">
                            @csrf
                            @method('DELETE')
                            <button>Log Out</button>
                        </form>
                    </div>
                    @endauth
                    @guest
                    <div
                        class="items-center flex-1 pt-6 justify-center text-lg text-gray-500 lg:pt-0 list-reset lg:flex">
                        <a href="/login"
                            class="whitespace-nowrap text-base font-medium hover:text-gray-300 transition-colors duration-500 text-white">
                            Sign in
                        </a>
                        <a href="/register"
                            class=" whitespace-nowrap inline-flex items-center justify-center px-4 py-2  text-base font-medium hover:text-gray-300 transition-colors duration-500 text-white">
                            Register
                        </a>
                    </div>
                    @endguest
                </div>
            </div>
            <!-- End toggle menu -->
            <!-- End show menu sm,md -->

            <!-- Show Menu lg -->
            <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
                <div class="items-center flex-1 pt-6 justify-center text-lg text-white lg:pt-0 list-reset lg:flex">
                    <div class="mr-3">
                        <a href="/"
                            class="inline-block px-4 py-2 no-underline hover:text-gray-300 transition-colors duration-500 text-white">
                            Jobs
                        </a>
                    </div>

                    <div class="mr-3">
                        <a href="#"
                            class="inline-block px-4 py-2 no-underline hover:text-gray-300 transition-colors duration-500 text-white">
                            Careers
                        </a>
                    </div>

                    <div class="mr-3">
                        <a href="#"
                            class="inline-block px-4 py-2 no-underline hover:text-gray-300 transition-colors duration-500 text-white">
                            Companies
                        </a>
                    </div>


                </div>
            </div>
            <div class="hidden w-full lg:flex lg:items-center lg:w-auto">
                @auth
                <div class="space-x-6 font-bold flex">
                    <a href="/jobs/create"
                        class="whitespace-nowrap text-base font-medium hover:text-gray-300 transition-colors duration-500 text-white">Post
                        a Job</a>

                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')
                        <button>Log Out</button>
                    </form>
                </div>
                @endauth
                @guest
                <div class="items-center flex-1 pt-6 justify-center text-lg text-gray-500 lg:pt-0 list-reset lg:flex">
                    <a href="/login"
                        class="whitespace-nowrap text-base font-medium hover:text-gray-300 transition-colors duration-500 text-white">
                        Sign in
                    </a>
                    <a href="/register"
                        class=" whitespace-nowrap inline-flex items-center justify-center px-4 py-2  text-base font-medium hover:text-gray-300 transition-colors duration-500 text-white">
                        Register
                    </a>
                </div>
                @endguest


            </div>
            <!-- End show Menu lg -->
            <!-- End right nav -->
        </nav>
        <main class="mt-10 max-w-[986px] mx-auto">
            {{$slot}}
        </main>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
  Alpine.store('accordion', {
    tab: 0
  });
  Alpine.data('accordion', (idx) => ({
    init() {
      this.idx = idx;
    },
    idx: -1,
    handleClick() {
      this.$store.accordion.tab = this.$store.accordion.tab === this.idx ? 0 : this.idx;
    },
    handleRotate() {
      return this.$store.accordion.tab === this.idx ? '-rotate-180' : '';
    },
    handleToggle() {
      return this.$store.accordion.tab === this.idx ? `max-height: ${this.$refs.tab.scrollHeight}px` : '';
    }
  }));
})

    </script>
</body>

</html>