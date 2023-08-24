<x-main :title="__('Create Project')">

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

    <div class="flex-col max-w-xs px-10">
        <form action="{{route('profile.save')}}" method="post">
            @csrf
            <div>
                <label for="name" class="text-gray-500">
                    Update your name
                </label>
                <input value="{{$user->name}}" id="name" name="name" placeholder="Bob" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
            </div>
            <div>
                <label for="email" class="text-gray-500">
                    Update your email
                </label>
                <input value="{{$user->email}}" id="email" name="email" placeholder="example@example.com" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
            </div>
            <div class="py-3">
                <button class="bg-indigo-100 text-md rounded font-semibold text-gray-700 px-8 py-3 hover:scale-110 transition-all ease-in-out" type="submit">Save</button>
            </div>
        </form>
    </div>
</x-main>
