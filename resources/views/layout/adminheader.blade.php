

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title>:: adminX - Admin ::</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">

<script src="https://cdn.tailwindcss.com"></script><div class="3"></div>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

{{-- <link href="D:\CampusConnectNewUI\project_laravel\public\js\assets\css\dataTables.bootstrap4.min.css" rel="stylesheet"> --}}

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
<link href="{{asset('js/assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
<link href="{{asset('js/assets/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />


<link href="{{asset('js/assets/plugins/morrisjs/morris.css')}}" rel="stylesheet" />
<link href="{{asset('js/assets/plugins/h-timeline/h-timeline.css')}}" rel="stylesheet"> <!-- Resource style -->
<!-- Custom Css -->
<link href="{{asset('js/assets/css/main.css ')}} " rel="stylesheet" >
<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="{{asset('js/assets/css/themes/all-themes.css ')}} " rel="stylesheet" />



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
		<div class="navbar-header"> <a href="javascript:void(0);" class="bars"></a> <a class="navbar-brand" href="index.html">admin <img class="logo" src="{{asset('js/assets/images/logo.svg')}} " alt="profile img"></a> </div>
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
									<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
								</div>
								</a> </li>
							<li> <a href="javascript:void(0);">
								<h4> Make new buttons <small>56%</small> </h4>
								<div class="progress">
									<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="56" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
								</div>
								</a> </li>
							<li> <a href="javascript:void(0);">
								<h4> Create new dashboard <small>68%</small> </h4>
								<div class="progress">
									<div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
								</div>
								</a> </li>
							<li> <a href="javascript:void(0);">
								<h4> Solve transition issue <small>77%</small> </h4>
								<div class="progress">
									<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
								</div>
								</a> </li>
							<li> <a href="javascript:void(0);">
								<h4> Answer GitHub questions <small>87%</small> </h4>
								<div class="progress">
									<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="87" aria-valuemin="0" aria-valuemax="100" style="width: 68%;"></div>
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
<!--Side menu and right menu -->
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
<section class="content home">
	<div class="container-fluid min-h-screen">
		<div class="block-header">
			<h2>Dashboard</h2>
			{{-- <ul class="breadcrumb">
				<li class="breadcrumb-item"><a href="index.html">Home</a></li>			
				<li class="breadcrumb-item active">Dashboard</li>
			</ul> --}}
            @yield('dashhead')

		</div>

        
        {{-- main content  --}}

        
            @yield('main-content')
            
	</div>
</section>



<!-- Jquery Core Js --> 
 <script src="{{asset('js/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js ( jquery.v2.1.4.js ) --> 
<script src="{{asset('js/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- slimscroll, waves Scripts Plugin Js --> 

<script src="{{asset('js/assets/plugins/h-timeline/jquery.mobile.custom.min.js')}}"></script>
<script src="{{asset('js/assets/plugins/jquery-sparkline/jquery.sparkline.js')}}"></script> <!-- Sparkline Plugin Js -->
<script src="{{asset('js/assets/bundles/morrisscripts.bundle.js')}}"></script> <!-- Morris Plugin Js -->
<script src="{{asset('js/assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script> <!-- Jquery Knob Plugin Js -->

<script src="{{asset('js/assets/bundles/mainscripts.bundle.js')}}"></script><!-- Custom Js -->
<script src="{{asset('js/assets/plugins/h-timeline/h-timeline.js')}}"></script> <!-- Resource jQuery -->
<script src="{{asset('js/assets/js/pages/index2.js')}}"></script>
<script src="{{asset('js/assets/js/pages/charts/sparkline.js')}}"></script>
<script src="{{asset('js/assets/js/pages/charts/jquery-knob.js')}}"></script> 



    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <!-- Your Custom JS -->
    <script src="{{ asset('js/main.js') }}"></script>

<style>
    /* Show dropdown menu on hover */
    #dropdown:hover + #dropdownHover,
    #dropdownHover:hover,
    #profileDropdown:hover + #profileDropdownHover,
    #profileDropdownHover:hover {
        display: block;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>