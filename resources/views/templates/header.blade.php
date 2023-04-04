        <header class="header">
            <div class="header-top">
                <div class="container-fluid">
                    <div class="header-left">
                        <div class="header-dropdown">
                            <a href="#">Usd</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">Eur</a></li>
                                    <li><a href="#">Usd</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropdown -->

                        <div class="header-dropdown">
                            <a href="#">Eng</a>
                            <div class="header-menu">
                                <ul>
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </div><!-- End .header-menu -->
                        </div><!-- End .header-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <ul class="top-menu">
                            <li>
                                <a href="#">Links</a>
                                <ul>
                                    <li><a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    @auth
                                    <li><a class="position-relative" href="/view_wishlist">Wishlist
                                    <span class="position-absolute top-0 end-100 translate-middle badge rounded-pill bg-primary text-white" style="font-size: 11px;right: -18px;top: -6px;">{{count($wishes)}}</span> </a></li>
                                    @endauth


                                    
                                @if (Route::has('login'))
                                    
                                        @auth
                                        <li>
                                            <x-app-layout>
                                            </x-app-layout>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{ route('login') }}">Log in</a>
                                        </li>
                                            @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}">Register</a>
                                                
                                            @endif
                                        @endauth
                                    
                                @endif
                                  


                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-top -->

            <div class="header-middle sticky-header">
                <div class="container-fluid">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>

                        <a href="index.html" class="logo">
                            <img src="user/assets/images/logo.png" alt="Molla Logo" width="105" height="25">
                        </a>

                        <nav class="main-nav">
                            <ul class="menu ">
                                <li class="megamenu-container active">
                                    <a href="/" >Home</a>
                                </li>
                                <li>
                                    <a href="/shop">Shop</a>
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Pages</a>
                                    <ul>
                                        <li>
                                            <a href="about.html" class="sf-with-ul">About</a>

                                                                                    </li>
                                        <li>
                                            <a href="contact.html" class="sf-with-ul">Contact</a>
                                        </li>                                        <li><a href="faq.html">FAQs</a></li>
                                        <li><a href="404.html">Error 404</a></li>                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.html" class="sf-with-ul">Blog</a>
                                </li>                            
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-left -->

                    <div class="header-right">
                        <div class="header-search">
                            <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <label for="q" class="sr-only">Search</label>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->

                        
                        @auth
                        <div class="">
                            <a href="/view_cart" style="font-size:30px" class="position-relative">
                                <i class="icon-shopping-cart"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary text-white" style="font-size:13px">{{ count($carts) }}</span>
                                
                            </a>

                            
                        </div><!-- End .cart-dropdown -->
                        @endauth
                        

                    </div><!-- End .header-right -->
                </div><!-- End .container-fluid -->
            </div><!-- End .header-middle -->
        </header>