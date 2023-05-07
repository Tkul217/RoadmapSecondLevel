<x-main :title="$user->name">
    <div class="flex h-screen bg-gray-100">
        <div class="mx-auto pt-12">
            <section class="bg-gray-200 animate-pulse rounded-lg">
                <div class="container px-6 py-10 mx-auto">
                    <h1 class="w-48 h-2 mx-auto bg-gray-200 rounded-lg dark:bg-gray-700"></h1>

                    <p class="w-64 h-2 mx-auto mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                    <p class="w-64 h-2 mx-auto mt-4 bg-gray-200 rounded-lg sm:w-80 dark:bg-gray-700"></p>

                    <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 sm:grid-cols-2 xl:grid-cols-4 lg:grid-cols-3">

                        <div class="rounded-lg shadow-2xl max-w-full px-5 py-3 hover:scale-110 transition-all ease-in-out">
                            <div class="flex gap-3">
                                <h1 class="w-56 h-2 mt-4 rounded-lg">Name: </h1>
                                <h1 class="w-56 h-2 mt-4 rounded-lg text-gray-500 font-semibold">{{$user->name}}</h1>
                            </div>
                            <div class="flex gap-3">
                                <h1 class="w-56 h-2 mt-4 rounded-lg">Email: </h1>
                                <h1 class="w-56 h-2 mt-4 rounded-lg text-gray-500 font-semibold h-full">{{$user->email}}</h1>
                            </div>
                            <div class="flex gap-3 pb-3">
                                <h1 class="w-56 h-2 mt-4 rounded-lg">Created at: </h1>
                                <h1 class="w-56 h-2 mt-4 rounded-lg text-gray-500 font-semibold h-full">{{$user->created_at}}</h1>
                            </div>
                        </div>

                        <a href="">
                            <div class="rounded-lg shadow-2xl max-w-full px-5 py-3 hover:scale-110 transition-all ease-in-out cursor-pointer">
                                <div class="flex gap-3 pb-3">
                                    <h1 class="w-56 mt-4 rounded-lg text-gray-500 font-bold h-full">Show projects</h1>
                                </div>
                            </div>
                        </a>

                        <a href="">
                            <div class="rounded-lg shadow-2xl max-w-full px-5 py-3 hover:scale-110 transition-all ease-in-out cursor-pointer">
                                <div class="flex gap-3 pb-3">
                                    <h1 class="w-56 mt-4 rounded-lg text-gray-500 font-bold h-full">Show tasks</h1>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-main>
