@extends('app')


@section('content')
    <div>
    @include('common.error')
    <form action="{{url('task')}}" method="post">
        <label for="name">Task</label>
        <input type="text" name="name" id="name">
        <button type="submit">Add</button>
        {{csrf_field()}}
    </form>
    </div>

    @if($tasks->count())
        <table>
            <thead>
                <th>Task</th>
                <th>&nbsp;</th>
            </thead>
            <body>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{$task->name}}</td>
                    <td>
                    <form action = "{{url('task/' . $task->id) }}" method = "post">
                    <button type="submit">X</button>
                    {{method_field('DELETE')}}
                    {{csrf_field()}}
                    </td>
                </tr>
            @endforeach
            </body>
        </table>
    @endif
@endsection
