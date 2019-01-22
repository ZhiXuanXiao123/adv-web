@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" >
            <div class="card" >
                <div class="card-header">Function</div>
                <div class="card-body">
                    <form style="margin-bottom: 1em;">
                        @csrf
                        <a href="{{ url('/employees/record') }}">Add Employees</a><p></p>
                        <a href="{{ url('/search') }}">Search Employees</a><p></p>
                        <a href="{{ url('/employees') }}">Employee</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
