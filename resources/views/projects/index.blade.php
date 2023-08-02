@php
    $filters = new \App\Helpers\FilterHelper(
        type: 'project'
    );
@endphp
<x-main :title="__('Project list')">
    <div class="flex flex-col p-5">
        <x-filter :filters="$filters->main()"/>
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

            <table class="table-auto min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th scope="col" class="px-6 py-4">#</th>
                    <th scope="col" class="px-6 py-4">Title</th>
                    <th scope="col" class="px-6 py-4 w-32">Description</th>
                    <th scope="col" class="px-6 py-4">Deadline</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                    <th scope="col" class="px-6 py-4">Created at</th>
                    <th scope="col" class="px-6 py-4">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($projects as $project)
                    <tr
                        class="border-b transition duration-300 ease-in-out hover:bg-gray-200">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$project->id}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$project->title}}</td>
                        <td class="whitespace-nowrap px-6 py-4 w-32 truncate max-w-xs">{{$project->description}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$project->deadline}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$project->status}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$project->created_at}}</td>
                        <td class="whitespace-nowrap px-6 py-4 flex justify-between">
                            <a href="{{route('projects.show', $project)}}" class="bg-gray-200 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">Show</a>
                            <a href="{{route('projects.edit', $project)}}" class="bg-gray-200 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">Edit</a>
                            <form action="{{route('projects.destroy', $project)}}" method="post">
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
                {{$projects->links()}}
            </div>
        </div>
    </div>
</x-main>
