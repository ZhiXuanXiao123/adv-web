@extends('layout')

@section('content')

    <h1 class="title"> Employee Message</h1>
    <div class="box">
        <div style="margin-bottom: 1em;" class="field">
            <div style="font-size:20px"> Employee Name:</div>
            <div style="color:#F00; font-size:15px"> {{$employees->employeename}}</div>
            <div style="font-size:20px"> Department:</div>
            <div class="link" style="color:#F00; font-size:15px"> {{$employees->department}}</div>
        </div>
    </div>
    <div class="box">
        <div style="margin-bottom: 1em;" class="field">

            <form method="POST" action="/employees/{{$employees->id}}/tasks">
                @csrf
                <div class="field" style="margin-bottom: 1em;">
                    <label class="label" for="description">Description</label>
                    <div>
                        <input type="text" class="input" name="description" placeholder="Description">
                    </div>
                </div>

                <div class="field" style="margin-bottom: 1em;">
                    <div class="control">
                        <button type="submit" class="button is-link">Adding</button>
                    </div>
                </div>
            </form>
            @if ($employees->tasks->count())
                <div style="margin-bottom: 2em;">
                    @foreach($employees->tasks as $task)
                        <div>
                            <form method="POST" action="/tasks/{{$task->id}}">
                                @method('PATCH')
                                @csrf
                                <label class="checkbox" for="completed">
                                    <input type="checkbox" name="completed"
                                           onChange="this.form.submit()" {{$task->completed ? 'checked' :''}}>
                                    {{$task->description}}
                                </label>
                            </form>
                        </div>
                    @endforeach
                </div>
            @endif
            <td>

            </td>
        </div>

    </div>


    <form method="GET" action="/employees/{{$employees->id}}/edit" style="margin-bottom: 1em;">
        @csrf
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Edit</button>
            </div>
        </div>
    </form>
    <form method="GET" action="/employees" style="margin-bottom: 1em;">
        @csrf
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Back</button>
            </div>
        </div>
    </form>




@endsection
