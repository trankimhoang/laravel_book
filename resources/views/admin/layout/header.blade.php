<!-- Navigation -->
<!-- phần header cắt sang header.blaze.php -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{url('admin/home/dashboard')}}">Admin</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">

                @if(Auth::check())
                        <li><a href=""><i class="fa fa-user"> Chào bạn <strong style="font-size: 15px;color: red;">{{Auth::user()->name}}</strong></i></a></li>
                        <li><a href="{{route('adminlogout')}}">Đăng xuất</a></li>



                @endif
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <!-- MEnu cắt sang menu.blade.php-->
    @include('admin.layout.menu')
    <!-- /.navbar-static-side -->
</nav>
