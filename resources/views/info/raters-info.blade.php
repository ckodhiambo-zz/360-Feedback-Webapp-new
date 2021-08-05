<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <title>Nominations</title>

</head>
<body>
{{--@extends('layouts.admin')--}}

{{--@section('title')--}}
{{--    Nominations--}}
{{--@endsection--}}
{{--@section('content')--}}
<section>
    <div class="card">
        <div class="card-body">


            <form action="{{ route('post.nominate') }}" method="post">
                @csrf
                <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                    <h5>{{ $surveys->survey_title }} 360° Feedback Nominations</h5>
                </div>
                <input type="text" name="survey_id" value="{{$surveys->id}}" hidden>
                <div class="card" style="margin-top: 10px">
                    <div class="card-body"><strong>Kindly nominate the people you would like to rate.</strong></div>
                </div>
                <br>

                <div class="card" style="margin-top: -20px">
                    <div class="card-header">
                        <div class="card-title">
                            <p><strong>Hint:</strong> nominate <strong>at least</strong> 1 supervisor, 1 peer and 1
                                direct
                                report (if it applies to you).</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="dynamic_field1">
                                <tr>
                                    <td>
                                        <div class="row g-3">
                                            <div class="col">
                                                <strong>Business Unit</strong>
                                                <div class="form-group">
                                                    <select class="form-control name_list" name="company_id[1][]"
                                                            id="company_id" required>
                                                        <option selected disabled>-- Select business unit --</option>
                                                        @foreach ($companies as $company)
                                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <strong>Nominee</strong>

                                                <div class="form-group">
                                                    <select class="form-control name_list" name="rater_id[1][]"
                                                            required>
                                                        <option selected disabled>-- Select name --</option>
                                                        @foreach ($companies as $company)
                                                            @foreach ($company->employees as $employee)
                                                                <option class="employees company_{{$company->id}}"
                                                                        value="{{$employee->id}}">{{$employee->first_name}} {{$employee->last_name}}</option>
                                                            @endforeach
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <strong>Relationship</strong>

                                                <div class="form-group">
                                                    <select class="form-control name_list" name="relationship_id[1][]"
                                                            required>
                                                        <option selected disabled>-- Select relationship --</option>
                                                        @foreach ($relationships as $relationship)
                                                            <option class="relationship company_{{$relationship->id}}"
                                                                    value="{{$relationship->id}}">{{$relationship->default_name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col">

                                            <button type="button" name="add_field" id="add_field"
                                                    class="btn btn-outline-primary" style="margin-top: 25px">+ Add More
                                            </button>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                            <div class="form-group">
                                <button class="btn btn-outline-success btn-lg float-right" type="submit">Submit</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            <hr>
        </div>
    </div>

</section>

{{--<!-- JQuery -->--}}
{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--<!-- MDB -->--}}
{{--<script--}}
{{--    type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"--}}
{{--></script>--}}
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        var i = 1;
        $('#add_field').click(function () {
            i++;
            $('#dynamic_field1').append(
                '<tr id="row' + i + '">' +
                '<td>' +
                '<div class="row g-3">' +
                '<div class="col">' +
                '<div class="form-group">' +
                '<select class="form-control name_list" name="company_id[' + i + '][]" required>' +
                '<option selected disabled>-- Select business unit --</option>' +
                '@foreach ($companies as $company)' +
                '<option value="{{$company->id}}">{{$company->name}}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col">' +
                '<div class="form-group">' +
                '<select class="form-control name_list" name="rater_id[' + i + '][]" required>' +
                '<option selected disabled>-- Select name --</option>' +
                '@foreach ($companies as $company)' +
                '@foreach ($company->employees as $employee)' +
                '<option class="employees {{$company->id}}"' +
                'value="{{$employee->id}}">{{$employee->first_name}} {{$employee->last_name}}</option>' +
                '@endforeach' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '<div class="col">' +
                '<div class="form-group">' +
                '<select class="form-control name_list" name="relationship_id[' + i + '][]" required>' +
                '<option selected disabled>-- Select relationship --</option>' +
                '@foreach ($relationships as $relationship)' +
                '<option class="relationship {{$relationship->id}}"' +
                'value="{{$relationship->id}}">{{$relationship->default_name}}</option>' +
                '@endforeach' +
                '</select>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</td>' +
                '<td>' +
                '<div class="col">' +
                '<button type="button" ' +
                'name="remove" id="' + i +
                '" class="btn btn-outline-danger btn_remove">' +
                'X</button>' +
                '</div>' +
                '</td>' +
                '</tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
    });


</script>
<script>
    //Dynamic dependent dropdown
    $('#company_id').change((event) => {
        $('.employees').hide();
        $(`.company_${event.target.value}`).show();
    });
    $(document).ready(function () {
        $('.employees').hide();
    });
</script>

{{--@endsection--}}
