<div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="adminF/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::guard('admin')->user()->name }}</h6>
                        <span>{{ Auth::guard('admin')->user()->usertype}}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="admin/dashboard" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Product</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/add_product" class="dropdown-item">Add Product</a>
                            <a href="/view_product" class="dropdown-item">View Product</a>
                        </div>
                    </div>
                    <a href="/route-categories" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Categories</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Manage Users</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="manage_customer" class="dropdown-item">Manage Customers</a>
                            @if( Auth::guard('admin')->user()->usertype == 'admin' )
                            <a href="/manage_editors" class="dropdown-item">Manage Editors</a>
                            @endif
                        </div>
                    </div>
                    <a href="table.html" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    
                </div>
            </nav>
        </div>