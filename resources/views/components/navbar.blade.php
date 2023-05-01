<!-- nav -->
<nav class="px-4 pt-4 scroller overflow-y-scroll max-h-[calc(100vh-64px)]" x-data="{
    selected: '',
    init(){
        if (@js(Route::is('clients.*'))){
            this.selected = 'Clients';
        }
        else if (@js(Route::is('projects.*'))){
            this.selected = 'Projects';
        }
        else if (@js(Route::is('tasks.*'))){
            this.selected = 'Tasks';
        }
        else if (@js(Route::is('users.*'))){
            this.selected = 'Users';
        }
        else {
            return;
        }
    }
}">
    <ul class="flex flex-col space-y-2">

        <!-- ITEM -->
        <li class="text-sm text-gray-500 ">
            <a href="{{route('dashboard')}}"
               class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700 @if(Route::is('dashboard')) bg-gray-700 text-white @endif">
                <div class="pr-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                </div>
                <div>Dashboard</div>
            </a>
        </li>

        <!-- Section Devider -->
        <div class="section border-b pt-4 mb-4 text-xs text-gray-600 border-gray-700 pb-1 pl-3">
            Managment
        </div>

        <!-- List ITEM -->
        <li class="text-sm text-gray-500 ">
            <a href="#" @click.prevent="selected = (selected === 'Users' ? '':'Users')"
               class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                <div class="pr-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>Users</div>
                <div class="absolute right-1.5 transition-transform duration-300"
                     :class="{ 'rotate-180': (selected === 'Users') }">
                    <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </a>


            <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                 :style="(selected === 'Users') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                    <!-- Item -->
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('users.index')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div> Users List </div>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="text-sm text-gray-500 ">
            <a href="#" @click.prevent="selected = (selected === 'Clients' ? '':'Clients')"
               class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700 @if(Route::is('clients.*')) bg-gray-700 text-white @endif">
                <div class="pr-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div>Clients</div>
                <div class="absolute right-1.5 transition-transform duration-300"
                     :class="{ 'rotate-180': (selected === 'Clients') }">
                    <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </a>


            <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                 :style="(selected === 'Clients') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                    <!-- Item -->
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('clients.index')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div> Clients List </div>
                        </a>
                    </li>
                    <!-- Item -->
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('clients.create')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div> Create Client </div>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- List ITEM -->
        <li class="text-sm text-gray-500 ">
            <a href="#" @click.prevent="selected = (selected === 'Projects' ? '':'Projects')"
               class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700 @if(Route::is('projects.*')) bg-gray-700 text-white @endif">
                <div class="pr-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z" />
                    </svg>
                </div>
                <div>Projects</div>
                <div class="absolute right-1.5 transition-transform duration-300"
                     :class="{ 'rotate-180': (selected === 'Projects') }">
                    <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </a>


            <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                 :style="(selected === 'Projects') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                    <!-- Item -->
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('projects.index')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div>List </div>
                        </a>
                    </li>
                    <!-- Item -->
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('projects.create')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div> Create Project </div>
                        </a>
                    </li>
                </ul>
            </div>
        </li>


        <!-- List ITEM -->
        <li class="text-sm text-gray-500 ">
            <a href="#" @click.prevent="selected = (selected === 'Tasks' ? '':'Tasks')"
               class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700 @if(Route::is('tasks.*')) bg-gray-700 text-white @endif">
                <div class="pr-2">
                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <div>Tasks</div>
                <div class="absolute right-1.5 transition-transform duration-300"
                     :class="{ 'rotate-180': (selected === 'Tasks') }">
                    <svg class=" h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M19 9l-7 7-7-7" />
                    </svg>
                </div>
            </a>


            <div class="pl-4 pr-2 overflow-hidden transition-all transform translate duration-300 max-h-0 "
                 :style="(selected === 'Tasks') ? 'max-height: ' + $el.scrollHeight + 'px':''">
                <ul class="flex flex-col mt-2 pl-2 text-gray-500 border-l border-gray-700 space-y-1 text-xs">
                    <!-- Item -->
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('tasks.index')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div>List </div>
                        </a>
                    </li>
                    <!-- Item -->
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('tasks.user-tasks')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div> My tasks </div>
                        </a>
                    </li>
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('tasks.active-tasks')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div> Active Task </div>
                        </a>
                    </li>
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('tasks.progress-tasks')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div> In Progress </div>
                        </a>
                    </li>
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('tasks.closed-tasks')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div> Closed Task </div>
                        </a>
                    </li>
                    <li class="text-sm text-gray-500 ">
                        <a href="{{route('tasks.create')}}"
                           class="flex items-center w-full py-1 px-2 rounded relative hover:text-white hover:bg-gray-700">
                            <div> Create Task </div>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
















































    </ul>
</nav>
