@extends('layout')

@section('content')

    <h1 class="title">Edit Employee</h1>

    <form method="POST" action="/employees/{{$employees->id}}" style="margin-bottom: 1em;" >
        @csrf
        @method('PATCH')

        <div class="field">

            <label class="label" for="title">Employee ID</label>


            <div class="control">

                <input type="text" class="input" name="employeeid" placeholder="Employee ID" value="{{ $employees->employeeid }}">

            </div>

        </div>


        <div class="field">

            <label class="label" for="title">Employee Name</label>


            <div class="control">

                <input type="text" class="input" name="employeename" placeholder="Employee Name" value="{{ $employees->employeename }}">

            </div>

        </div>

        <div class="field">

            <label class="label" for="department">Department</label>


            <div class="control">

                <input type="text" class="input" name="department" placeholder="Department" value="{{ $employees->department }}">

            </div>

        </div>

        <div class="field">

            <div class="control">

                <button type="submit" class="button is-link">Update</button>

            </div>

        </div>



    </form>


    <form method="POST" action="/employees/{{$employees->id}}">
        @csrf
        @method('DELETE')

        <div class="field">

            <div class="control">

                <button type="submit" class="button is-link">Delete</button>

            </div>

        </div>
    </form>








@endsection
