<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <title>Register Employee</title>
</head>
<body>
{{--@extends('layouts.admin')--}}

{{--@section('title')--}}
{{--    Register-Employee--}}
{{--@endsection--}}

{{--@section('content')--}}
<section>
    <div class="container">
        {{--        <div class="col-sm-8">--}}
        <div class="card">
            <div class="card-body">
                <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                    <h5>360° Feedback Employee Registration</h5>
                </div>
                <br>

                <form method="post" action="{{ route('post.create') }}">
                @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="first_name" style="color:#0000A0;font-weight:bold;">First name</label>
                            <input type="text" class="form-control" id="first_name" placeholder="First name"
                                   name="first_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name" style="color:#0000A0;font-weight:bold;">Last name</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Last name"
                                   name="last_name">
                        </div>
                    </div>

                <!-- Email input -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4" style="color:#0000A0;font-weight:bold;">Email</label>
                            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="position" style="color:#0000A0;font-weight:bold;">Position</label>
                            <input type="text" class="form-control" id="position" placeholder="Position"
                                   name="position">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="company_id" class="form-label"
                               style="color:#0000A0;font-weight:bold;">Company/Business
                            Unit</label>
                        <br>
                        <br>
                        <select class="custom-select" name="company_id" id="company_id" style="margin-top:-45px;"
                                required>
                            <option selected>--Select Company--</option>
                            @foreach ($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group" id="company_{{$company->id}}">
                        <label for="department_id" class="form-label"
                               style="color:#0000A0;font-weight:bold;">Department</label>
                        <br>
                        <br>
                        <select class="custom-select" name="department_id" style="margin-top:-45px;" required>
                            <option selected>--Select Department--</option>
                            @foreach ($companies as $company)
                                @foreach ($company->departments as $department)
                                    <option class="departments company_{{$company->id}}"
                                            value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            @endforeach
                        </select>

                    </div>
                    <!-- Submit button -->
                    <div class="form-group">
                        <button class="btn btn-outline-success btn-lg float-right"
                                type="submit">
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>
        {{--        </div>--}}

    </div>

</section>
{{--@endsection--}}
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"--}}
{{--            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"--}}
{{--            crossorigin="anonymous"></script>--}}

{{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"--}}
{{--            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"--}}
{{--            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"--}}
{{--            crossorigin="anonymous"></script>--}}

<script>
    $('#company_id').change((event) => {
        $('.departments').hide();
        $(`.company_${event.target.value}`).show();
    });
    $(document).ready(function () {
        $('.departments').hide();
    });
</script>
<!-- MDB -->
{{--    <script--}}
{{--        type="text/javascript"--}}
{{--        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"--}}
{{--    ></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"--}}
{{--            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"--}}
{{--            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"--}}
{{--            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"--}}
{{--            crossorigin="anonymous"></script>--}}
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"--}}
{{--            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
</body>
</html>

