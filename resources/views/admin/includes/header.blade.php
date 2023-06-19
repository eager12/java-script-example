
<header class="main-header">
    <!-- Logo -->
    <a
{{--            href="{{route('admin.index')}}"--}}
       class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">ARTS</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>ARTS NASIRZADEH</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>


        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="https://statics.arastowel.com/avatars/nasirzadeh.jpg" class="user-image" alt="User Image">
                        <span class="hidden-xs">{{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->last_name}}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="https://statics.arastowel.com/avatars/nasirzadeh.jpg" class="img-circle" alt="User Image">

                            <p>
                                {{\Illuminate\Support\Facades\Auth::user()->email}}
                                <small>{{\Illuminate\Support\Facades\Auth::user()->persian_role}}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row">
                                <div class="col-xs-4 text-center">
                                    <a href="#">صفحه من</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">فروش</a>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <a href="#">دوستان</a>
                                </div>
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="#" class="btn btn-default btn-flat">پروفایل</a>
                            </div>
                            <div class="pull-left">
                                <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('خروج') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

            </ul>
        </div>
    </nav>
</header>