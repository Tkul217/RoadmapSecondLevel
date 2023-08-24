<!-- Top navbar -->
<nav class="bg-gray-800 shadow-xl sticky w-full top-0 text-black z-50" x-data="{ mobilemenue: false }">
    <div class="mx-auto ">
        <div class="flex items-stretch justify-between h-16">

            <div class="flex items-center md:hidden">
                <div class="-mr-2 flex">
                    <!-- Mobile menu button -->
                    <button type="button" @click="$dispatch('togglesidebar')"
                            class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                            aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            <div class="flex items-center pl-6">
                <div class="flex-shrink-0 md:hidden">

                    <a href="{{route('dashboard')}}" class="text-white flex items-center space-x-2 group">
                        <div>
                            <svg class="h-8 w-8 transition-transform duration-300 group-hover:-rotate-45 "
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <div>
                            <span class="text-2xl font-extrabold">LaravelDaily</span>
                            <span class="text-xs block">Project Managment</span>
                        </div>
                    </a>
                </div>

                <!-- toggel sidebar -->
                <div class="text-white cursor-pointer hidden md:block" @click="$dispatch('togglesidebar')">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </div>
            </div>
            <div class="hidden md:flex items-stretch">
                <!-- Profile Menu DT -->
                <div class="ml-4 flex md:ml-6">

                    <div class="relative flex justify-center items-center mr-4">
                        <a href="{{route('notifications.index')}}">
                            <div class="block hover:text-white p-1 rounded-full text-gray-400 cursor-pointer flex">
                                <span class="sr-only">View notifications</span>
                                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                <p class="text-red-500 font-bold">{{count(auth()->user()->unreadNotifications)}}</p>
                            </div>
                        </a>
                    </div>

                    <!-- Profile dropdown -->
                    <div class="relative px-4 text-gray-400 hover:text-white text-sm cursor-pointer"
                         x-data="{open: false}">
                        <div class="flex items-center min-h-full" @click="open = !open">

                            <div class="max-w-xs rounded-full flex items-center text-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                                 id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                     src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg"
                                     alt="">
                            </div>

                            <div class="flex flex-col ml-4 capitalize">
                                <span>{{Auth::user()->name}}</span>
                                <span>{{collect(Auth::user()->getRoleNames())->first()}}</span>
                            </div>
                        </div>

                        <div x-show="open" @click.away="open = false"
                             class="origin-top-right absolute right-0 mt-0 min-w-full rounded-b-md shadow py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95" role="menu"
                             aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{route('profile.user')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                               role="menuitem" tabindex="-1" id="user-menu-item-0">My Profile</a>

                            <a href="{{route('profile.projects')}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                               role="menuitem" tabindex="-1" id="user-menu-item-1">Projects</a>

                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                   role="menuitem" tabindex="-1" id="user-menu-item-1">Sign
                                    out</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="mobilemenue = !mobilemenue"
                        class="bg-gray-800 inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>

                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="md:hidden absolute bg-gray-800 w-full" id="mobile-menu" x-show="mobilemenue"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95" @click.away="mobilemenue = false">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{route('dashboard')}}" class="@if(Route::is('dashboard')) bg-gray-900 @endif text-white block px-3 py-2 rounded-md text-base font-medium"
               aria-current="page">Dashboard
            </a>
        </div>

        <div class="pt-4 pb-3 border-t border-gray-700">
            <!-- profile menue for mobile -->
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                         src="https://png.pngtree.com/png-vector/20190710/ourmid/pngtree-user-vector-avatar-png-image_1541962.jpg"
                         alt="">
                </div>
                <div class="ml-3 capitalize">
                    <div class="text-base font-medium leading-none text-white">{{Auth::user()->name}}</div>
                    <div class="text-sm font-medium leading-none text-gray-400">{{collect(Auth::user()->getRoleNames())->first()}}</div>
                </div>
                <a href="{{route('notifications.index')}}"
                        class="flex ml-auto bg-gray-800 flex-shrink-0 p-1 rounded-full text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <p class="text-red-500 font-bold">{{count(auth()->user()->unreadNotifications)}}</p>
                </a>

            </div>
            <div class="mt-3 px-2 space-y-1">
                <a href="{{route('profile.user')}}"
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your
                    Profile</a>

                <a href="{{route('profile.projects')}}"
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Your Projects</a>

                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit"
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-400 hover:text-white hover:bg-gray-700">Sign out
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>
<!-- End Top navbar -->
