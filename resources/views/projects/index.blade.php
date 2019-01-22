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
            Employee List
        </div>

        @if (Route::has('login'))

            <div class="links">
                <div style="margin-bottom: 1em;" class="links">
                    @auth
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ url('/home') }}">function</a>
                        <a href="{{ url('/search') }}">Search Employees</a>
                        <a href="{{ url('/employees/record') }}">Add Employees</a>
                </div>


                <tr></tr>
                <table border="2px" cellpadding="3" cellspacing="0" style="width: 60%;margin:auto">
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Department</th>
                        <th>update</th>
                        <th>Delete</th>
                    </tr>
                    @foreach($employees as $employees)
                        <tr>

                            <td><a href="/employees/{{$employees->id}}">{{$employees->employeeid}}</a></td>
                            <td><a> {{$employees->employeename}}</a></td>
                            <td><a> {{$employees->department}}</a></td>


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
                </table>


                @else
                    <h2>Please login!</h2>
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif


    </div>
</div>
</body>

</html>
