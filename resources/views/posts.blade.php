<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png" />
    <!-- Author Meta -->
    <meta name="author" content="colorlib" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <title>Blogger</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet" />
    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="{{ asset('frontend/css/linearicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}" />
</head>

<body>
    <!-- Start Header Area -->
    <header class="default-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container px-3">
                <a class="navbar-brand" href="index.html">
                    <img src="img/logo.png" alt="" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="lnr lnr-menu"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end align-items-center"
                    id="navbarSupportedContent">
                    <ul class="navbar-nav scrollable-menu">
                        <li><a href="/">Home</a></li>
                        <li><a href="./posts.html">Posts</a></li>
                        <li><a href="./categories.html">Categories</a></li>
                        <li><a href="#about">About</a></li>
                        <!-- Dropdown -->
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <i class="fas fa-user-circle" aria-hidden="true"></i>&nbsp;
                                <!-- <i class="fas fa-user"></i> -->
                            </a>
                            <div class="dropdown-menu">
                                <a href="/admin/dashboard/profile" class="dropdown-item" target="_blank">Admin
                                    Subhadip</a>
                                <a class="dropdown-item" href="/admin/dashboard"><i class="fas fa-tv"
                                        aria-hidden="true"></i>&nbsp;
                                    Dashboard</a>
                                <a class="dropdown-item" href="/admin/dashboard"><i class="fas fa-heart"
                                        aria-hidden="true"></i>&nbsp;
                                    Favorite List</a>

                                <a class="dropdown-item" href="/logout" onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt" aria-hidden="true"></i>&nbsp;
                                    Logout
                                </a>

                                <form id="logout-form" action="/logout" method="POST" style="display: none">
                                    <input type="hidden" name="_token"
                                        value="ePJORhim7paUxLLNT4uhKMeJSbwU4kZwpnHVl7Ph" />
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End Header Area -->

    <!-- Start top-section Area -->
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-between align-items-center d-flex">
                <div class="col-lg-8 top-left">
                    <h1 class="text-white mb-20">All Post</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home</a><span class="lnr lnr-arrow-right"></span>
                        </li>
                        <li>
                            <a href="category.html">Category</a><span class="lnr lnr-arrow-right"></span>
                        </li>
                        <li><a href="single.html">Posts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-section Area -->

    <!-- Start post Area -->
    <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
            <div class="container">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-8">
                        <div class="top-posts pt-50">
                            <div class="container">
                                <div class="row justify-content-center">

                                    @foreach ($posts as $post)
                                        <div class="single-posts col-lg-6 col-sm-6">
                                            <img class="img-fluid" src="{{ asset('storage/post/' . $post->image) }}"
                                                alt="" />
                                            <div class="date mt-20 mb-20">{{ $post->created_at->diffForHumans() }}
                                            </div>
                                            <div class="detail">
                                                <a href="#">
                                                    <h4 class="pb-20">
                                                        {{ $post->title }}
                                                    </h4>
                                                </a>
                                                <p>
                                                    {!! Str::limit($post->body, 400) !!}
                                                </p>
                                                <p class="footer pt-20">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                    <a href="#">06 Likes</a>
                                                    <i class="ml-20 fa fa-comment-o" aria-hidden="true"></i>
                                                    <a href="#">02 Comments</a>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="justify-content-center d-flex">
                                        <a class="text-uppercase primary-btn loadmore-btn mt-70 mb-60" href="#">
                                            Load More Post</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-area">
                        <div class="single_widget search_widget">
                            <div id="imaginary_container">
                                <div class="input-group stylish-input-group">
                                    <input type="text" class="form-control" placeholder="Search" />
                                    <span class="input-group-addon">
                                        <button type="submit">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="single_widget about_widget">
                            <img src="img/asset/s-img.jpg" alt="" />
                            <h2 class="text-uppercase">Adele Gonzalez</h2>
                            <p>
                                MCSE boot camps have its supporters and its detractors. Some
                                people do not understand why you should have to spend money
                            </p>
                            <div class="social-link">
                                <a href="#"><button class="btn">
                                        <i class="fa fa-facebook" aria-hidden="true"></i> Like
                                    </button></a>
                                <a href="#"><button class="btn">
                                        <i class="fa fa-twitter" aria-hidden="true"></i> follow
                                    </button></a>
                            </div>
                        </div>
                        <div class="single_widget cat_widget">
                            <h4 class="text-uppercase pb-20">post categories</h4>
                            <ul>
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="#">{{$category->name}} <span>37</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="single_widget recent_widget">
                            <h4 class="text-uppercase pb-20">Recent Posts</h4>
                            <div class="active-recent-carusel">
                                <div class="item">
                                    <img src="img/asset/slider.jpg" alt="" />
                                    <p class="mt-20 title text-uppercase">
                                        Home Audio Recording <br />
                                        For Everyone
                                    </p>
                                    <p>
                                        02 Hours ago
                                        <span>
                                            <i class="fa fa-heart-o" aria-hidden="true"></i> 06
                                            <i class="fa fa-comment-o" aria-hidden="true"></i>02</span>
                                    </p>
                                </div>
                                <div class="item">
                                    <img src="img/asset/slider.jpg" alt="" />
                                    <p class="mt-20 title text-uppercase">
                                        Home Audio Recording <br />
                                        For Everyone
                                    </p>
                                    <p>
                                        02 Hours ago
                                        <span>
                                            <i class="fa fa-heart-o" aria-hidden="true"></i> 06
                                            <i class="fa fa-comment-o" aria-hidden="true"></i>02</span>
                                    </p>
                                </div>
                                <div class="item">
                                    <img src="img/asset/slider.jpg" alt="" />
                                    <p class="mt-20 title text-uppercase">
                                        Home Audio Recording <br />
                                        For Everyone
                                    </p>
                                    <p>
                                        02 Hours ago
                                        <span>
                                            <i class="fa fa-heart-o" aria-hidden="true"></i> 06
                                            <i class="fa fa-comment-o" aria-hidden="true"></i>02</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="single_widget cat_widget">
                            <h4 class="text-uppercase pb-20">post archive</h4>
                            <ul>
                                <li>
                                    <a href="#">Dec'17 <span>37</span></a>
                                </li>
                            </ul>
                        </div>
                        <div class="single_widget tag_widget">
                            <h4 class="text-uppercase pb-20">Tag Clouds</h4>
                            <ul>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Art</a></li>
                                <li><a href="#">Adventure</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Technology</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Adventure</a></li>
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Technology</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End post Area -->
    </div>
    <!-- End post Area -->

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <div class="single-footer-widget">
                        <h6>Top Products</h6>
                        <ul class="footer-nav">
                            <li><a href="#">Managed Website</a></li>
                            <li><a href="#">Manage Reputation</a></li>
                            <li><a href="#">Power Tools</a></li>
                            <li><a href="#">Marketing Service</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="single-footer-widget newsletter">
                        <h6>Newsletter</h6>
                        <p>
                            You can trust us. we only send promo offers, not a single spam.
                        </p>
                        <div id="mc_embed_signup">
                            <form target="_blank" novalidate="true"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="form-inline">
                                <div class="form-group row" style="width: 100%">
                                    <div class="col-lg-8 col-md-12">
                                        <input name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter Email '" required="" type="email" />
                                        <div style="position: absolute; left: -5000px">
                                            <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value=""
                                                type="text" />
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-12">
                                        <button class="nw-btn primary-btn">
                                            Subscribe<span class="lnr lnr-arrow-right"></span>
                                        </button>
                                    </div>
                                </div>
                                <div class="info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">Instragram Feed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="img/i1.jpg" alt="" /></li>
                            <li><img src="img/i2.jpg" alt="" /></li>
                            <li><img src="img/i3.jpg" alt="" /></li>
                            <li><img src="img/i4.jpg" alt="" /></li>
                            <li><img src="img/i5.jpg" alt="" /></li>
                            <li><img src="img/i6.jpg" alt="" /></li>
                            <li><img src="img/i7.jpg" alt="" /></li>
                            <li><img src="img/i8.jpg" alt="" /></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between">
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <p class="col-lg-8 col-sm-12 footer-text">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    All rights reserved | This template is made with
                    <i class="fa fa-heart-o" aria-hidden="true"></i> by
                    <a href="https://colorlib.com" target="_blank">Colorlib</a>
                </p>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/parallax.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>