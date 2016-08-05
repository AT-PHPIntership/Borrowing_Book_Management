<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand " href="{{route('home.admin')}}" >{!! trans('labels.title_admin') !!}</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="coloruseradmin"><i class="fa fa-user"></i> {{ Auth::guard('admin')->user()->username }}<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> {!! trans('labels.profile_admin') !!}</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> {!! trans('labels.inbox_admin') !!}</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> {!! trans('labels.setting_admin') !!}</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('admin.logout') }}"><i class="fa fa-fw fa-power-off"></i> {!! trans('labels.logout') !!}</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            @include('admin.layouts.partials._sidebar')
            <!-- /.navbar-collapse -->
</nav>