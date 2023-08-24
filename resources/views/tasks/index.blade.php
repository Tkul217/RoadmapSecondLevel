<x-main :title="__('Tasks list')">
    <div class="flex flex-col p-5">
        <x-filter/>
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

            <table class="table-auto min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th scope="col" class="px-6 py-4">#</th>
                    <th scope="col" class="px-6 py-4">Related User</th>
                    <th scope="col" class="px-6 py-4">Related Project</th>
                    <th scope="col" class="px-6 py-4">Title</th>
                    <th scope="col" class="px-6 py-4 w-32">Description</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tasks as $task)
                    <tr
                        class="border-b transition duration-300 ease-in-out hover:bg-gray-200">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$task->id}}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <div class="font-semibold">
                                {{$task->user->name}}
                            </div>
                            <div class="text-gray-700">
                                {{$task->user->id}}
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <div class="font-semibold">
                                {{$task->project->title ?? null}}
                            </div>
                            <div class="text-gray-700">
                                {{$task->project->id ?? null}}
                            </div>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">{{$task->title}}</td>
                        <td class="whitespace-nowrap px-6 py-4 w-32 truncate max-w-xs">{{$task->description}}</td>
                        <td class="whitespace-nowrap px-6 py-4">
                            @if($task->status === \App\Models\Task::ACTIVE)
                                <span class="inline-flex items-center m-2 px-3 py-1 bg-green-200 hover:bg-green-300 rounded-full text-sm font-semibold text-green-600">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
                                    <span class="ml-1">
                                        {{$task->status}}
                                    </span>
                                </span>
                            @elseif($task->status === \App\Models\Task::IN_PROGRESS)
                                <span class="inline-flex items-center m-2 px-3 py-1 bg-blue-200 hover:bg-blue-300 rounded-full text-sm font-semibold text-blue-600">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
                                    <span class="ml-1">
                                        {{$task->status}}
                                    </span>
                                </span>
                            @elseif($task->status === \App\Models\Task::CLOSED)
                                <span class="inline-flex items-center m-2 px-3 py-1 bg-red-200 hover:bg-red-300 rounded-full text-sm font-semibold text-red-600">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm3.5-9c.83 0 1.5-.67 1.5-1.5S16.33 8 15.5 8 14 8.67 14 9.5s.67 1.5 1.5 1.5zm-7 0c.83 0 1.5-.67 1.5-1.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11zm3.5 6.5c2.33 0 4.31-1.46 5.11-3.5H6.89c.8 2.04 2.78 3.5 5.11 3.5z"/></svg>
                                    <span class="ml-1">
                                        {{$task->status}}
                                    </span>
                                </span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-6 py-4 flex justify-between">
                            <a href="{{route('tasks.show', $task)}}" class="bg-gray-200 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">Show</a>
                            <a href="{{route('tasks.edit', $task)}}" class="bg-gray-200 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">Edit</a>
                            <form action="{{route('tasks.destroy', $task)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-400 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            <div class="py-5">
                {{$tasks->links()}}
            </div>
        </div>
    </div>
</x-main>
