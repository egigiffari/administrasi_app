<!-- Sidebar -->
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="/home" class="site_title"><i class="fa fa-paw"></i> <span>SIPATEN!</span></a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
            <img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="img-circle profile_img">
            </div>
            <div class="profile_info">
            <span>Welcome,</span>
            <h2>{{Auth::user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>App</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Dashboard</a></li>
                    <li class=""><a><i class="fa fa-cubes"></i> Product <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="{{ route('product.index') }}">List Product</a></li>
                        <li><a href="{{ route('brand.index') }}">Brand</a></li>
                        <li><a href="{{ route('category.index') }}">Category</a></li>
                        <!-- <li><a href="#">Supplier</a></li> -->
                    </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Pengajuan</h3>
                <ul class="nav side-menu">
                    @inject('categories', 'App\RequestCategory');
                    @foreach($categories::all() as $category)
                    <li class=""><a><i class="fa fa-file"></i> {{$category->name}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('requestby.category.index', $category->id) }}">Pengajuan</a></li>
                            <li><a href="#">Laporan</a></li>
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- <div class="menu_section">
                <h3>Laporan</h3>
                <ul class="nav side-menu">
                    <li><a href="#"><i class="fa fa-archive"></i>Laporan</a></li>
                    <li><a href="#"><i class="fa fa-cubes"></i>Laporan Product</a></li>
                </ul>
            </div> -->
            <div class="menu_section">
                <h3>Setting</h3>
                <ul class="nav side-menu">
                    <li class=""><a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('user.index') }}">List Users</a></li>
                            <li><a href="{{ route('division.index') }}">Division</a></li>
                            <li><a href="{{ route('position.index') }}">Position</a></li>
                            <li><a href="{{ route('level.index') }}">Level</a></li>
                            <li><a href="{{ route('user.trash') }}">Trash Users</a></li>
                        </ul>
                    </li>
                    <li class=""><a><i class="fa fa-file"></i> Pengajuan <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('request.responsible.index') }}"><i class="fa fa-files"></i> Penanggung Jawab</a></li>
                            <li><a href="{{ route('request.type.index') }}"><i class="fa fa-files"></i> Jenis Pengajuan</a></li>
                            <li><a href="{{ route('request.category.index') }}"><i class="fa fa-files"></i>Kategori Pengajuan</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top">
            <span class="glyphicon" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" >
            <span class="glyphicon" aria-hidden="true"></span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
        <!-- /menu footer buttons -->
        </div>
<!-- /Sidebar -->