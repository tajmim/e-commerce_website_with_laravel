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
                <h1 style="font-size: 30px; margin: 20px; font-weight: bold;">resquest for reseller:</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sirial = 0;
                        @endphp
                        @foreach($users as $user)
                        @if($user->usertype=='request_for_reseller')
                        @php
                        $sirial++;
                        @endphp
                        <tr>
                            <th scope="row">{{$sirial}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="/approve_user/{{$user->id}}" style="cursor:pointer;" class="badge bg-danger">approve reseller</a>
                                <a href="/unapprove_user/{{$user->id}}" style="cursor:pointer;" class="badge bg-danger">unapprove reseller</a>

                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

            <!-- reseller -->
                <h1 style="font-size: 30px; margin: 20px; font-weight: bold;">All resellers are here</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sirial = 0;
                        @endphp
                        @foreach($users as $user)
                        @if($user->usertype=='reseller')
                        @php
                        $sirial++;
                        @endphp
                        <tr>
                            <th scope="row">{{$sirial}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="/delete_user/{{$user->id}}" style="cursor:pointer;" class="badge bg-danger">delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>

            <!-- Request  for customer-->
                <h1 style="font-size: 30px; margin: 20px; font-weight: bold;">All customers are here</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">name</th>
                            <th scope="col">email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $sirial = 0;
                        @endphp
                        @foreach($users as $user)
                        @if($user->usertype=='customer')
                        @php
                        $sirial++;
                        @endphp
                        <tr>
                            <th scope="row">{{$sirial}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="/delete_user/{{$user->id}}" style="cursor:pointer;" class="badge bg-danger">delete</a>
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