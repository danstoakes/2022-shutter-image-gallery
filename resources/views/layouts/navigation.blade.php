<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-6">
        <div class="flex justify-between navigation">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('library') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <div class="flex">
                            <div class="flex mr-6">
                                @include("modal/nav/upload-media-button", ["iconOnly" => true])
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <g>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M 19 11 L 5 11 M 19 11 C 20.105 11 21 11.895 21 13 L 21 19 C 21 20.105 20.105 21 19 21 L 5 21 C 3.895 21 3 20.105 3 19 L 3 13 C 3 11.895 3.895 11 5 11 M 19 11 L 19 9 C 19 7.895 18.105 7 17 7 M 5 11 L 5 9 C 5 7.895 5.895 7 7 7 M 7 7 L 7 5 C 7 3.895 7.895 3 9 3 L 15 3 C 16.105 3 17 3.895 17 5 L 17 7 M 7 7 L 17 7"/>
                                            <ellipse style="stroke-width: 1px; stroke: rgb(255, 255, 255); fill: rgb(255, 255, 255);" cx="18.784" cy="19.299" rx="2.759" ry="2.226"/>
                                            <rect style="stroke-width: 1px; fill: rgb(255, 255, 255); stroke: rgb(255, 255, 255);" transform="matrix(0, -1, 1, 0, 5.8705, 38.924088)" x="20.506" y="14.599" width="5.159" height="1.049"/>
                                            <rect x="13.143" y="20.465" width="4.755" height="1.049" style="stroke-width: 1px; fill: rgb(255, 255, 255); stroke: rgb(255, 255, 255);"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M 18.054 14.972 L 18.054 20.972 M 15.054 17.972 L 21.054 17.972"/>
                                            <path style="stroke-width: 1px; fill: rgba(0, 0, 0, 0);" transform="matrix(0, -1, 1, 0, 6.29843, 16.609804)" d="M 3.016 14.174 H 3.352 V 15.193 H 3.016 A 0.336 0.5 0 0 1 2.68 14.693 V 14.674 A 0.336 0.5 0 0 1 3.016 14.174 Z" bx:shape="rect 2.68 14.174 0.672 1.019 0.5 0 0 0.5 1@218be1a4"/>
                                            <path style="stroke-width: 1px; fill: rgba(0, 0, 0, 0);" d="M -13.538 -21.501 H -13.138 V -20.501 H -13.538 A 0.4 0.5 0 0 1 -13.938 -21.001 V -21.001 A 0.4 0.5 0 0 1 -13.538 -21.501 Z" transform="matrix(-1, 0, 0, -1, 0, 0)" bx:shape="rect -13.938 -21.501 0.8 1 0.5 0 0 0.5 1@a8f7e91a"/>
                                        </g>
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                    </svg>
                                </a>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                            </div>
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </x-slot>

                    <x-slot name="content">
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

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <div class="flex mr-3">
                    @include("modal/nav/upload-media-button", ["iconOnly" => true])
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <g>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M 19 11 L 5 11 M 19 11 C 20.105 11 21 11.895 21 13 L 21 19 C 21 20.105 20.105 21 19 21 L 5 21 C 3.895 21 3 20.105 3 19 L 3 13 C 3 11.895 3.895 11 5 11 M 19 11 L 19 9 C 19 7.895 18.105 7 17 7 M 5 11 L 5 9 C 5 7.895 5.895 7 7 7 M 7 7 L 7 5 C 7 3.895 7.895 3 9 3 L 15 3 C 16.105 3 17 3.895 17 5 L 17 7 M 7 7 L 17 7"/>
                                <ellipse style="stroke-width: 1px; stroke: rgb(255, 255, 255); fill: rgb(255, 255, 255);" cx="18.784" cy="19.299" rx="2.759" ry="2.226"/>
                                <rect style="stroke-width: 1px; fill: rgb(255, 255, 255); stroke: rgb(255, 255, 255);" transform="matrix(0, -1, 1, 0, 5.8705, 38.924088)" x="20.506" y="14.599" width="5.159" height="1.049"/>
                                <rect x="13.143" y="20.465" width="4.755" height="1.049" style="stroke-width: 1px; fill: rgb(255, 255, 255); stroke: rgb(255, 255, 255);"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M 18.054 14.972 L 18.054 20.972 M 15.054 17.972 L 21.054 17.972"/>
                                <path style="stroke-width: 1px; fill: rgba(0, 0, 0, 0);" transform="matrix(0, -1, 1, 0, 6.29843, 16.609804)" d="M 3.016 14.174 H 3.352 V 15.193 H 3.016 A 0.336 0.5 0 0 1 2.68 14.693 V 14.674 A 0.336 0.5 0 0 1 3.016 14.174 Z" bx:shape="rect 2.68 14.174 0.672 1.019 0.5 0 0 0.5 1@218be1a4"/>
                                <path style="stroke-width: 1px; fill: rgba(0, 0, 0, 0);" d="M -13.538 -21.501 H -13.138 V -20.501 H -13.538 A 0.4 0.5 0 0 1 -13.938 -21.001 V -21.001 A 0.4 0.5 0 0 1 -13.538 -21.501 Z" transform="matrix(-1, 0, 0, -1, 0, 0)" bx:shape="rect -13.938 -21.501 0.8 1 0.5 0 0 0.5 1@a8f7e91a"/>
                            </g>
                        </svg>
                    </a>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </a>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </a>
                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </a>
                </div>
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('library')" :active="request()->routeIs('library')">
                {{ __('Library') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
