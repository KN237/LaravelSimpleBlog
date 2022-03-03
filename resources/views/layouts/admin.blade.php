<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{env("APP_NAME")}} | Admin Panel - @yield('title')</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="/assets/admin/assets/css/bootstrap1.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="/assets/admin/assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="/assets/admin/assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="/assets/admin/assets/css/customed.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

   <script src="/assets/ckeditor/ckeditor.js"></script>
   
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Admin Panel</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;display:flex;"> <span style="margin:10px;">{{Auth::user()->username}} | {{Auth::user()->email}}</span>  <form action="{{route('logout')}}" method="post">@csrf<button type="submit" class="btn btn-danger square-btn-adjust">Déconnexion</button> </form> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="/user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="@yield('dashboard')"  href="{{route('admin.index')}}"><i class="fa fa-dashboard fa-3x"></i> Tableau de bord</a>
                    </li>

                     <li>
                        <a  class="@yield('articles')" href="{{route('admin.posts')}}"><i class="fa fa-pencil  fa-3x"></i>Articles</a>
                    </li>

                    <li>
                        <a  class="@yield('tags')" href="{{route('admin.tags')}}"><i class="fa fa-clipboard fa-3x"></i>Tags</a>
                    </li>

                    <li>
                        <a class="@yield('categories')"  href="{{route('admin.categories')}}"><i class="fa fa-clipboard fa-3x"></i>Categories</a>
                    </li>
						  
					                   
                 <!--   <li>
                        <a href="#"><i class="fa fa-sitemap fa-3x"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link</a>
                            </li>
                            <li>
                                <a href="#">Second Level Link<span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Link</a>
                                    </li>

                                </ul>
                               
                            </li>
                        </ul>
                      </li>  -->
                  <li  >
                        <a class="@yield('users')"  href="{{route('admin.users')}}"><i class="fa fa-users fa-3x"></i> Utilisateurs</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
       
@yield('content')


        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="/assets/admin/assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="/assets/admin/assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="/assets/admin/assets/js/jquery.metisMenu.js"></script>
     <!-- MORRIS CHART SCRIPTS -->
     <script src="/assets/admin/assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="/assets/admin/assets/js/morris/morris.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="/assets/admin/assets/js/custom.js"></script>
    <script>
        CKEDITOR.replace('exampleText');
    </script>
    
   
</body>
</html>
