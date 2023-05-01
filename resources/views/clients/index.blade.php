<x-main :title="__('Clients list')">
    <div class="flex flex-col px-5">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

                    <table class="table-auto min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                        <tr>
                            <th scope="col" class="px-6 py-4">#</th>
                            <th scope="col" class="px-6 py-4">Company</th>
                            <th scope="col" class="px-6 py-4">VAT</th>
                            <th scope="col" class="px-6 py-4">Address</th>
                            <th scope="col" class="px-6 py-4">Created at</th>
                            <th scope="col" class="px-6 py-4">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr
                                    class="border-b transition duration-300 ease-in-out hover:bg-gray-200">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium">{{$client->id}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$client->company}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$client->VAT}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$client->address}}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{$client->created_at}}</td>
                                    <td class="whitespace-nowrap px-6 py-4 flex justify-around gap-5">
                                        <a href="{{route('clients.edit', $client)}}" class="bg-gray-200 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">Edit</a>
                                        <form action="{{route('clients.destroy', $client)}}" method="post">
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
                    {{$clients->links()}}
                </div>
            </div>
    </div>
</x-main>
