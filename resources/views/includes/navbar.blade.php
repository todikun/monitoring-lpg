<nav class="navbar navbar-default" id="navbar">
    <div class="container-fluid">
        <div class="navbar-collapse collapse in">
            <ul class="nav navbar-nav navbar-mobile">
                <li>
                    <button type="button" class="sidebar-toggle">
                        <i class="fa fa-bars"></i>
                    </button>
                </li>
                <li class="logo">
                    <a class="navbar-brand" href="#"><span class="highlight">Flat v3</span> Admin</a>
                </li>
                <li>
                    <button type="button" class="navbar-toggle">
                        <img class="profile-img" src="./assets/images/profile.png">
                    </button>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-left">
                <li class="navbar-title">@yield('title')</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li title="Role : {{Auth::user()->role}} " class="dropdown profile">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <img class="profile-img" src="{{asset('dist/assets/images/profile.png')}}">
                        <div class="title">Profile</div>
                    </a>
                    <div class="dropdown-menu">
                        <div class="profile-info">
                            <h4 class="username">{{Auth::user()->name}}</h4>
                        </div>
                        <ul class="action">
                            <li>
                                <a href="#" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">Logout

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>