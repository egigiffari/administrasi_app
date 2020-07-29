<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')

    <title>Gentelella Alela! | </title>

    <!-- Css -->
    @include('frontend.css')
  </head>

  <body class="nav-md footer_fixed">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
            <!-- sidebar menu -->
            @include('frontend.sidebar')
            <!-- /sidebar menu -->
        </div>

        <!-- top navigation -->
        @include('frontend.topbar')
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main"  style="margin-bottom:30px;">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>@yield('title-content')</h3>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          @yield('content')
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer >
          <div class="pull-right">
            PT. Maha Akbar Sejahtera - by <a href="https://dribbble.com/egi_giffari" target="_blank">Egi Giffari</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- Javascript -->
    @include('frontend.js')
    @include('sweetalert::alert')

  </body>
</html>