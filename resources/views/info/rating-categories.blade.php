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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>Rating Groups</title>
    <style>
        section {
            padding: 40px;
        }
    </style>
</head>
<body>
@extends('layouts.admin')

@section('title')
    Participant-selection
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                            <h5>Assign Participants to the survey</h5>
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="department_id" class="form-label"
                                   style="color:#0000A0;font-weight:bold;">Department</label>
                            <select class="custom-select" name="department_id" style="margin-top:-45px;" required>
                                <option selected>--Select Department--</option>
                                <option value="Tier Data Limited">Tier Data Limited</option>
                                <option value="Centum Business Solutions">Centum Business Solutions</option>
                                <option value="Centum Capital">Centum Capital</option>
                                <option value="Tribus Limited">Tribus Limited</option>
                                <option value="Green blade">Green blade</option>
                            </select>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


</body>
</html>
