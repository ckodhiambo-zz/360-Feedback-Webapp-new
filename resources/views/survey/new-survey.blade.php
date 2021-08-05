<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>New Survey</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>

        .bs-example {
            margin: 20px;
        }

        * {
        . border-radius(0) !important;
        }

        #field {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
@extends('layouts.admin')

@section('title')
    Create Survey
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                        <h5>+ Create a new 360° Feedback Survey</h5>
                    </div>
                    <div class="bs-example">
                        <form action="{{ route('survey.create') }}" method="post">
                            @csrf
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseOne">1. What is the title of your new 360°
                                                Feedback survey?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                         data-parent="#accordionExample">
                                        <div class="card-body">

                                            <div class="form-group">
                                                <input type="text" class="form-control" id="inputEmail"
                                                       name="survey_title"
                                                       value=""
                                                       placeholder="Survey Title">
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseTwo">2. Briefly describe the purpose of your
                                                survey.
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="mb-3">
                                            <textarea class="form-control" id="validationTextarea"
                                                      placeholder="Survey Description" name="survey_description"
                                                      required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingSeven">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link" data-toggle="collapse"
                                                    data-target="#collapseSix">3. What are the categories to be assessed
                                                in
                                                the survey?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseSix" class="collapse" aria-labelledby="headingSix"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dynamic_field">
                                                        <tr>
                                                            <td><input type="text" name="category_name[]"
                                                                       placeholder="Category Name"
                                                                       class="form-control name_list"/></td>
                                                            <td>
                                                                <button type="button" name="add" id="add"
                                                                        class="btn btn-success">Add More
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseThree">4. What are the target rating
                                                measurements
                                                to be used in the survey?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered" id="dynamic_field1">
                                                        <tr>
                                                            <td><input type="text" name="ratings[1][]"
                                                                       placeholder="Rating Level"
                                                                       class="form-control name_list"/>
                                                                <br>
                                                                <div class="form-group">
                                                                    <select class="custom-select" name="ratings[1][]"
                                                                            required>
                                                                        <option selected>Select Rating Value</option>
                                                                        <option value="0">0</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                        <option value="6">6</option>
                                                                        <option value="7">7</option>
                                                                        <option value="8">8</option>
                                                                        <option value="9">9</option>
                                                                        <option value="10">10</option>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <button type="button" name="add_rating" id="add_rating"
                                                                        class="btn btn-success">Add More
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h2 class="mb-0">
                                            <button type="button" class="btn btn-link collapsed" data-toggle="collapse"
                                                    data-target="#collapseFour">5. What is the expected duration of the
                                                survey?
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                                         data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="form-group row">
                                                <label for="example-datetime-local-input" class="col-2 col-form-label">Start
                                                    Date and time</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="datetime-local"
                                                           value="2011-08-19T13:45:00" id="example-datetime-local-input"
                                                           name="start_date">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-datetime-local-input" class="col-2 col-form-label">End
                                                    Date and time</label>
                                                <div class="col-10">
                                                    <input class="form-control" type="datetime-local"
                                                           value="2011-08-19T13:45:00"
                                                           id="example-datetime-local-input-1"
                                                           name="end_date">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <button class="btn btn-outline-success me-md-2" type="submit">Save</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </section>


</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        var i = 1;
        $('#add').click(function () {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><input type="text" name="category_name[]" placeholder="Category Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
<script>
    $(document).ready(function () {
        var i = 1;
        $('#add_rating').click(function () {
            i++;
            $('#dynamic_field1').append(
                '<tr id="row' + i + '">' +
                '<td>' +
                '<input type="text" name="ratings[' + i + '][]" placeholder="Rating Level" class="form-control name_list" />' +
                '<br>' +
                '<select name="ratings[' + i + '][]" class="custom-select" >' +
                '<option selected>Select Rating Value</option>' +
                '<option value="0">0</option>' +
                '<option value="1">1</option>' +
                '<option value="2">2</option>' +
                '<option value="3">3</option>' +
                '<option value="4">4</option>' +
                '<option value="5">5</option>' +
                '<option value="6">6</option>' +
                '<option value="7">7</option>' +
                '<option value="8">8</option>' +
                '<option value="9">9</option>' +
                '<option value="10">10</option>' +

                '</select>' +
                '</td>' +
                '<td>' +
                '<button type="button" ' +
                'name="remove" id="' + i +
                '" class="btn btn-danger btn_remove">' +
                'X</button>' +
                '</td>' +
                '</tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
@endsection
