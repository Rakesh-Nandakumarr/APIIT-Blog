<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?: 'Apiit Blog' }}</title>
    <meta name="author" content="Rakesh">
    <meta name="description" content="{{ $metaDescription }}">
    <style>
        * {
            transition: all 0.4s;
        }
    </style>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 font-family-karla">


<!-- Text Header -->
<header class="w-full container mx-auto">
    <div class="flex flex-col items-center py-2">
        <img src="img/apiit.png" class="rounded py-2 px-4 mx-2">
        <p class="text-lg text-gray-600">
            {{ \App\Models\TextWidget::getTitle('header') }}
        </p>
    </div>
</header>

<!-- Topic Nav -->
<nav class="w-full py-4 border-t border-b bg-gray-100" x-data="{ open: false }">
    <div class="block sm:hidden">
        <a
            href="#"
            class="block md:hidden text-base font-bold uppercase text-center flex justify-center items-center"
            @click="open = !open"
        >
            Topics <i :class="open ? 'fa-chevron-down': 'fa-chevron-up'" class="fas ml-2"></i>
        </a>
    </div>
    <div :class="open ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
        <div
            class="w-full container mx-auto flex flex-col sm:flex-row items-center justify-between text-sm font-bold uppercase mt-0 px-6 py-2 w">
            <div>
                <a href="{{route('home')}}" class="hover:bg-teal-600 hover:text-white rounded py-2 px-4 mx-2">Home</a>
                @if (sizeof($categories) > 2)
                <div class="relative inline-block text-left">
            <button id="dropdown-button" class="inline-flex justify-center hover:bg-teal-600 hover:text-white rounded py-2 px-4 mx-2">
                CATEGORIES
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
            <div id="dropdown-menu" class="z-50 origin-top-right absolute right-0 mt-2 w-60 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5">
                <div class="py-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                    @foreach($categories as $category)
                    <a href="{{route('by-category', $category)}}"
                       class="flex block hover:bg-teal-600 hover:text-white rounded py-2 px-1 mx-2">{{$category->title}}</a>
                @endforeach
                </div>
            </div>
        </div>
        @else
                @foreach($categories as $category)
                    <a href="{{route('by-category', $category)}}"
                       class="hover:bg-teal-600 hover:text-white rounded py-2 px-4 mx-2">{{$category->title}}</a>
                @endforeach
                @endif
                <a href="{{route('about-us')}}" class="hover:bg-teal-600 hover:text-white rounded py-2 px-4 mx-2">About
                    us</a>
            </div>

            <div class="flex items-center">
                <form method="get" action="{{route('search')}}">
                    <input name="q" value="{{request()->get('q')}}"
                           class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6 font-medium"
                           placeholder="Type & hit enter to search anything"/>
                </form>
                @auth
                    <div class="flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <div class="flex gap-2">
                                @if (Auth::user()->usertype == 'admin')
                                <a href="/admin" class="bg-teal-600 text-white rounded py-2 px-4 mx-2">admin dashboard</a>
                                @endif
                                <button
                                    class="hover:bg-teal-600 hover:text-white flex items-center rounded py-2 px-4 mx-2">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                  d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                  clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </button>
                                </div>
                            </x-slot>

                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')">
                                    {{ __('Profile') }}
                                </x-dropdown-link>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link :href="route('logout')"
                                                     onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @else
                    <a href="{{route('register')}}"
                       class="hover:bg-teal-600 hover:text-white rounded py-2 px-4 mx-2">Register</a>
                    <a href="{{route('login')}}" class="bg-teal-600 text-white rounded py-2 px-4 mx-2">Login</a>
                @endauth
            </div>
        </div>
    </div>
</nav>

<div class="container mx-auto py-6">

    {{ $slot }}

</div>
<x-plusbtn></x-plusbtn>

<footer class="py-8 px-4 md:px-8 lg:px-16 xl:px-24 bg-gray-900 text-white">
    <div class="flex flex-wrap justify-between items-center">
        <!-- Social Media Icons -->
        <div class="flex space-x-4">
            <a href="#" class="text-white hover:text-gray-400">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-white hover:text-gray-400">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="text-white hover:text-gray-400">
                <i class="fab fa-youtube"></i>
            </a>
            <a href="#" class="text-white hover:text-gray-400">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="#" class="text-white hover:text-gray-400">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <!-- Partner Logos -->
        <div class="flex space-x-7">
            <img src="img/v1336_232.png" class="h-12" />
            <img src="img/v1336_234.png" class="h-11" />
            <img src="img/v1336_236.png" class="h-11" />
            <img src="img/v1336_237.png" class="h-12" />
            <img src="img/v1336_239.png" class="h-11" />
            <img src="img/v1336_241.png" class="h-11" />
        </div>
    </div>
    <!-- Footer Columns -->
    <div class="mt-6 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Campus -->
        <div>
            <h4 class="text-lg font-semibold text-red-500">Campus</h4>
            <ul class="mt-3 space-y-2">
                <li>Colombo</li>
                <li>Kandy</li>
            </ul>
        </div>
        <!-- Areas of Study -->
        <div>
            <h4 class="text-lg font-semibold text-red-500">Areas of Study</h4>
            <ul class="mt-3 space-y-2">
                <li>Business</li>
                <li>IT</li>
                <li>Law</li>
                <li>Foundation</li>
                <li>Professional</li>
            </ul>
        </div>
        <!-- Important Links -->
        <div>
            <!-- Descriptio10 -->
            <p class="mt-8 text-sm">
                APIIT Sri Lanka is a reputable higher education institution
                established in partnership with Staffordshire University in the UK.
                APIIT also has academic liaisons with prestigious universities from
                Australia, Malaysia, and Thailand.
            </p>
            <!-- APIIT Logo -->
            <div class="mt-6 flex items-center">
                <img
                    src="img/apiit-logo-white.png"
                    alt="APIIT Sri Lanka"
                    class="h-15 ml-4"
                />
            </div>
        </div>
    </div>

</footer>

@livewireScripts

<script>
        const dropdownButton = document.getElementById('dropdown-button');
        const dropdownMenu = document.getElementById('dropdown-menu');
        let isDropdownOpen = true; // Set to true to open the dropdown by default, false to close it by default

        // Function to toggle the dropdown
        function toggleDropdown() {
            isDropdownOpen = !isDropdownOpen;
            if (isDropdownOpen) {
                dropdownMenu.classList.remove('hidden');
            } else {
                dropdownMenu.classList.add('hidden');
            }
        }

        // Initialize the dropdown state
        toggleDropdown();

        // Toggle the dropdown when the button is clicked
        dropdownButton.addEventListener('click', toggleDropdown);

        // Close the dropdown when clicking outside of it
        window.addEventListener('click', (event) => {
            if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
                isDropdownOpen = false;
            }
        });


    </script>
</body>
</html>
