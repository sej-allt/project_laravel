@section('dashhead')
Bulk Upload
@endsection

@section('main-content')
{{-- {{ dd(session()->has('errors'))}} --}}
@if(session()->has('errors'))

<?php
$errors = session('errors');
$size = count($errors);
//  dd($errors);
?>
@extends((session()->has('errors'))?'partials.erroralert':'partials.sample')

@section('head')
There are {{$size}} errors in the uploaded file :
@endsection
@section('content')
<ul class="list-disc list-outside font-normal">
    @foreach ($errors as $error )
    <li>{{$error}}</li>
    @endforeach
</ul>
@endsection
@section('footmessage')
Kindly correct the errors and refresh the page.
@endsection

@endif
@if (session()->has('status'))
@if (session('status')=='success')
@extends((session('status')=='success')?'partials.successalert':'partials.sample')
@section('head')
Data successfully added to the records.
@endsection
@endif
@endif
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>:: adminX Admin ::</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Favicon-->
    <link href="{{asset('js/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="{{asset('js/assets/css/main.css')}}" rel="stylesheet">
    <!-- choose a theme from css/themes instead of get all themes -->
    <link href="{{asset('js/assets/css/themes/all-themes.css')}}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <style type="text/tailwindcss">
        @layer utilities {
            .content-auto {
                content-visibility: auto;
            }
        }
    </style>
</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <p>Please wait...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Search  -->
    <div class="search-bar">
        <div class="search-icon"> <i class="material-icons">search</i> </div>
        <input type="text" placeholder="Explore adminX...">
        <div class="close-search"> <i class="material-icons">close</i> </div>
    </div>

    <!-- Top Bar -->
    <nav class="navbar clearHeader">
        <div class="col-12">
            <div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html">admin<img class="logo" src="{{asset('js/assets/images/logo.svg')}}" alt="profile img"></a> </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="zmdi zmdi-search"></i></a></li>
                <li class="dropdown menu-app"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"> <i class="zmdi zmdi-apps"></i> </a>
                    <ul class="dropdown-menu">
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <ul>
                                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-email"></i><span>Mail</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-accounts-list"></i><span>Contacts</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-comment-text"></i><span>Chat</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-arrows"></i><span>Notes</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-view-column"></i><span>Taskboard</span></a></li>
                                        <li><a href="javascript:void(0)"><i class="zmdi zmdi-calendar-note"></i><span>Calendar</span></a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown msg-notification"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"> <i class="zmdi zmdi-email"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">Messages</li>
                        <li class="body">
                            <ul class="menu">
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle"> <img src="{{asset('js/assets/images/xs/avatar1.jpg')}}" alt=""> </div>
                                        <div class="menu-info">
                                            <h4>David Belle</h4>
                                            <p class="ellipsis">Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle"> <img src="{{asset('js/assets/images/xs/avatar2.jpg')}}" alt=""> </div>
                                        <div class="menu-info">
                                            <h4>David Belle</h4>
                                            <p class="ellipsis">Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle"> <img src="{{asset('js/assets/images/xs/avatar3.jpg')}}" alt=""> </div>
                                        <div class="menu-info">
                                            <h4>David Belle</h4>
                                            <p class="ellipsis">Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle"> <img src="{{asset('js/assets/images/xs/avatar4.jpg')}}" alt=""> </div>
                                        <div class="menu-info">
                                            <h4>David Belle</h4>
                                            <p class="ellipsis">Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                        </div>
                                    </a> </li>
                            </ul>
                        </li>
                        <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                    </ul>
                </li>
                <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green"> <i class="material-icons">person_add</i> </div>
                                        <div class="menu-info">
                                            <h4>12 new members joined</h4>
                                            <p> <i class="material-icons">access_time</i> 14 mins ago </p>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle bg-cyan"> <i class="material-icons">add_shopping_cart</i> </div>
                                        <div class="menu-info">
                                            <h4>4 sales made</h4>
                                            <p> <i class="material-icons">access_time</i> 22 mins ago </p>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle bg-red"> <i class="material-icons">delete_forever</i> </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy Doe</b> deleted account</h4>
                                            <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle bg-orange"> <i class="material-icons">mode_edit</i> </div>
                                        <div class="menu-info">
                                            <h4><b>Nancy</b> changed name</h4>
                                            <p> <i class="material-icons">access_time</i> 2 hours ago </p>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle bg-blue-grey"> <i class="material-icons">comment</i> </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> commented your post</h4>
                                            <p> <i class="material-icons">access_time</i> 4 hours ago </p>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green"> <i class="material-icons">cached</i> </div>
                                        <div class="menu-info">
                                            <h4><b>John</b> updated status</h4>
                                            <p> <i class="material-icons">access_time</i> 3 hours ago </p>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <div class="icon-circle bg-purple"> <i class="material-icons">settings</i> </div>
                                        <div class="menu-info">
                                            <h4>Settings updated</h4>
                                            <p> <i class="material-icons">access_time</i> Yesterday </p>
                                        </div>
                                    </a> </li>
                            </ul>
                        </li>
                        <li class="footer"> <a href="javascript:void(0);">View All Notifications</a> </li>
                    </ul>
                </li>
                <li class="dropdown task"> <a href="javascript:void(0);" class="dropdown-toggle " data-toggle="dropdown" role="button"> <i class="zmdi zmdi-format-list-bulleted"></i>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">TASKS</li>
                        <li class="body">
                            <ul class="menu tasks">
                                <li> <a href="javascript:void(0);">
                                        <h4> Footer display issue <small>72%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar l-coral" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <h4> Make new buttons <small>56%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar l-green" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <h4> Create new dashboard <small>68%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar l-parpl" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <h4> Solve transition issue <small>77%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar l-coral" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                        </div>
                                    </a> </li>
                                <li> <a href="javascript:void(0);">
                                        <h4> Answer GitHub questions <small>87%</small> </h4>
                                        <div class="progress">
                                            <div class="progress-bar l-blue" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
                                        </div>
                                    </a> </li>
                            </ul>
                        </li>
                        <li class="footer"> <a href="javascript:void(0);">View All Tasks</a> </li>
                    </ul>
                </li>
                <li><a href="sign-in2.html" class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a></li>
                <li class="pull-right"><a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-sort-amount-desc"></i></a></li>
            </ul>
        </div>
    </nav>
    <!-- #Top Bar -->

    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
	<!-- Menu -->
	<div class="menu">
		<ul class="list">
			<li>
				<!-- User Info -->
				<div class="user-info">
					<div class="admin-image"> <img src="{{asset('js/assets/images/sm/avatar1.jpg')}}" alt="profile img"> </div>
					<div class="admin-action-info"> <span>Welcome</span>
						<h3>Tom Cook</h3>
						<ul>
							<li><a data-placement="bottom" title="Go to Inbox" href="mail-inbox.html"><i class="zmdi zmdi-email"></i></a></li>
							<li><a data-placement="bottom" title="Go to Profile" href="profile.html"><i class="zmdi zmdi-account"></i></a></li>
							<li><a data-placement="bottom" title="Full Screen" href="sign-in.html" ><i class="zmdi zmdi-sign-in"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- #User Info -->
			</li>
			<li class="header">MAIN NAVIGATION</li>
			<li class="active open"> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-home"></i><span>User Registration</span> </a>
				<ul class="ml-menu">
					<li class="active"><a href="{{ route('bulk') }}">Bulk Upload</a></li>
					<li><a href="{{ route('individualReg') }}">Individual Registration</a></li>
					<li><a href="{{ route('email.create') }}">add email content</a></li>
					<li><a href="{{ route('list') }}">Student List</a></li>
					<li><a href="{{ route('create_event') }}">Add Event</a></li>
				</ul>
			</li>
			<li> <a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-delicious"></i><span>Widgets</span> </a>
				<ul class="ml-menu">
					<li> <a href="basic.html">Basic</a></li>
					<li> <a href="more-widgets.html">More Widgets</a></li>
				</ul>
			</li>


		</ul>
	</div>
	<!-- #Menu -->
</aside>
    <!-- #END# Left Sidebar -->

    <!-- main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Modals</h2>
            </div>
            <!-- Modal Size Example -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="body">
                            <button type="button" class="btn btn-default waves-effect m-r-20" data-toggle="modal" data-target="#exampleModal">BULK DATA UPLOAD</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Modal Size Example -->
        </div>
    </section>

    <!-- Modal Dialogs ====================================================================================================================== -->
    <!-- Default Size -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="ModalLabel">UPLOAD DATA</h1>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <a href="http://localhost:8000/data-template.csv" class="btn bg-gray-600" download="template.csv">
                        Download CSV Template
                    </a>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-toggle="modal" data-target="#uploadModal">Upload file</button>
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Upload file -->

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="uploadModalLabel">Upload CSV File</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to upload CSV file -->
                <form action="/upload-csv" method="POST" enctype="multipart/form-data">
                    <!-- CSRF token -->
                    <!-- Add the @csrf directive in your Laravel Blade file -->
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <!-- File input for uploading CSV -->
                    <div class="mb-3">
                        <label for="csvFile" class="form-label">Choose CSV File</label>
                        <input type="file" name="csvFile" id="csvFile" class="form-control" accept=".csv" required>
                    </div>

                    <!-- Upload button -->
                    <button type="submit" class="btn btn-success">Upload</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

    <!-- Jquery Core Js -->
    <script src="{{asset('js/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{asset('js/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

    <script src="{{asset('js/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
    <script src="{{asset('js/assets/js/pages/ui/modals.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>
