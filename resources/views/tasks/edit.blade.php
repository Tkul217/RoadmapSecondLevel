<x-main :title="__('Update Task')">
    <div class="flex h-screen bg-gray-100">
        <div class="mx-auto pt-12">
            @if(!$errors->isEmpty())
                <div class="bg-red-50 border-l-8 border-red-900 mb-2">
                    <div class="flex items-center">
                        <div class="p-2">
                            <div class="flex items-center">
                                <div class="ml-2">
                                    <svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <p class="px-6 py-4 text-red-900 font-semibold text-lg">Please fix the
                                    following
                                    errors.</p>
                            </div>
                            <div class="px-16 mb-4">
                                @foreach($errors->all() as $error)
                                    <li class="text-md font-bold text-red-500 text-sm">{{$error}}</li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <form action="{{route('tasks.update', $data['id'])}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="bg-white rounded-lg shadow">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Update Task</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <input value="{{$data['title']}}" name="title" placeholder="Title" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                        <textarea name="description" placeholder="Description" class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                            {{$data['description']}}
                        </textarea>
                        <select name="project_id" class="text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                            <option value="">{{__('Select an a Project')}}</option>
                            @foreach($data['projects'] as $project)
                                <option @if($data['project_id'] === $project->id) selected @endif value="{{$project->id}}">{{$project->title}}</option>
                            @endforeach
                        </select>
                        <select name="user_id" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                            <option value="">{{__('Select an a User')}}</option>
                            @foreach($data['users'] as $user)
                                <option @if($data['user_id'] === $user->id) selected @endif value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>
                        <select name="status" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                            <option value="">{{__('Select an a Status')}}</option>
                            @foreach($data['statuses'] as $name => $status)
                                <option @if($data['status'] === $status) selected @endif value="{{$status}}">{{$name}}</option>
                            @endforeach
                        </select>
                        <input type="file" name="files[]" class="mt-5" multiple>
                    </div>
                    <div class="px-5 pb-5">
                        <button class="bg-indigo-100 text-md rounded font-semibold text-gray-700 px-8 py-3 hover:scale-110 transition-all ease-in-out" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-main>
