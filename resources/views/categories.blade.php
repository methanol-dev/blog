<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/elements/fav.png" />
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
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}" />
</head>

<body>
    <!-- Start banner Area -->
    <section class="generic-banner relative">
        <!-- Start Header Area -->
        <header class="default-header">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container px-3">
                    <a class="navbar-brand" href="index.html">
                        <img src="img/logo.png" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="lnr lnr-menu"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-end align-items-center"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav scrollable-menu">
                            <li><a href="/">Home</a></li>
                            <li><a href="{{ route('posts') }}">Posts</a></li>
                            <li><a href="{{ route('categories') }}">Categories</a></li>
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
                                        <i class="fas fa-sign-out-alt" aria-hidden="true"></i>&nbsp; Logout
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
        <div class="container">
            <div class="row height align-items-center justify-content-center">
                <div class="col-lg-10">
                    <div class="generic-banner-content">
                        <h2 class="text-white text-center">The Category Page</h2>
                        <p class="text-white">
                            This page shows all the categories that available by the site
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- About Generic Start -->
    <div class="main-wrapper">
        <!-- Start fashion Area -->
        <section class="fashion-area section-gap" id="fashion">
            <div class="container">
                <div class="row">
                    @foreach ($categories as $category)
                    <div class="col-lg-3 col-md-6 single-fashion">
                        <img class="img-fluid" src="{{asset('storage/category/'.$category->image)}}" alt="" />
                        <p class="date">{{$category->created_at}}</p>
                        <h4><a href="#">{{$category->name}}</a></h4>
                        <p>{{$category->description}}</p>
                        <div class="meta-bottom d-flex justify-content-between">
                            <p><span class="lnr lnr-heart"></span> 15 Likes</p>
                            <p><span class="lnr lnr-bubble"></span> 02 Comments</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End fashion Area -->

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
                                You can trust us. we only send promo offers, not a single
                                spam.
                            </p>
                            <div id="mc_embed_signup">
                                <form target="_blank" novalidate="true"
                                    action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                    method="get" class="form-inline">
                                    <div class="form-group row" style="width: 100%">
                                        <div class="col-lg-8 col-md-12">
                                            <input name="EMAIL" placeholder="Enter Email"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Email '" required="" type="email" />
                                            <div style="position: absolute; left: -5000px">
                                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1"
                                                    value="" type="text" />
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
    </div>
    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
    </script>
    <script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>
