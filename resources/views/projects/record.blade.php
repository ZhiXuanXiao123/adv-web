@extends('layout')

@section('content')

<head>

    <title>Employee</title>

</head>



<h1 class="title">Employee Record</h1>


<form method="POST" action="/employees" style="margin-bottom: 1em;">
    @csrf
    <div class="field">
        <label class="label" for="title">Employee ID</label>
        <div class="control">
            <input type="text" class="input {{$errors->has('employeeid')? ' is-danger' : ''}}" name="employeeid" placeholder="Employee ID" value="{{old('employeeid')}}">
        </div>
    </div>

    <div class="field">
        <label class="label" for="title">Employee Name</label>
        <div class="control">
        <input type="text" class="input {{$errors->has('employeename')? ' is-danger' : ''}}" name="employeename" placeholder="Employee name" value="{{old('employeename')}}">
    </div>
    </div>

    <div class="field">
        <label class="label" for="department">Department</label>
        <div class="control">
        <input name="department" class="input {{$errors->has('department')? ' is-danger' : ''}}" placeholder="Department" value="{{old('department')}}">
    </div>
    </div>
    <div class="field">

        <div class="control">
        <button type="submit" class="button is-link">record</button>
    </div>
    </div>


    @if ($errors ->all())
    <div class="notification is-danger">
        <ul>
            @foreach($errors-> all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
        @endif
</form>
<form method="GET" action="/employees"  style="margin-bottom: 1em;">
    @csrf
    <div class="field">
        <div class="control">
            <button type="submit"  class="button is-link">Cancel</button>
        </div>
    </div>
</form>

@endsection
