@props(['fields' => [], 'actions' => [], 'rows' => [], 'model' => null])

<table class="table-auto min-w-full text-left text-sm font-light">
    <thead class="border-b font-medium dark:border-neutral-500">
    <tr>
        @foreach($fields as $field)
            <th scope="col" class="px-6 py-4">{{$field}}</th>
        @endforeach
        @if($actions)
            <th scope="col" class="px-6 py-4">Actions</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($rows as $row)
        <tr class="border-b transition duration-300 ease-in-out hover:bg-gray-200">
            @foreach($fields as $field)
                <td class="whitespace-wrap px-6 py-4 font-medium">
                    @if(is_object($row[$field]))
                        @switch(get_class($row[$field]))
                            @case(\App\Models\User::class)
                                {{$row[$field]->name}}
                                @break
                            @case(\App\Models\Project::class)
                                {{$row[$field]->title}}
                                @break
                            @case(\App\Models\Task::class)
                                {{$row[$field]->title}}
                                @break
                        @endswitch
                    @else
                        {{ $row[$field] }}
                    @endif
                </td>
                @if(count($fields) <= $loop->iteration)
                    @foreach($actions as $action)
                        @switch($action)
                            @case('show')
                                <td class="whitespace-wrap px-6 py-4 font-medium truncate">
                                    <a href="{{route($model . '.' . $action, $row)}}" class="bg-gray-200 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">{{$action}}</a>
                                </td>
                                @break
                            @case('edit')
                                <td class="whitespace-wrap px-6 py-4 font-medium truncate">
                                    <a href="{{route($model . '.' . $action, $row)}}" class="bg-gray-200 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">{{$action}}</a>
                                </td>
                                @break
                            @case('destroy')
                                <td>
                                    <form action="{{route($model . '.' . $action, $row)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-400 text-md rounded font-semibold text-gray-700 p-1.5 hover:scale-110 transition-all ease-in-out">{{$action}}</button>
                                    </form>
                                </td>
                                @break
                        @endswitch
                    @endforeach
                @endif
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>


<div class="py-5">
    {{$rows->links()}}
</div>
