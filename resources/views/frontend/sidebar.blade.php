<!-- Sidebar -->
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('dashboard') }}" class="site_title"><!-- <i class="fa fa-paw"></i> --> <span>SIPATEN!</span></a>
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
                        <li><a href="{{ route('product.index') }}">List Product </a></li>
                        <li><a href="{{ route('brand.index') }}">Brand</a></li>
                        <li><a href="{{ route('category.index') }}">Category</a></li>
                        <!-- <li><a href="#">Supplier</a></li> -->
                    </ul>
                    </li>
                </ul>
            </div>
            <!-- <div class="menu_section">
                <h3>Pemasaran</h3>
                <ul class="nav side-menu">
                    <li><a href="#"><i class="fa fa-paste"></i> Penawaran <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('penawaran.index') }}">List Penawaran</a></li>
                            <li><a href="#">List BoQ</a></li>
                        </ul>
                    </li>
                </ul>
            </div> -->
            <div class="menu_section">
                <h3>Pengajuan</h3>
                @inject('division', 'App\Division')
                @inject('categories', 'App\RequestCategory')
                <?php $division = $division::all(); $categories = $categories::all() ?>
                <ul class="nav side-menu">
                    @foreach($division as $div)
                    @if($div->id == 1)
                    @continue
                    @endif
                    @if(Auth::user()->level->capacity == 90 || Auth::user()->level->capacity == 30 || Auth::user()->level->capacity == 20 || Auth::user()->division_id == $div->id)
                    <li class=""><a><i class="fa fa-suitcase"></i> {{$div->name}} <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                        @foreach($categories as $category)
                            @if($category->division_id == $div->id)
                            <li class=""><a>{{$category->name}} <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('requestby.category.index', $category->id) }}">Pengajuan</a></li>`
                                    <li><a href="{{ route('request.report.index', $category->id) }}">Laporan</a></li>
                                </ul>
                            </li>
                            @elseif($category->division_id == $div->id)
                            <li class=""><a>{{$category->name}} <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('requestby.category.index', $category->id) }}">Pengajuan</a></li>`
                                    <li><a href="{{ route('request.report.index', $category->id) }}">Laporan</a></li>
                                </ul>
                            </li>
                            @elseif($category->division_id == $div->id)
                            <li class=""><a>{{$category->name}} <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('requestby.category.index', $category->id) }}">Pengajuan</a></li>`
                                    <li><a href="{{ route('request.report.index', $category->id) }}">Laporan</a></li>
                                </ul>
                            </li>
                            @elseif($category->division_id == $div->id)
                            <li class=""><a>{{$category->name}} <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('requestby.category.index', $category->id) }}">Pengajuan</a></li>`
                                    <li><a href="{{ route('request.report.index', $category->id) }}">Laporan</a></li>
                                </ul>
                            </li>
                            @endif
                            <!-- <li class=""><a>{{$category->name}} </a>
                                <ul class="nav child_menu">
                                    <li><a href="{{ route('requestby.category.index', $category->id) }}">Pengajuan</a></li>`
                                    <li><a href="{{ route('request.report.index', $category->id) }}">Laporan</a></li>
                                </ul>
                            </li> -->
                        @endforeach
                        </ul>
                    </li>
                    @endif
                    @endforeach
                    @if(Auth::user()->level->capacity > 10)
                    <li><a href="{{ route('request.pengajuan.archive') }}"><i class="fa fa-archive"></i> Archive</a></li>
                    @endif
                </ul>
            </div>

            <div class="menu_section">
                <h3>Setting</h3>
                <ul class="nav side-menu">
                    <li><a href="{{ route('user.profile') }}"><i class="fa fa-user"></i> Profile</a></li>
                    @if(Auth::user()->level->capacity > 10)
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
                            <li><a href="{{ route('request.responsible.index') }}">Penanggung Jawab</a></li>
                            <li><a href="{{ route('request.type.index') }}">Jenis Pengajuan</a></li>
                            <li><a href="{{ route('request.category.index') }}">Kategori Pengajuan</a></li>
                            <!-- <li><a href="{{ route('request.category.index') }}">Syarat Dan Ketentuan</a></li> -->
                        </ul>
                    </li>
                    <li class=""><a><i class="fa fa-file"></i> Penawaran <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="{{ route('penawaran.responsible') }}">Penanggung Jawab</a></li>
                        </ul>
                    </li>
                    <li class=""><a href="{{ route('report.setting.index') }}"><i class="fa fa-file"></i> Laporan</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings" href="{{route('user.edit', Auth::id())}}">
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