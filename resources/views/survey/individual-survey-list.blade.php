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
    <title>List-of-nominations</title>
</head>
<body>
<section>
    <div class="container">
        <div class="col-sm-10">
            <div class="card">
                <div class="card-body">
                    <div class="card-header text-white bg-info" style="background-color: #0000A0 !important;">
                        <h5>List of your nominators - Tier Data Feedback </h5>
                    </div>
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
                                <a href="#" class="btn btn-outline-primary">Rate</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Eric Mwendwa</td>
                            <td>Tier Data Limited</td>
                            <td>Peer</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary">Rate</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Isaac Kagechu</td>
                            <td>Tier Data Limited</td>
                            <td>Supervisor</td>
                            <td>
                                <a href="#" class="btn btn-outline-primary">Rate</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>


</body>
</html>
