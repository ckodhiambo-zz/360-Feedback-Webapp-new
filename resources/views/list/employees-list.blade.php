<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

    <title>Employees</title>
</head>

<body>
@extends('layouts.admin')

@section('title')
    List-of-Employees
@endsection
@section('content')
    <section>
        <form method="post" action="{{ route('employee.import') }}" enctype="multipart/form-data">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header" style="background-color: #0000A0 !important;">
                            <div class="card-title text-white ">
                                <h5>360° Feedback List of Employees</h5>
                            </div>
                        </div>
                        <br>
                        @csrf
                        <table id="myTable" class="table table-striped">
                            <thead>
                            <tr>
                                <th>F.name</th>
                                <th>L.name</th>
                                <th>Email</th>
                                <th>Business Unit</th>
                                <th>Department</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($employees as $employee)
                                <tr>
                                    <td style="font-family: Verdana, sans-serif;">{{ $employee ->  first_name}}</td>
                                    <td style="font-family: Verdana, sans-serif;">{{ $employee ->  last_name}}</td>
                                    <td style="font-family: Verdana, sans-serif;">{{ $employee -> email }}</td>
                                    @foreach($employee->companies as $item)
                                        <td style="font-family: Verdana, sans-serif;">{{ $item->name }}</td>
                                    @endforeach

                                    @foreach($employee->departments as $item)
                                        <td style="font-family: Verdana, sans-serif;">{{ $item->name }}</td>
                                    @endforeach
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-info dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">More Actions
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="#">Profile</a>
                                                <hr>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

        </form>
    </section>


    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>

</body>
</html>
@endsection
