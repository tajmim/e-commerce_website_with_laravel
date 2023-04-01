<nav class="mobile-nav">
                <ul class="mobile-menu">
                    <li class="active">
                        <a href="/">Home</a>

                        
                    </li>
                    <li>
                        <a href="/shop">Shop</a>
                    </li>
                    <li>
                        <a href="product.html" class="sf-with-ul">Product</a>
                        
                    </li>
                    <li>
                        <a href="#">Pages</a>
                        <ul>
                            <li>
                                <a href="about.html">About</a>

                            </li>
                            <li>
                                <a href="contact.html">Contact</a>

                            </li>
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
                                                <
                                            @endif
                                        @endauth
                                    
                                @endif
                            <li><a href="faq.html">FAQs</a></li>
                            <li><a href="404.html">Error 404</a></li>
                            <li><a href="coming-soon.html">Coming Soon</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>

                    </li>
                    <li>
                        <a href="elements-list.html">Elements</a>
                        
                    </li>
                </ul>
            </nav><!-- End .mobile-nav -->