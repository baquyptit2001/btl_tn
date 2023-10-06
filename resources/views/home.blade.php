@extends('layouts.app')
@php($title = 'Home')
@section('title', $title)

@section('content')

    <section class="hero-wrap py-md-4">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters justify-content-center slider-text align-items-center"
                 data-scrollax-parent="true">
                <div class="col-md-10 ftco-animate py-5">
                    <h1 class="text-center">Q<span>uy</span>NB</h1>
                    <div class="row pb-md-5">
                        <div class="col-md-8">
                            <h2>Hello! I'm Giller Moose, I Provide Newest News Update About Digital</h2>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.
                                It is a paradisematic country, in which roasted parts of sentences fly into your
                                mouth.</p>
                        </div>
                        <div class="col-md-4">
                            <div class="author">
                                <div class="img" style="background-image: url({{asset("assets/images/person_1.jpg")}});"></div>
                                <div class="text">
                                    <h3>Giller Moose</h3>
                                    <p>A small river named Duden flows by their place and supplies it with the necessary
                                        regelialia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container-fluid px-md-4">
            <div class="row no-gutters">
                <div class="col-md-12 blog-wrap">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6 img img-blog js-fullheight"
                             style="background-image: url({{asset("assets/images/image_1.jpg")}});">
                        </div>
                        <div class="col-md-6">
                            <div class="text p-md-5 py-5 px-4 ftco-animate">
                                <p class="meta">
                                    <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 27, 2020</a>
                                    <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                    <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                                </p>
                                <h2 class="mb-4"><a href="blog-single.html">Turning a digital brand into a real world
                                        experience</a></h2>
                                <div class="icon d-flex align-items-center">
                                    <div class="img" style="background-image: url({{asset("assets/images/person_1.jpg")}});"></div>
                                    <div class="position pl-3">
                                        <h4 class="mb-0">Jamie Jonson</h4>
                                        <span>CEO, Product Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 blog-wrap bg-darken">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6 img img-blog js-fullheight order-md-last"
                             style="background-image: url({{asset("assets/images/image_2.jpg")}});">
                        </div>
                        <div class="col-md-6">
                            <div class="text p-md-5 py-5 px-4 ftco-animate">
                                <p class="meta">
                                    <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 27, 2020</a>
                                    <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                    <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                                </p>
                                <h2 class="mb-4"><a href="blog-single.html">Turning a digital brand into a real world
                                        experience</a></h2>
                                <div class="icon d-flex align-items-center">
                                    <div class="img" style="background-image: url({{asset("assets/images/person_2.jpg")}});"></div>
                                    <div class="position pl-3">
                                        <h4 class="mb-0">Jamie Jonson</h4>
                                        <span>CEO, Product Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 blog-wrap">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6 img img-blog js-fullheight"
                             style="background-image: url({{asset("assets/images/image_3.jpg")}});">
                        </div>
                        <div class="col-md-6">
                            <div class="text p-md-5 py-5 px-4 ftco-animate">
                                <p class="meta">
                                    <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 27, 2020</a>
                                    <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                    <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                                </p>
                                <h2 class="mb-4"><a href="blog-single.html">Turning a digital brand into a real world
                                        experience</a></h2>
                                <div class="icon d-flex align-items-center">
                                    <div class="img" style="background-image: url({{asset("assets/images/person_3.jpg")}});"></div>
                                    <div class="position pl-3">
                                        <h4 class="mb-0">Jamie Jonson</h4>
                                        <span>CEO, Product Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 blog-wrap bg-darken">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6 img img-blog js-fullheight order-md-last"
                             style="background-image: url({{asset("assets/images/image_5.jpg")}});">
                        </div>
                        <div class="col-md-6">
                            <div class="text p-md-5 py-5 px-4 ftco-animate">
                                <p class="meta">
                                    <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 27, 2020</a>
                                    <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                    <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                                </p>
                                <h2 class="mb-4"><a href="blog-single.html">Turning a digital brand into a real world
                                        experience</a></h2>
                                <div class="icon d-flex align-items-center">
                                    <div class="img" style="background-image: url({{asset("assets/images/person_4.jpg")}});"></div>
                                    <div class="position pl-3">
                                        <h4 class="mb-0">Jamie Jonson</h4>
                                        <span>CEO, Product Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 blog-wrap">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6 img img-blog js-fullheight"
                             style="background-image: url({{asset("assets/images/image_6.jpg")}});">
                        </div>
                        <div class="col-md-6">
                            <div class="text p-md-5 py-5 px-4 ftco-animate">
                                <p class="meta">
                                    <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 27, 2020</a>
                                    <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                    <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                                </p>
                                <h2 class="mb-4"><a href="blog-single.html">Turning a digital brand into a real world
                                        experience</a></h2>
                                <div class="icon d-flex align-items-center">
                                    <div class="img" style="background-image: url({{asset("assets/images/person_1.jpg")}});"></div>
                                    <div class="position pl-3">
                                        <h4 class="mb-0">Jamie Jonson</h4>
                                        <span>CEO, Product Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 blog-wrap bg-darken">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6 img img-blog js-fullheight order-md-last"
                             style="background-image: url({{asset("assets/images/image_7.jpg")}});">
                        </div>
                        <div class="col-md-6">
                            <div class="text p-md-5 py-5 px-4 ftco-animate">
                                <p class="meta">
                                    <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 27, 2020</a>
                                    <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                    <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                                </p>
                                <h2 class="mb-4"><a href="blog-single.html">Turning a digital brand into a real world
                                        experience</a></h2>
                                <div class="icon d-flex align-items-center">
                                    <div class="img" style="background-image: url({{asset("assets/images/person_2.jpg")}});"></div>
                                    <div class="position pl-3">
                                        <h4 class="mb-0">Jamie Jonson</h4>
                                        <span>CEO, Product Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 blog-wrap">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-6 img img-blog js-fullheight"
                             style="background-image: url({{asset("assets/images/image_8.jpg")}});">
                        </div>
                        <div class="col-md-6">
                            <div class="text p-md-5 py-5 px-4 ftco-animate">
                                <p class="meta">
                                    <a href="#"><span class="fa fa-calendar mr-2"></span>Sept. 27, 2020</a>
                                    <a href="#"><span class="fa fa-user mr-2"></span>Admin</a>
                                    <a href="#" class="meta-chat"><span class="fa fa-comment mr-2"></span> 3</a>
                                </p>
                                <h2 class="mb-4"><a href="blog-single.html">Turning a digital brand into a real world
                                        experience</a></h2>
                                <div class="icon d-flex align-items-center">
                                    <div class="img" style="background-image: url({{asset("assets/images/person_3.jpg")}});"></div>
                                    <div class="position pl-3">
                                        <h4 class="mb-0">Jamie Jonson</h4>
                                        <span>CEO, Product Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-md-12 py-md-5 text-center">
                    <a href="blog.html" class="btn-custom-blog">View all articles <span
                            class="fa fa-chevron-right"></span></a>
                </div>
            </div>
        </div>
    </section>

    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00"/>
        </svg>
    </div>
@endsection
