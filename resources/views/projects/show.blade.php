<x-main :title="$project->title">
    <div class="flex h-screen bg-gray-100">
        <div class="mx-auto pt-12">

            <div class="flex gap-6 m-5">

                <form action="{{route('projects.destroy', $project->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Delete
                    </button>
                </form>

                <a href="{{route('projects.edit', $project->id)}}" class="inline-flex items-center px-4 py-2 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
                    </svg>
                    Edit
                </a>
            </div>

            <section class="bg-gray-200 animate-pulse rounded-lg">
                <div class="container px-6 py-10 mx-auto">
                    <h1 class="w-48 h-2 mx-auto bg-gray-200 rounded-lg dark:bg-gray-700"></h1>

                    <p class="w-64 h-2 mx-auto mt-4 bg-gray-200 rounded-lg dark:bg-gray-700"></p>
                    <p class="w-64 h-2 mx-auto mt-4 bg-gray-200 rounded-lg sm:w-80 dark:bg-gray-700"></p>
                    <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 sm:grid-cols-2 xl:grid-cols-4 lg:grid-cols-3">
                        @isset($image)
                            <img src="{{$image->getUrl()}}" alt="Project Image">
                        @endisset

                        <div class="rounded-lg shadow-2xl max-w-full px-5 py-3 hover:scale-110 transition-all ease-in-out">
                            <div class="flex gap-3">
                                <h1 class="w-56 h-2 mt-4 rounded-lg">Title: </h1>
                                <h1 class="w-56 h-2 mt-4 rounded-lg text-gray-500 font-semibold">{{$project->title}}</h1>
                            </div>
                            <div class="flex gap-3">
                                <h1 class="w-56 h-2 mt-4 rounded-lg">Description: </h1>
                                <h1 class="w-56 h-2 mt-4 rounded-lg text-gray-500 font-semibold h-full">{{$project->description}}</h1>
                            </div>
                            <div class="flex gap-3 pb-3">
                                <h1 class="w-56 h-2 mt-4 rounded-lg">Status: </h1>
                                <h1 class="w-56 h-2 mt-4 rounded-lg text-gray-500 font-semibold h-full">{{$project->status}}</h1>
                            </div>
                        </div>

                            @if($project->user)
                                <a href="{{route('users.show', $project->user->id)}}">
                                    <div class="rounded-lg shadow-2xl max-w-full px-5 py-3 hover:scale-110 transition-all ease-in-out cursor-pointer">
                                        <div class="flex gap-3 pb-3">
                                            <h1 class="w-56 h-2 mt-4 rounded-lg">Related User: </h1>
                                            <h1 class="w-56 mt-4 rounded-lg text-gray-500 font-semibold h-full">{{$project->user->name}}</h1>
                                        </div>
                                    </div>
                                </a>
                            @endif
                            @if($project->client)
                                <a href="{{route('clients.show', $project->client->id)}}">
                                    <div class="rounded-lg shadow-2xl max-w-full px-5 py-3 hover:scale-110 transition-all ease-in-out cursor-pointer">
                                        <div class="flex gap-3 pb-3">
                                            <h1 class="w-56 h-2 mt-4 rounded-lg">Related Client: </h1>
                                            <h1 class="w-56 mt-4 rounded-lg text-gray-500 font-semibold h-full">{{$project->client->company}}</h1>
                                        </div>
                                    </div>
                                </a>
                            @endif
                    </div>
                </div>
            </section>
        </div>
    </div>
</x-main>
