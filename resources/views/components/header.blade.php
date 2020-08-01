
<div class="header">
    <div class="container">
       <div class="row navbar-fixed-top top_menu">
            <div class="col-xs-12 col-sm-2 col-md-3 col-lg-3 ">
                <div class="site_title">
                    <a href="{{ route('index') }}" class="site_title">{{ config('app.name') }}</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-10 col-md-9 col-lg-9">
                
                <nav class="navbar navbar-default" role="navigation">
                  <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header" >
                
                    <a href="{{ route('index') }}" class="site_title_mobile">{{ config('app.name') }}</a>
                    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <!--<i class="fa fa-chevron-circle-down"></i>-->
                        <i class="fa fa-angle-down"></i>
                    </button>                  
                    
                    <button type="button" class="dropdown-toggle navbar-toggle margin_right" data-toggle="dropdown">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>   
                    
                    <button type="button" class="navbar-toggle">
                        <li><a href="{{route('home')}}"><i class="fa fa-user" style='color: #000;'></i></a></li>
                    </button>                      
                      
                    <ul class="dropdown-menu shadows" role="menu" style="width: 100%;">
                        <li>
                            <form action="{{ route('/search') }}" method="POST" role="search" class="navbar-form">
                                {{csrf_field ()}} 
                                <div class="form-group" style="display:inline;">
                                  <div class="input-group" style="display:table;">
                                    <!--<span class="input-group-addon" style="width:1%;"><span class="glyphicon glyphicon-search"></span></span>-->
                                    <input class="form-control" name="q" placeholder="Search Here" autocomplete="off" autofocus="autofocus" type="text">
                                    
                                    <span class="input-group-btn"> 
                                        <button type="submit" class="input-group-addon"> 
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                  </div>
                                </div>
                            </form>
                        </li>
                    </ul>
                      
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav pull-right top_menu_buttons">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle margin_right" @if(isset($indoor_climbing) || isset($outdoor_climbing)) id='actyve' @endif data-toggle="dropdown">
                                    Climbing
                                    <!--<span class="caret"></span>-->
                                </a>

                                <ul class="dropdown-menu shadows" role="menu">
                                    <li><a class="dropdown-toggle abc" href="{{route('indoor_list')}}">Indoor Climbing</a></li>
                                    <li><a class="dropdown-toggle efg" href="{{route('outdoor_list')}}">Outdoor Climbing</a></li>
                                </ul>
                            </li>

                            <li><a class='margin_right' @if(isset($mount)) id='actyve' @endif href="{{route('mount_list')}}">Mountaineering</a></li>
                            <li><a class='margin_right' @if(isset($ice)) id='actyve' @endif href="{{route('ice_list')}}">Ice & Mixed</a></li>
                            <li><a class='margin_right' @if(isset($other)) id='actyve' @endif href="{{route('other_list')}}">Other</a></li>
                            <li><a class='margin_right' @if(isset($shop)) id='actyve' @endif href="{{route('shop_list')}}">Shop</a></li>
                            <li><a class='margin_right' @if(isset($pages)) id='actyve' @endif href="{{route('about_page')}}">About Us</a></li>

                            @if (Auth::guest())
                            <li>
                                <a class='margin_right' href="{{route('login')}}">Login</a>
                            </li>
                            @endif

                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle margin_right admin_menu_for_desctop" data-toggle="dropdown">
                                    <i class="fa fa-search" @if(isset($search)) id='actyve' @endif aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu shadows menu_margin_left_850" role="menu" style="width: 1000%;">
                                    <li>
                                        <form action="{{ route('/search') }}" method="POST" role="search" class="navbar-form">
                                            {{csrf_field ()}} 
                                            <div class="form-group" style="display:inline;">
                                              <div class="input-group" style="display:table;">
                                                <!--<span class="input-group-addon" style="width:1%;"><span class="glyphicon glyphicon-search"></span></span>-->
                                                <input class="form-control" name="q" placeholder="Search Here" autocomplete="off" autofocus="autofocus" type="text">
                                                
                                                <span class="input-group-btn"> 
                                                    <button type="submit" class="input-group-addon"> 
                                                        <span class="glyphicon glyphicon-search"></span>
                                                    </button>
                                                </span>
                                              </div>
                                            </div>
                                        </form>
                                        
                                    </li>
                                </ul>
                            </li>

                            @if (Route::has('login'))
                            @auth
                            <li>
                                <a class='margin_right' style="margin-top: -5%;font-size: 150%;" href="{{route('home')}}">
                                    <i class="fa fa-user-circle"></i>
                                </a>
                            </li>
<!--                             <li class="dropdown admin_menu_for_desctop">
                                <a href="#" class="dropdown-toggle margin_right" data-toggle="dropdown"><i class="fa fa-user-circle"></i></a>
                                
                                <ul class="dropdown-menu shadows menu_margin_left_250" role="menu">
                                    
                                    @if((Auth::user()->hasRole('user'))||(Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('manager')))
                                    <li><a href="{{route('home')}}">My page</a></li>
                                    @endif

                                    @if((Auth::user()->hasRole('admin')) || (Auth::user()->hasRole('manager')))
                                    <hr />
                                    <li><a href="#">Outdoor climbing</a></li>
                                    <li><a href="#">Route</a></li>
                                    <li><a href="#">Indoor climbing</a></li>
                                    <li><a href="#">Mountaineering</a></li>
                                    <li><a href="#">Ice and mixed</a></li>
                                    <li><a href="#">News</a></li>
                                    <li><a href="#">Other</a></li>
                                    <li><a href="#">Security</a></li>
                                    <li><a href="#">Partners</a></li>
                                    <li><a href="#">Events</a></li>
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Gallery</a></li>
                                    <li><a href="#">Article Gallery</a></li>
                                    <li><a href="#">Head slider</a></li>
                                    @endif

                                    @if(Auth::user()->hasRole('admin'))
                                    <hr />
                                    <li><a href="#">Coment</a></li>
                                    <li><a href="{{route('users')}}">Users(R Del=?)</a></li>
                                    @endif
                                    <hr />
                                    <li>
                                    <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                    </li>
                                    
                                </ul>
                            </li> -->
                            @endauth
                            @endif
                            
                        </ul>
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </div><!-- .container -->
</div><!-- /header -->
