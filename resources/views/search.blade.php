<!doctype html>
<html>

<head>
    <title></title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;

        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="content">

    <div class="title m-b-md">
        Employee Searching
    </div>

    <div style="margin-bottom: 1em;" class="links">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/employees') }}">Employee</a>
        <a href="{{ url('/employees/record') }}">Add Employees</a>
    </div>
    <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="q"
                   placeholder="Search users"> <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search">Search</span>
            </button>
        </span>
        </div>
    </form>

    <div class="container">
        @if(isset($details))
            <p> The Search results for your query <b> {{ $query }} </b> are :</p>
            <table border="2px" cellpadding="3" cellspacing="0" style="width: 60%;margin:auto">
                <thead>
                <tr>
                    <th>Employee ID</th>
                    <th>Employee Name</th>
                    <th>Department</th>
                    <th>update</th>
                    <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($details as $employees)
                    <tr>
                        <td>{{$employees->employeeid}}</td>
                        <td>{{$employees->employeename}}</td>
                        <td>{{$employees->department}}</td>
                        <td>
                            <form method="GET" action="/employees/{{$employees->id}}/edit">
                                @csrf
                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-link">Update</button>
                                    </div>
                                </div>
                            </form>
                        </td>

                        <td>
                            <form method="POST" action="/employees/{{$employees->id}}">
                                @csrf
                                @method('DELETE')
                                <div class="field">
                                    <div class="control">
                                        <button type="submit" class="button is-link">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>


</body>

</html>
