<!-- /.navbar-top-links -->

<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a style="text-align: center" href="{{url('admin/home/dashboard')}}"><i class="fa fa-home fa-fw"></i>Home</a>

            </li>


            <li>
                <a href="#"><i class="fa fa-book fa-fw"></i>Quản Lý Sách<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/theloai/danhsach')}}">Thể Loại</a>
                    </li>
                    <li>
                        <a href="{{url('admin/tacgia/danhsach')}}">Tác Giả</a>
                    </li>
                    <li>
                        <a href="{{url('admin/sach/danhsach')}}">Sách</a>
                    </li>
                    <li>
                        <a href="{{url('admin/image/danhsach')}}">Hình</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-users fa-fw"></i> Quản Lý Khách Hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/khachhang/danhsach')}}">Khách Hàng</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li>
                <a href="#"><i class="fa fa-exchange fa-fw"></i> Quản Lý Đơn Đặt Hàng<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/donhang/danhsach')}}">Đơn Hàng</a><!-- chi tiết đơn hàng nằm trong đây -->
                    </li>
                    <!-- <li>
                        <a href="{{url('admin/giaohang/danhsach')}}">Giao Hàng</a>
                    </li>
                    -->
                </ul>
                <!-- /.nav-second-level -->
            </li>


            <li>
                <a href="#"><i class="fa fa-user fa-fw"></i> Quản Lý Tài Khoản<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{url('admin/user/danhsach')}}">Tài Khoản</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>


        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
