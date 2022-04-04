<!DOCTYPE html>
<html dir="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Blank Page</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {{--<!-- Bootstrap 3.3.7 -->--}}
    <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/skin-blue.min.css')}}">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{asset('admin/css/font-awesome-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/AdminLTE-rtl.min.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('admin/css/bootstrap-rtl.min.css')}}">
        <link rel="stylesheet" href="{{asset('admin/css/rtl.css')}}">

        <style>
            body, h1, h2, h3, h4, h5, h6 {
                font-family: 'Cairo', sans-serif !important;
            }

        .mr-2{
            margin-right: 5px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
            animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

    </style>

    @else
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.min.css') }}">
    @endif

    <style>
        .mr-2{
            margin-right: 5px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite; /* Safari */
            animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

    </style>
    {{--<!-- jQuery 3 -->--}}
    <script src="{{ asset('admin/js/jquery.min.js') }}"></script>

    {{--noty--}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/noty/noty.css') }}">
    <script src="{{ asset('admin/plugins/noty/noty.min.js') }}"></script>

    {{--morris--}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/morris/morris.css') }}">

    {{--<!-- iCheck -->--}}
    <link rel="stylesheet" href="{{ asset('admin/plugins/icheck/all.css') }}">

    {{--html in  ie--}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="">

    <header class="main-header">

        {{--<!-- Logo -->--}}
        <a href="" class="logo">
            {{--<!-- mini logo for sidebar mini 50x50 pixels -->--}}
            <span class="logo-mini"><b>A</b>LT</span>
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small>
                                                    <i class="fa fa-clock-o"></i> 5 mins
                                                </small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">See All Messages</a>
                            </li>
                        </ul>
                    </li>

                    {{--<!-- Notifications: style can be found in dropdown.less -->--}}
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                {{--<!-- inner menu: contains the actual data -->--}}
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>


                    {{--<!-- User Account: style can be found in dropdown.less -->--}}
                    <li class="dropdown user user-menu">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs"></span>
                        </a>
                        <ul class="dropdown-menu">

                            {{--<!-- User image -->--}}
                            <li class="user-header">
                                <img src="{{asset('admin/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                                <p>

                                    <small>Member since 2 days</small>
                                </p>
                            </li>

                            {{--<!-- Menu Footer-->--}}
                            <li class="user-footer">

                                <a href="{{ route('logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">logout</a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>




                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

    </header>

    @include('dashbord.includes._sidebar')
    @include('partials._session')
    @yield('content')



    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.4.0
        </div>
        <strong>Copyright &copy; 2014-2016
            <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>

</div><!-- end of wrapper -->

{{--<!-- Bootstrap 3.3.7 -->--}}
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

{{--icheck--}}
<script src="{{ asset('admin/plugins/icheck/icheck.min.js') }}"></script>

{{--<!-- FastClick -->--}}
<script src="{{ asset('admin/js/fastclick.js') }}"></script>

{{--<!-- AdminLTE App -->--}}
<script src="{{ asset('admin/js/adminlte.min.js') }}"></script>

{{--ckeditor standard--}}
<script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>

{{--jquery number--}}
<script src="{{ asset('admin/js/jquery.number.min.js') }}"></script>

{{--print this--}}
<script src="{{ asset('admin/js/printThis.js') }}"></script>

{{--morris --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('admin/plugins/morris/morris.min.js') }}"></script>

{{--custom js--}}
<script src="{{ asset('admin/js/custom/image_preview.js') }}"></script>
<script src="{{ asset('admin/js/custom/order.js') }}"></script>




<script>
     $(document).ready(function () {
  $('.delete').click(function(e){
    var that=$(this);
    e.preventDefault();
    var n= new Noty({
            type: 'warning',
            text: "confirm delete",
            killer: true,
            buttons:[
            Noty.button("yes","btn btn-primary mr-2",function(){
                that.closest('form').submit();
            }),
            Noty.button("no","btn btn-danger mr-2",function(){
                n.close();
            })
            ]
        });
       n.show();
  });

//image preview
$(".image").change(function() {

    if (this.files && this.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('.img-preview').attr('src', e.target.result);
    }

    reader.readAsDataURL(this.files[0]); // convert to base64 string
  }
});//end image preview
CKEDITOR.config.language =  "{{ app()->getLocale() }}";
});
</script>
@stack('scripts')
</body>
</html>
