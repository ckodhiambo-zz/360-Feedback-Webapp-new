<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi Step Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js"
            integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ=="
            crossorigin="anonymous"></script>
    <style>
        section {
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .bs-example {
            margin: 10px;
        }

        .container {
            margin: 0 auto; /* Added */
            float: none; /* Added */
            margin-bottom: 10px; /* Added */
        }

        .form-section {
            padding-left: 0px;
            display: none;
        }

        .form-section.current {
            display: inherit;
        }

        .btn-info, .btn-success {
            margin-top: 10px;
            width: 200px;
        }

        .parsley-errors-list {
            margin: 2px 0 3px;
            padding: 0;
            list-style-type: none;
            color: red;
        }
    </style>
</head>
<body>
@section('title')
    Multi-Step-Form
@endsection

<section>

    <div class="container">
        <div class="row">
            <div class="col-md-12 offest-md-3">
                <div class="card">
                    <div class="card-body">
                        <form class="personal-info" method="post" action="{{ route('results.create') }}"
                              enctype="multipart/form-data" autocomplete="off">
                            @csrf
                            @foreach($survey->categories as $category)
                                <fieldset>
                                    <div class="form-section">
                                        <div class="card-header text-white bg-info">
                                            <h5>+ 360° Feedback {{ $category->category_name }} Module</h5>
                                        </div>
                                        <br>
                                        @foreach($category->questions as $question)
                                            <div class="accordion" id="accordionExample">
                                                <div class="card">
                                                    <input type="number" name="question" value="{{$question->id}}"
                                                           hidden>
                                                    <div class="card-header" id="{{$question->id}}">
                                                        <p> {{$question->question_name}}</p>
                                                    </div>
                                                    <div class="bs-example">

                                                        @foreach($survey->ratings as $rating)
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio"
                                                                       name="ratings[{{$question->id}}]"
                                                                       id="{{$rating->id}}" value="{{$rating->id}}">
                                                                <label class="form-check-label"
                                                                       for="{{$rating->id}}">{{ $rating->rating_level }}</label>
                                                            </div>
                                                        @endforeach

                                                    </div>

                                                </div>
                                            </div>

                                        @endforeach

                                    </div>
                                </fieldset>
                            @endforeach

                            <div class="form-navigation">
                                <button type="button" class="previous btn btn-info float-left">Previous</button>
                                <button type="button" class="next btn btn-info float-right">Next</button>
                                <button type="submit" class="btn btn-success float-right">Submit</button>
                            </div>
                        </form>
                        @csrf
                    </div>
                </div>
            </div>
        </div>


    </div>

</section>

<script>
    $(function () {
        var $sections = $('.form-section');

        function navigateTo(index) {
            $sections.removeClass('current').eq(index).addClass('current');
            $('.form-navigation .previous').toggle(index > 0);
            var atTheEnd = index >= $sections.length - 1;
            $('.form-navigation .next').toggle(!atTheEnd);
            $('.form-navigation [type = submit]').toggle(atTheEnd);
        }

        function curIndex() {
            return $sections.index($sections.filter('.current'));
        }

        $('.form-navigation .previous').click(function () {
            navigateTo(curIndex() - 1);
        });

        $('.form-navigation .next').click(function () {
            $('.personal-info').parsley().whenValidate(
                {
                    group: 'block-' + curIndex()
                }).done(function () {
                navigateTo(curIndex() + 1)
            });
        });

        $sections.each(function (index, section) {
            $(section).find(':input').attr('data-parsley-group', 'block-' + index);
        });

        navigateTo(0);

    });
</script>


</body>
</html>
