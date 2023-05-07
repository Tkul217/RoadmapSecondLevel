<x-main :title="__('Update Project')">
    <div class="flex h-screen bg-gray-100">
        <div class="mx-auto pt-12">
            <form action="{{route('projects.update', $project)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="bg-white rounded-lg shadow">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Update Project</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <input value="{{$project->title}}" name="title" placeholder="Title" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                        <textarea name="description" placeholder="Description" class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                            {{$project->description}}
                        </textarea>
                        <input value="{{$project->deadline}}" name="deadline" placeholder="Deadline" type="date" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                        <select name="client_id" class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                            <option value="">{{__('Select an a Client')}}</option>
                            @foreach($clients as $client)
                                <option @if($project->client_id === $client->id) selected @endif value="{{$client->id}}">{{$client->company}}</option>
                            @endforeach
                        </select>
                        <select name="user_id" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                            <option value="">{{__('Select an a User')}}</option>
                            @foreach($users as $user)
                                <option @if($project->user_id === $user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <select name="status" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                            <option value="">{{__('Select an a Status')}}</option>
                            @foreach($statuses as $name => $status)
                                <option @if($project->status === $status) selected @endif value="{{$status}}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="px-5 pb-5">
                        <button class="bg-indigo-100 text-md rounded font-semibold text-gray-700 px-8 py-3 hover:scale-110 transition-all ease-in-out" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-main>
