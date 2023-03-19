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


            <h1 style="font-size: 30px; margin: 20px; font-weight: bold;">Edit Product</h1>

            <form action="{{url('edit_submit_product',$edit_product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="product_title" class="form-label">Product title</label>
                    <input type="text" class="form-control" id="product_title" name="titlee" value="{{$edit_product->title}}">
                </div>

                <div class="mb-3">
                    <label for="product_description" class="form-label">Product Description</label>
                    <input type="text" class="form-control" id="product_description" name="product_description" value="{{$edit_product->description}}">
                </div>

                <div class="mb-3">
                    <label for="additional_information" class="form-label">Additional Information</label>
                    <input type="text" class="form-control" id="additional_information" name="additional_information" value="{{$edit_product->additional_information}}">
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select type="text" class="form-control" id="product_category" name="product_category">

                        <option value="{{$edit_product->title}}" selected>{{$edit_product->category}}</option>

                        @foreach($categories as $category)
                        <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                        @endforeach

                    </select>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price"
                        name="price" value="{{$edit_product->price}}">
                </div>

                <div class="mb-3">
                    <label for="reseller_price" class="form-label">Reseller price</label>
                    <input type="text" class="form-control" id="reseller_price" name="reseller_price" value="{{$edit_product->reseller_price}}">
                </div>

                <div class="mb-3">
                    <label for="discount_price" class="form-label">Discount price</label>
                    <input type="text" class="form-control" id="discount_price" name="discount_price" value="{{$edit_product->discount_price}}">
                </div>

                <div class="mb-3">
                    <label>Existing Primary Image</label>
                    <img src="img_product/{{$edit_product->image}}" style="width:120px;height:60px;">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image"name="image">
                </div>

                <div class="mb-3">
                    <label>Existing Secondary Image</label>
                    <img src="img_product/{{$edit_product->image1}}" style="width:120px;height:60px;">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image"name="image1">
                </div>

                <div class="mb-3">
                    <label>Existing Secondary Image</label>
                    <img src="img_product/{{$edit_product->image2}}" style="width:120px;height:60px;">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image"name="image2">
                </div>

                <div class="mb-3">
                    <label>Existing Secondary Image</label>
                    <img src="img_product/{{$edit_product->image3}}" style="width:120px;height:60px;">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image"name="image3">
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="quantity" value="{{$edit_product->quantity}}"name="quantity">
                </div>
                
            
                <button type="submit" class="btn btn-primary">Edit Product</button>
            </form>


            

 


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