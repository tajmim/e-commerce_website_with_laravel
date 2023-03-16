<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.templates.head');
</head>

<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        @include('admin.templates.spinner');
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        @include('admin.templates.sidebar');
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">


            <!-- Navbar Start -->
            @include('admin.templates.navbar');
            <!-- Navbar End -->


            <h1 style="font-size: 30px; margin: 20px; font-weight: bold;">Add Category</h1>

            <form action="{{url('add_category')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="category_name" class="form-label">Category name</label>
                    <input type="text" class="form-control" id="category_name"
                        name="category_name">
                   
                </div>
                
            
                <button type="submit" class="btn btn-primary">Add category</button>
            </form>


            
            <h1></h1>
            

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $sirial = 0;
                    @endphp
                    @foreach($categories as $category)
                    @php
                    $sirial++;
                    @endphp
                    <tr>
                        <th scope="row">{{$sirial}}</th>
                        <td>{{$category->category_name}}</td>
                        <td><a href="/delete_cat/{{$category->id}}" onclick="return confirm('are you sure want to delete {{$category->category_name}} category?')")>delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

           


 


            <!-- Footer Start -->
            @include('admin.templates.footer');
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="adminF/lib/chart/chart.min.js"></script>
    <script src="adminF/lib/easing/easing.min.js"></script>
    <script src="adminF/lib/waypoints/waypoints.min.js"></script>
    <script src="adminF/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="adminF/lib/tempusdominus/js/moment.min.js"></script>
    <script src="adminF/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="adminF/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="adminF/js/main.js"></script>
</body>

</html>