<x-main :title="__('Users list')">
    <div class="flex flex-col px-5">
        <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

            <table class="table-auto min-w-full text-left text-sm font-light">
                <thead class="border-b font-medium dark:border-neutral-500">
                <tr>
                    <th scope="col" class="px-6 py-4">#</th>
                    <th scope="col" class="px-6 py-4">Name</th>
                    <th scope="col" class="px-6 py-4">Email</th>
                    <th scope="col" class="px-6 py-4">Created at</th>
                    <th scope="col" class="px-6 py-4">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr
                        class="border-b transition duration-300 ease-in-out hover:bg-gray-200">
                        <td class="whitespace-nowrap px-6 py-4 font-medium">{{$user->id}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$user->name}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$user->email}}</td>
                        <td class="whitespace-nowrap px-6 py-4">{{$user->created_at}}</td>
                        <td class="whitespace-nowrap px-6 py-4 flex justify-between">
                            <a href="{{route('users.show', $user)}}" class="bg-gray-200 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">Show</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>


            <div class="py-5">
                {{$users->links()}}
            </div>
        </div>
    </div>
</x-main>
