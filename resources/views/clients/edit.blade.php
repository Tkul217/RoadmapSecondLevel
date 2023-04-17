<x-main :title="__('Edit Client')">
    <div class="flex h-screen bg-gray-100">
        <div class="mx-auto pt-12">
            <form action="{{route('clients.update', $client)}}" method="post">
                @csrf
                @method('PATCH')
                <div class="bg-white rounded-lg shadow">
                    <div class="flex">
                        <div class="flex-1 py-5 pl-5 overflow-hidden">
                            <h1 class="inline text-2xl font-semibold leading-none">Create Client</h1>
                        </div>
                    </div>
                    <div class="px-5 pb-5">
                        <input value="{{$client->company}}" name="company" placeholder="Company" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                        <input value="{{$client->address}}" name="address" placeholder="Address" class=" text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                        <input value="{{$client->VAT}}" name="VAT" placeholder="VAT" class="max-w-[30%] text-black placeholder-gray-600 w-full px-4 py-2.5 mt-2 text-base   transition duration-500 ease-in-out transform border-transparent rounded-lg bg-gray-200  focus:border-blueGray-500 focus:bg-white dark:focus:bg-gray-800 focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2 ring-gray-400 focus:text-white">
                    </div>
                    <div class="px-5 pb-5">
                        <button class="bg-indigo-100 text-md rounded font-semibold text-gray-700 px-8 py-3 hover:scale-110 transition-all ease-in-out" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-main>
