<div class="sidebar max-h-screen top-0 h-screen bg-gray-800 text-blue-100 w-64 fixed inset-y-0 left-0 transform transition duration-200 ease-in-out z-50"
     x-data="{
         open: true,
     }" x-on:togglesidebar.window=" open = !open" x-show="true"
     :class="open === true ? 'md:translate-x-0 md:sticky ':'-translate-x-full' ">


    <header class=" h-[64px] py-2 shadow-lg px-4 md:sticky top-0 bg-gray-800 z-40">
        <!-- logo -->
        <a href="{{route('dashboard')}}" class="text-white flex items-center space-x-2 group hover:text-white">
            <div>
                <svg class="h-8 w-8 transition-transform duration-300 group-hover:-rotate-45 " fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>

            <div>
                <span class="text-2xl font-extrabold">LaravelDaily</span>
                <span class="text-xs block">Project Management</span>
            </div>
        </a>
    </header>


    <x-navbar/>


</div>
