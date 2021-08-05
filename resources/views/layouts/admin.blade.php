<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.1/css/buttons.dataTables.min.css">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .nav-link.active {
            background-color: #0000A0;
        }
    </style>
</head>
<body class="sidebar-mini" style="height: auto;">
<div class="wrapper" id="app">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="home" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">Contact</a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">

                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                    <p>
                        <i class="nav-icon fas fa-power-off"></i>
                        Logout
                    </p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Brand Logo -->
        <a href="home" class="brand-link">
            <img src="{{ asset('img/centumtangible.png') }}" alt="AdminLTE Logo"
                 class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">360° Feedback</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard" style="color: #0000A0 !important;"></i>
                            <p style="color: #0000A0 !important;">
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link active" style="background-color: #0000A0 !important;">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p style="color: #ffffff !important;">
                                Management
                                <i class="right fas fa-angle-left" style="color: #ffffff !important;"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('create role')
                                <li class="nav-item">
                                    <a href="{{ route('role.index') }}" class="nav-link">
                                        <i class="fas fa-bomb nav-icon" style="color: #0000A0 !important;"></i>
                                        <p style="color: #0000A0 !important;">Roles</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('permission.index') }}" class="nav-link">
                                        <i class="fas fa-bomb nav-icon" style="color: #0000A0 !important;"></i>
                                        <p style="color: #0000A0 !important;">Permissions</p>
                                    </a>
                                </li>


                            <li class="nav-item">
                                <a href="{{ route('user.index') }}" class="nav-link">
                                    <i class="fas fa-users-cog nav-icon" style="color: #0000A0 !important;"></i>
                                    <p style="color: #0000A0 !important;">Users</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="create-survey" class="nav-link">
                                    <i class="fas fa-plus nav-icon" style="color: #0000A0 !important;"></i>
                                    <p style="color: #0000A0 !important;">Create Survey</p>
                                </a>
                            </li>
                            @endcan
                            @can('create permission')
                            <li class="nav-item">
                                <a href="display-surveys" class="nav-link">
                                    <i class="fas fa-list nav-icon" style="color: #0000A0 !important;"></i>
                                    <p style="color: #0000A0 !important;">List of Surveys</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="list-of-employees" class="nav-link">
                                    <i class="fas fa-list nav-icon" style="color: #0000A0 !important;"></i>
                                    <p style="color: #0000A0 !important;">List of Employees</p>
                                </a>
                            </li>
                                @endcan

                            <li class="nav-item">
                                <a href="add-employee" class="nav-link">
                                    <i class="fas fa-people-arrows nav-icon" style="color: #0000A0 !important;"></i>
                                    <p style="color: #0000A0 !important;">Employee registration</p>
                                </a>
                            </li>



                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('user.profile') }}" class="nav-link">
                            <i class="nav-icon fas fa-user" style="color: #0000A0 !important;"></i>
                            <p style="color: #0000A0 !important;">
                                Profile
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-bell nav-icon" style="color: #0000A0 !important;"></i>
                            <p style="color: #0000A0 !important;">Notifications</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-image nav-icon" style="color: #0000A0 !important;"></i>
                            <p style="color: #0000A0 !important;">Change Profile Photo</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('userGetPassword') }}" class="nav-link">
                            <i class="fas fa-lock nav-icon" style="color: #0000A0 !important;"></i>
                            <p style="color: #0000A0 !important;">Change Password</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off" style="color: #0000A0 !important;"></i>
                            <p style="color: #0000A0 !important;">
                                Logout
                            </p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 399px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">@yield('pageName')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">@yield('title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @include('partials.alert')
                @yield('content')
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright © 2021 <a href="https://centum.co.ke/">Centum PLC</a>.</strong> All rights reserved.
    </footer>
    <div id="sidebar-overlay"></div>
</div>
<!-- ./wrapper -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"
        integrity="sha512-F636MAkMAhtTplahL9F6KmTfxTmYcAcjcCkyu0f0voT3N/6vzAuJ4Num55a0gEJ+hRLHhdz3vDvZpf6kqgEa5w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
<script>
    $(document).ready(function () {
        var i = 1;

        // Using jquery we pick the on the click of every button starting with 'add'
        $('[id^=add]').click(function () {

            // Since each button ends with a number unique to the category, we pick that last digit using this code
            var bNumber = this.id.split('-').pop();
            i++;

            // We append the last digit obtain above to the 'dynamic_field' element which is meant to have the same
            // last digit (which is the category_id) so that only the matching category table receives an added question
            $('#dynamic_field-' + bNumber).append('<tr id="row' + i + '"><td><input type="text" name="question_name[' + bNumber + '][]" placeholder="New Question" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function () {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });

    });
</script>
<script>
    $('#company_id').change((event) => {
        $('.departments').hide();
        $(`.company_${event.target.value}`).show();
    });
    $(document).ready(function () {
        $('.departments').hide();
    });
</script>

</body>

</html>
