

<div class="hero_area">
    <div class="hero_social">
        <a href="">
            <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
            <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
            <i class="fa fa-linkedin" aria-hidden="true"></i>
        </a>
        <a href="">
            <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
    </div>
    <!-- header section strats -->
    <header class="header_section">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="{{url('/website')}}">
            <span>
              Timups
            </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{url('website')}}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="watches.html">Shop </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('viewcart')}}"> View Cart</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" method="get" href="{{url('viewcart')}}">Products</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" method="get" href="{{url('order')}}">Orders</a>
                        </li>
                        <form class="form-group" method="get" action="">
                            <input type="search" name="search" id="" class="form-control" placeholder="search by name">
                        <button  type="submit" class="btn btn-primary" style="height:38px; margin-left: 10px;margin-top: 10px ">Search
                        </button>
                        </form>
                    @if(!auth()->user())

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/login')}}"> LOGIN</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/register')}}">REGISTER</a>
                        </li>
                        @endif
                    </ul>
                    <div class="user_option-box">

                        <a href="{{route('cart')}}">
                            <i class="fa fa-cart-plus fs-2" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        Smart Watches
                                    </h1>
                                    <p>
                                        Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{asset('website/images/slider-img.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        Smart Watches
                                    </h1>
                                    <p>
                                        Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Contact Us
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{asset('website/images/slider-img.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item ">
                    <div class="container-fluid ">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="detail-box">
                                    <h1>
                                        Smart Watches
                                    </h1>
                                    <p>
                                        Aenean scelerisque felis ut orci condimentum laoreet. Integer nisi nisl, convallis et augue sit amet, lobortis semper quam.
                                    </p>
                                    <div class="btn-box">
                                        <a href="" class="btn1">
                                            Contact Us
                                        </a>
                                    </div>



                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="img-box">
                                    <img src="{{('website/images/slider-img.png')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ol class="carousel-indicators">
                <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                <li data-target="#customCarousel1" data-slide-to="1"></li>
                <li data-target="#customCarousel1" data-slide-to="2"></li>
            </ol>
        </div>

    </section>
    <!-- end slider section -->
</div>

<!-- shop section -->
