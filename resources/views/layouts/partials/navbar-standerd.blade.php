<header class="navbar-standerd">
    <div class="container">
        <div class="row">

            <!-- logo end-->
            <div class="col-lg-12">
                <!--nav top end-->
                <nav class="navigation ts-main-menu navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="/">
                            <img src="{{$setting -> logo}}" alt="">
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <!--nav brand end-->

                    <div class="nav-menus-wrapper clearfix">
                        <!--nav right menu start-->
                        <ul class="right-menu align-to-right">
                            <li>
                                <a href="{{route("kullanici.login")}}">
                                    <i class="fa fa-user-circle-o"></i>
                                </a>
                            </li>
                            <li class="header-search">
                                <div class="nav-search">
                                    <div class="nav-search-button">
                                        <i class="icon icon-search"></i>
                                    </div>
                                    <form method="GET" action="{{route("search")}}">
                                        <span class="nav-search-close-button" tabindex="0">✕</span>
                                        <div class="nav-search-inner">
                                            <input type="search" name="query" placeholder="Type and hit ENTER">
                                        </div>
                                    </form>
                                </div>
                            </li>
                        </ul>
                        <!--nav right menu end-->

                        <!-- nav menu start-->
                        <ul class="nav-menu align-to-right">

                            <li class="active">
                                <a href="/">Home</a>
                            </li>
                            @foreach ($categories as $category)

                                @switch($category -> type)
                                    @case("one")
                                            @include('layouts.partials.navbar-standerd.megamenu-one')
                                        @break
                                    @case("tabs")
                                            @include('layouts.partials.navbar-standerd.megamenu-tabs')
                                        @break
                                    @case("panel")
                                            @include('layouts.partials.navbar-standerd.megamenu-panel')

                                        @break
                                    @case("navdown")
                                            @include('layouts.partials.navbar-standerd.megamenu-navdown')

                                        @break
                                    @default

                                @endswitch
                            @endforeach







                        </ul>

                        <!--nav menu end-->
                    </div>
                </nav>
                <!-- nav end-->
            </div>
        </div>
    </div>
</header>
