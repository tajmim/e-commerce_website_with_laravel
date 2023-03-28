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


           

            <!-- Request  for reseller-->
                <h1 style="font-size: 30px; margin: 20px; font-weight: bold;">running order:</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">first name</th>
                            <th scope="col">last name</th>
                            <th scope="col">email</th>
                            <th scope="col">title</th>
                            <th scope="col">order_quantity</th>
                            <th scope="col">price</th>
                            <th scope="col">status</th>
                            <th scope="col">Action</th>
                            <th scope="col">Order Details</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sirial = 0;
                        @endphp
                        @foreach($orders as $order)
                        @if($order->order_status != 'delivered' && $order->order_status != 'canceled')
                        @php
                        $sirial++;
                        @endphp
                        <tr>
                            <th scope="row">{{$sirial}}</th>
                            <td>{{$order->first_name}}</td>
                            <td>{{$order->last_name}}</td>
                            <td>{{$order->email}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->product_quantity}}</td>
                            <td>{{$order->product_price}}</td>

                            <td><span class="badge
                                @if($order->order_status == 'pending')
                                bg-danger
                                @else
                                bg-primary
                                @endif
                                ">{{$order->order_status}}</span></td>
                            <td>
                                @if($order->order_status == 'pending')
                                <a href="/accept_order/{{$order->id}}" style="cursor:pointer;" class="badge bg-primary">accept</a>
                                @endif

                                @if($order->order_status == 'accepted')
                                <a href="/in_ship/{{$order->id}}" style="cursor:pointer;" class="badge bg-primary">in-ship</a>
                                @endif

                                @if($order->order_status == 'in_ship')
                                <a href="/delivered_order/{{$order->id}}" style="cursor:pointer;" class="badge bg-primary">delivered</a>
                                @endif
                                <a href="/cancel_order/{{$order->id}}" style="cursor:pointer;" class="badge bg-danger">cancel</a>
                            </td>
                            <td>
                                <a href="/order_details/{{$order->id}}" target="_blank" style="cursor:pointer;" class="badge bg-primary">details</a>
                            </td>
                        </tr>
                        @endif
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