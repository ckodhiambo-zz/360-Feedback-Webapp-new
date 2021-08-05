<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
            integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
            integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT"
            crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <title>Ratings</title>
</head>
<style>
    section{
        margin-top: -20px;
    }
</style>
<body>
@extends('layouts.admin')
@section('title')
Summary-of-nominees
@endsection

@section('content')

<section>
    <div class="container">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                        <h5>360° Feedback Summary of your nominations</h5>
                    </div>
                    <hr>
                    <div class="card">
                        <h5 class="card-header">IMPORTANT TO NOTE!</h5>
                        <div class="card-body">
                            <p class="card-text">a) Here is a summary of your nominations.
                                Please <strong>review</strong> and modify (if necessary) by clicking on the <strong>"Edit"</strong>
                                button to return to the previous page.
                                If you are satisfied with your nominations you can proceed to rate your party of interest.
                            </p>
                            <p class="card-text">b) When you complete your survey, a link will be sent to the party you
                                have rated notifying him/her of your submission.</p>
                        </div>
                    </div>
                    <hr>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Business Unit</th>
                            <th scope="col">Relationship</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Kennedy Calvins</td>
                            <td>Tier Data Limited</td>
                            <td>Self</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Eric Mwendwa</td>
                            <td>Tier Data Limited</td>
                            <td>Peer</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary">Edit</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Isaac Kagechu</td>
                            <td>Tier Data Limited</td>
                            <td>Supervisor</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary">Edit</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="col">
                        <button type="button" class="btn btn-outline-success float-right" style="float: left;margin-bottom: 10px">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection
</body>


