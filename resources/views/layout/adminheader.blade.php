{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('header')</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
</head>
<body class="min-h-screen bg-gray-300">
    <div class="w-full bg-gray-700 rounded-b-[40px]">
        <nav class="bg-gray-800 m-auto rounded-lg w-4/5 h-12 underline">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-12 items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <a class="text-white font-medium text-medium" href="{{ route('admin') }}">Admin</a>
                        </div>
                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
                                <a href="{{ route('admin') }}" class="{{ Request::is('Admin_home') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} hover:no-underline rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a>

                                <div class="relative inline-block">
                                    <button id="dropdown" class="{{ Request::is('admin') || Request::is('individualReg') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 h-13 text-sm font-medium" type="button">User Registration</button>
                                    <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 absolute top-full left-0 mt-0">
                                        <ul class="py-2 text-sm text-black dark:text-white" aria-labelledby="dropdown">
                                            <li>
                                                <a href="{{ route('bulk') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Bulk Upload</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('individualReg') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600">Individual Registration</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <a href="{{ route('create_event') }}" class="{{ Request::is('create_event') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} hover:no-underline rounded-md px-3 py-2 text-sm font-medium">Add Event</a>

                                <a href="{{ route('list') }}" class="{{ Request::is('list') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} hover:no-underline rounded-md px-3 py-2 text-sm font-medium">Student List</a>
                                <a href="{{ route('email.create') }}" class="{{ Request::is('email.create') ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} hover:no-underline rounded-md px-3 py-2 text-sm font-medium">Update-Email-content</a>

                                @yield('navbar')
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">
                            <a href="{{ route('viewRequests') }}">
                                <button type="button" class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                                    <span class="sr-only">View notifications</span>
                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                    </svg>
                                </button>
                            </a>

                            <!-- Profile dropdown -->
                            <div class="relative inline-block">
                                <button id="profileDropdown" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" type="button">
                                    <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                </button>
                                <div id="profileDropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 absolute top-full left-0 mt-0">
                                    <ul class="py-2 text-sm text-black dark:text-white" aria-labelledby="profileDropdown">
                                        <li>
                                            <a href="{{ route('logout') }}" class="block px-2 py-1 font-medium text-center text-sm hover:underline dark:hover:underline">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <header>
            <div class="mx-auto w-full px-4 pt-1 pb-3 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-slate-50">@yield('header')</h1>
            </div>
        </header>
        @yield('cards')
    </div>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            @yield('main_content')
        </div>
    </main>

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
</html> --}}

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>:: adminX - Admin ::</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">

<script src="https://cdn.tailwindcss.com"></script>
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