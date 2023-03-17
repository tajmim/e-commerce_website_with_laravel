<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.templates.head');
</head>

<body>

    <div class="">
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
            @if(auth::guard('admin')->user()->usertype == 'admin')

                <h1 style="font-size: 30px; margin: 20px; font-weight: bold;">All requested Products are here</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col">description</th>
                            <th scope="col">category</th>
                            <th scope="col">price</th>
                            <th scope="col">reseller_price</th>
                            <th scope="col">discount_price</th>
                            <th scope="col">image</th>
                            <th scope="col">status</th>
                            <th scope="col">qunatity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sirial = 0;
                        @endphp
                        @foreach($products as $product)
                        @if($product->status == 'unapproved')
                        @php
                        $sirial++;
                        @endphp
                        <tr>
                            <th scope="row">{{$sirial}}</th>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->reseller_price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td><img style="width: 120px;height: 60px" src="/img_product/{{$product->image}}"></td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <a href="/approve_product/{{$product->id}}" style="cursor:pointer;" class="badge bg-primary">approve</a>
                                <a href="/edit_product/{{$product->id}}" style="cursor:pointer;" class="badge bg-secondary">edit</a>
                                <a href="/delete_product/{{$product->id}}" style="cursor:pointer;" class="badge bg-danger">delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

                <h1 style="font-size: 30px; margin: 20px; font-weight: bold;">All approved Products are here</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col">description</th>
                            <th scope="col">category</th>
                            <th scope="col">price</th>
                            <th scope="col">reseller_price</th>
                            <th scope="col">discount_price</th>
                            <th scope="col">image</th>
                            <th scope="col">status</th>
                            <th scope="col">qunatity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sirial = 0;
                        @endphp
                        @foreach($products as $product)
                        @if($product->status == 'approved')
                        @php
                        $sirial++;
                        @endphp
                        <tr>
                            <th scope="row">{{$sirial}}</th>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->reseller_price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td><img style="width: 120px;height: 60px" src="/img_product/{{$product->image}}"></td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <a href="/unapprove_product/{{$product->id}}" style="cursor:pointer;" class="badge bg-danger">unapprove</a>
                                <a href="/edit_product/{{$product->id}}" style="cursor:pointer;" class="badge bg-secondary">edit</a>
                                <a href="/delete_product/{{$product->id}}" style="cursor:pointer;" class="badge bg-danger">delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

            @endif

            @if(auth::guard('admin')->user()->usertype == 'editor')

                <h1 style="font-size: 30px; margin: 20px; font-weight: bold;">All Products are here</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">title</th>
                            <th scope="col">description</th>
                            <th scope="col">category</th>
                            <th scope="col">price</th>
                            <th scope="col">reseller_price</th>
                            <th scope="col">discount_price</th>
                            <th scope="col">image</th>
                            <th scope="col">status</th>
                            <th scope="col">qunatity</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sirial = 0;
                        @endphp
                        @foreach($products as $product)
                        @php
                        $sirial++;
                        @endphp
                        <tr>
                            <th scope="row">{{$sirial}}</th>
                            <td>{{$product->title}}</td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->category}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->reseller_price}}</td>
                            <td>{{$product->discount_price}}</td>
                            <td><img style="width: 120px;height: 60px" src="/img_product/{{$product->image}}"></td>
                            <td>{{$product->status}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>
                                <a href="/edit_product/{{$product->id}}" style="cursor:pointer;" class="badge bg-secondary">edit</a>
                                <a href="/delete_product/{{$product->id}}" style="cursor:pointer;" class="badge bg-danger">delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            @endif

           


 


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