<!DOCTYPE html>
<html lang="en">


<!-- molla/product.html  22 Nov 2019 09:54:50 GMT -->
<head>
    @include('templates.head');
</head>

<body>
    <div class="page-wrapper">
        <!-- header -->

        @include('templates.header');
        <!-- End .header -->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Default</li>
                    </ol>

                    
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div class="product-details-top">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="product-gallery product-gallery-vertical">
                                    <div class="row">
                                        <figure class="product-main-image">
                                            <img id="product-zoom" src="img_product/{{$product->image}}" data-zoom-image="img_product/{{$product->image}}" alt="product image">

                                            <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                                <i class="icon-arrows"></i>
                                            </a>
                                        </figure><!-- End .product-main-image -->

                                        <div id="product-zoom-gallery" class="product-image-gallery">
                                            <a class="product-gallery-item active" href="#" data-image="img_product/{{$product->image}}" data-zoom-image="img_product/{{$product->image}}">
                                                <img src="img_product/{{$product->image}}" alt="product side">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="img_product/{{$product->image1}}" data-zoom-image="img_product/{{$product->image1}}">
                                                <img src="img_product/{{$product->image1}}" alt="product cross">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="img_product/{{$product->image2}}" data-zoom-image="img_product/{{$product->image2}}">
                                                <img src="img_product/{{$product->image2}}" alt="product with model">
                                            </a>

                                            <a class="product-gallery-item" href="#" data-image="img_product/{{$product->image3}}" data-zoom-image="img_product/{{$product->image3}}">
                                                <img src="img_product/{{$product->image3}}" alt="product back">
                                            </a>
                                        </div><!-- End .product-image-gallery -->
                                    </div><!-- End .row -->
                                </div><!-- End .product-gallery -->
                            </div><!-- End .col-md-6 -->

                            <div class="col-md-6">
                                <div class="product-details">
                                    <h1 class="product-title">{{$product->title}}</h1><!-- End .product-title -->

                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <a class="ratings-text" href="#product-review-link" id="review-link">( {{ count($reviews) }} Reviews )</a>
                                    </div><!-- End .rating-container -->

                                    <div class="product-price">
                                        

                                        @auth

                                            @if( Auth::guard('web')->user()->usertype == 'reseller' )
                                               <h1 style="width: 100%;">Regular Price <span style="text-decoration:line-through;color:blue">{{$product->price}}</span> </h1>

                                               <h1 style="width: 100%;">Reseller price : <span style="color:blue;">{{$product->reseller_price}}</span></h1>
                                            @else
                                            <h1 style="width: 100%;">Regular Price <span style="color:blue;">{{$product->price}}</span> </h1>
                                            <br>
                                            @endif

                                        @else
                                        <p style="width: 100%;">Regular Price <span style="color:blue;">{{$product->price}}</span> </p>

                                        @endauth



                                    </div><!-- End .product-price -->

                                    <div class="product-content">
                                        <p>{{$product->description}}</p>
                                    </div><!-- End .product-content -->



                                    <div class="details-filter-row details-row-size">
                                        <label for="size">Size:</label>
                                        <div class="select-custom">
                                            <select name="size" id="size" class="form-control">
                                                <option value="#" selected="selected">Select a size</option>
                                                <option value="s">Small</option>
                                                <option value="m">Medium</option>
                                                <option value="l">Large</option>
                                                <option value="xl">Extra Large</option>
                                            </select>
                                        </div><!-- End .select-custom -->

                                        <a href="#" class="size-guide"><i class="icon-th-list"></i>size guide</a>
                                    </div><!-- End .details-filter-row -->

                                    
                                    <div class="product-details-action">
                                        

                                        <form action="{{url('add_to_cart',$product->id)}}" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <!-- <label for="qty" class="form-level">Qty:</label> -->
                                                        <input type="number" id="sticky-cart-qty" class="form-control" value="1" min="
                                                        @auth
                                                        @if( auth::guard('web')->user()->usertype == 'user' )
                                                        1
                                                        @else
                                                        {{$product->minimum_quantity_reseller}}
                                                        @endif
                                                        @endauth
                                                        " max="{{$product->quantity}}"  step="1" data-decimals="0" name="quantity" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <input style="padding: 8px 26px;" type="submit" name="submit" class="btn-product btn-cart" value="Add to cart">
                                                </div>
                                            </div>
                                            
                                            
                                        </form>

                                        <div class="details-action-wrapper">
                                            @auth
                                                <?php
                                                $found = 0;
                                                foreach ($wishes as $wish) {
                                                    if($wish->product_id==$product->id){
                                                        $found = 1;
                                                        $delete_wish_id = $wish->id;


                                                    } 
                                                }

                                                 ?>
                                                 
                                                 @if($found == 0)
                                                    <a href="/add_to_wishlist/{{$product->id}}" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                                @else
                                                    <a href="/delete_wish/{{$delete_wish_id}}" class="btn-product btn-wishlist delete-wish-icon" title="Wishlist"><span>Delete from Wishlist</span></a>
                                                @endif
                                            @endauth
                                        </div>


                                        
                                    </div><!-- End .product-details-action -->

                                    <div class="product-details-footer">
                                        <div class="product-cat">
                                            <span>Category:</span>
                                            <span style="color: #39f;">{{$product->category}}</span>
                                        </div><!-- End .product-cat -->
                                    </div><!-- End .product-details-footer -->
                                </div><!-- End .product-details -->
                            </div><!-- End .col-md-6 -->
                        </div><!-- End .row -->
                    </div><!-- End .product-details-top -->

                    <div class="product-details-tab">
                        <ul class="nav nav-pills justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                            </li>

                            <!-- #product-desc-tab -->
                            <li class="nav-item">
                                <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews {{ count($reviews) }}</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                                <div class="product-desc-content">
                                    <h3>Product Information</h3>
                                    <p>{{$product->description}}</p>
                                    
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                                <div class="product-desc-content">
                                    <h3>Information</h3>
                                    <p>{{$product->additional_information}} </p>

                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                                <div class="product-desc-content">
                                    <h3>Delivery & returns</h3>
                                    <p>We deliver to over 100 countries around the world. For full details of the delivery options we offer, please view our <a href="#">Delivery information</a><br>
                                    We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
                                </div><!-- End .product-desc-content -->
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                                <div class="reviews">
                                    <h3>Reviews {{ count($reviews) }}</h3>

                                    @foreach($reviews as $review)
                                    <div class="review">
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <h4><a href="#">{{$review->first_name}} {{$review->last_name}} </a></h4>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
                                                    </div><!-- End .ratings -->
                                                </div><!-- End .rating-container -->
                                                <span class="review-date">{{ $review->created_at->diffForHumans() }}</span>
                                            </div><!-- End .col -->
                                            <div class="col">
                                                <h4>{{$review->review}} </h4>


                                                <div class="review-action">
                                                    <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                                    <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                                </div><!-- End .review-action -->
                                            </div><!-- End .col-auto -->
                                        </div><!-- End .row -->
                                    </div>
                                    @endforeach

                                    <!-- End .review -->

                                </div><!-- End .reviews -->
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .product-details-tab -->

                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>
                        @foreach($like_products as $like_product)
                        <div class="product product-7 text-center">
                            <figure class="product-media">
                                
                                <a href="product.html">
                                    <img src="/img_product/{{$like_product->image}}" alt="Product image" class="product-image">
                                </a>

                                <div class="product-action-vertical">
                                    <a href="/add_to_wishlist/{{$like_product->id}}" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                    
                                </div><!-- End .product-action-vertical -->

                                <div class="product-action">
                                    <form action="{{url('add_to_cart',$like_product->id)}}" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <!-- <label for="qty" class="form-level">Qty:</label> -->
                                                        <input type="number" id="sticky-cart-qty" class="form-control" value="1" min="
                                                        @auth
                                                        @if( auth::guard('web')->user()->usertype == 'user' )
                                                        1
                                                        @else
                                                        {{$like_product->minimum_quantity_reseller}}
                                                        @endif
                                                        @endauth
                                                        " max="{{$product->quantity}}"  step="1" data-decimals="0" name="quantity" required>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <input style="padding: 8px 26px;" type="submit" name="submit" class="btn-product btn-cart" value="Add to cart">
                                                </div>
                                            </div>
                                            
                                            
                                        </form>
                                    
                                </div><!-- End .product-action -->
                            </figure><!-- End .product-media -->



                            <div class="product-body">
                                <div class="product-cat">
                                    <a href="#">{{$like_product->category}}</a>
                                </div><!-- End .product-cat -->
                                <h3 class="product-title"><a href="#">{{$like_product->title}} </a></h3><!-- End .product-title -->
                                <div class="product-price">
                                    @auth
                                           @if(Auth::guard('web')->user()->usertype == 'reseller')
                                           {{$like_product->reseller_price}}
                                           @else
                                           {{$like_product->price}}
                                           @endif
                                    @else
                                        {{$like_product->price}}
                                    @endauth
                                </div><!-- End .product-price -->
                                <div class="ratings-container">
                                    <div class="ratings">
                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
                                    </div><!-- End .ratings -->
                                    <span class="ratings-text">( {{ count($reviews) }} Reviews )</span>
                                </div><!-- End .rating-container -->

                                <div class="product-na`v product-nav-thumbs">
                                    <a href="#" class="active">
                                        <img src="/img_product/{{$like_product->image}}" alt="product desc">
                                    </a>
                                    <a href="#">
                                        <img src="img_product/{{$like_product->image1}}" alt="product desc">
                                    </a>

                                    <a href="#">
                                        <img src="img_product/{{$like_product->image2}}" alt="product desc">
                                    </a>
                                </div><!-- End .product-nav -->
                            </div><!-- End .product-body -->
                        </div><!-- End .product -->
                        @endforeach

                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

       
       @include('templates.footer');
       <!-- End .footer -->
    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Sticky Bar -->
    

    <!-- End .sticky-bar -->

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>

            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>
            
            @include('templates.mobile-menu');

            
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Username or email address *</label>
                                            <input type="text" class="form-control" id="singin-email" name="singin-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Password *</label>
                                            <input type="password" class="form-control" id="singin-password" name="singin-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="register-email">Your email address *</label>
                                            <input type="email" class="form-control" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Password *</label>
                                            <input type="password" class="form-control" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                                <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">or sign in with</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Login With Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login  btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Login With Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    <!-- Plugins JS File -->
    <script src="user/assets/js/jquery.min.js"></script>
    <script src="user/assets/js/bootstrap.bundle.min.js"></script>
    <script src="user/assets/js/jquery.hoverIntent.min.js"></script>
    <script src="user/assets/js/jquery.waypoints.min.js"></script>
    <script src="user/assets/js/superfish.min.js"></script>
    <script src="user/assets/js/owl.carousel.min.js"></script>
    <script src="user/assets/js/bootstrap-input-spinner.js"></script>
    <script src="user/assets/js/jquery.elevateZoom.min.js"></script>
    <script src="user/assets/js/bootstrap-input-spinner.js"></script>
    <script src="user/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Main JS File -->
    <script src="user/assets/js/main.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>