<div class="relative min-h-screen flex items-center justify-center bg-white py-12 px-4 sm:px-6 lg:px-8 bg-white bg-no-repeat bg-cover relative items-center">
    <div class="absolute bg-gray-200 inset-0 z-0"></div>
    <div class="sm:max-w-lg w-full p-10 bg-white rounded-xl z-10">
        <div class="text-center">
            <h2 class="mt-5 text-3xl font-bold text-gray-900">
                Login
            </h2>
            <p class="mt-2 text-sm text-gray-400">Please, authenticate</p>
        </div>
        <form class="mt-8 space-y-3" action="{{route('authentication')}}" method="POST">
            @csrf
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Email</label>
                <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="email" name="email" placeholder="example@example.com">
            </div>
            <div class="grid grid-cols-1 space-y-2">
                <label class="text-sm font-bold text-gray-500 tracking-wide">Password</label>
                <input class="text-base p-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500" type="password" name="password" placeholder="Password">
            </div>
            <div>
                <button type="submit" class="my-5 w-full flex justify-center bg-blue-500 text-gray-100 p-4  rounded-full tracking-wide font-semibold  focus:outline-none focus:shadow-outline hover:bg-blue-600 shadow-lg cursor-pointer transition ease-in duration-300">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
