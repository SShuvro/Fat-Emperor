@extends("layouts.master")

@section('section')
    {{-- @php
        dd($products);
    @endphp --}}

    <!-- Specialities Section Start -->
    <section id="section-specialities" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <h4 class="small center">Explore</h4>
                    <h4 class="center title">Our Specialities</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="section specialities">
                        <div class="voffset-50"></div>
                        <div class="row">
                            <div class="contentslide slide-specialities">
                                <div class="sliderslide col-lg-4 equalHW">
                                    <div class="sliderslide-content specialities">
                                        <img src="{{ URL::asset('public/frontend/assets/img/demo/svg/hamburger.svg') }}"
                                            class="filter" alt="Gourmet Burgers" />
                                        <div class="voffset-15"></div>
                                        <h4>Gourmet Burgers</h4>
                                        <div class="voffset-20"></div>
                                        <p>A winning gourmet burger comes down to four things. A patty to be proud of, a
                                            sauce to make your mouth water, a great bun and, of course, a side order of
                                            potatos</p>
                                    </div>
                                </div>
                                <div class="sliderslide col-lg-4 equalHW">
                                    <div class="sliderslide-content specialities">
                                        <img src="{{ URL::asset('public/frontend/assets/img/demo/svg/salad.svg') }}"
                                            class="filter" alt="Healthy Salads" />
                                        <div class="voffset-15"></div>
                                        <h4>Healthy Salads</h4>
                                        <div class="voffset-20"></div>
                                        <p>Salads can be healthy, satisfying meals on their own or perfect accompaniments to
                                            main dishes. Whatever sort of salad you're after, we've got a great selection
                                        </p>
                                    </div>
                                </div>
                                <div class="sliderslide col-lg-4 equalHW">
                                    <div class="sliderslide-content specialities">
                                        <img src="{{ URL::asset('public/frontend/assets/img/demo/svg/pizza.svg') }}"
                                            class="filter" alt="Italian Pizzas" />
                                        <div class="voffset-15"></div>
                                        <h4>Italian Pizzas</h4>
                                        <div class="voffset-20"></div>
                                        <p>When most of us think of Italian cuisine, we're thinking about pizza. When 9 out
                                            of 10 people talk about going out for Italian then mean they want to eat pizza.
                                        </p>
                                    </div>
                                </div>
                                <div class="sliderslide col-lg-4 equalHW">
                                    <div class="sliderslide-content specialities">
                                        <img src="{{ URL::asset('public/frontend/assets/img/demo/svg/hamburger.svg') }}"
                                            class="filter" alt="Gourmet Burgers" />
                                        <div class="voffset-15"></div>
                                        <h4>Gourmet Burgers</h4>
                                        <div class="voffset-20"></div>
                                        <p>A winning gourmet burger comes down to four things. A patty to be proud of, a
                                            sauce to make your mouth water, a great bun and, of course, a side order of
                                            potatos</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="voffset-80"></div>
                    </div>
                </div>
            </div>
    </section>
    <!-- Specialities Section Start -->

    <div class="voffset-131"></div>

    <!-- History Section Start -->
    <section id="section-history" data-aos="fade-in" data-aos-duration="1000">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 equalHW padding0">
                    <div class="history-image">
                    </div>
                </div>
                <div class="col-lg-6 equalHW padding0">
                    <div class="section specialities">
                        <div class="section history">
                            <div class="history-content alignVCenter">
                                <div class="container-col">
                                    <!--<h4 class="small medium right light">Discover your taste</h4>-->
                                    <h4 class="white title">Our History</h4>
                                    <div class="voffset-30"></div>
                                    <p>Fat Emperor is about the combined efforts of chefs, cooks, servers, farmers,
                                        vineyards, and brewers and I see that partnership extending to our guests by
                                        providing the highest quality food.</p>
                                    <p>Numerous commentators have also referred to the supposed restaurant owner&apos;s
                                        eccentric habit of touting for custom outside his establishment, dressed in
                                        aristocratic fashion and brandishing a sword </p>
                                    <div class="voffset-40"></div>
                                    <a href="javascript:;" class="theme-btn btn-style-one bt-orange">Discover Menu
                                        <span><img alt=""
                                                src="{{ URL::asset('public/frontend/assets/img/demo/particles/arrow.svg') }}" /></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- History Section End -->

    <div class="voffset-131"></div>

    <!-- Featured Section Start -->
    <section id="section-menu" data-aos="fade-right" data-aos-duration="1000">
        @foreach ($categories as $category)
            <div class="row justify-content-md-center">
                <div class="col-lg-12">
                    <div class="container">
                        <div class="row ">

                            <div class="col-lg-12">
                                <h4 class="small center">{{ $category->name }}</h4>
                                {{-- <h4 class="title center">Our Featured Food</h4> --}}
                            </div>
                        </div>
                    </div>

                    @foreach ($category->subcategories as $subcategory)
                        <div class="row ">
                            <div class="col-lg-12">
                                {{-- <h4 class="small center">{{ $category->name }}</h4> --}}
                                <h4 class="title center">{{ $subcategory->name }}</h4>
                            </div>
                        </div>

                        <div class="section menu">
                            <div class="container-fluid">
                                <div class="voffset-50"></div>
                                <div class="row featured-carrusel">
                                    @foreach ($subcategory->products as $product)
                                        <div class="col-lg-3">
                                            <div class="featured-image">
                                                <img alt=""
                                                    src="{{ asset('public/restaurantImages') }}/{{ $product->image }}"
                                                    alt="Featured" />
                                            </div>
                                            <div class="featured-info">
                                                <div class="featured-text">
                                                    <p>{{ $product->name }}</p>
                                                    <span><i class="fa fa-gbp"></i>&nbsp;{{ $product->price }}</span>
                                                </div>
                                                <div class="featured-button">
                                                    <a href="javascript:;" class="bt-orange featured"><span
                                                            class="left0"><img alt=""
                                                                src="{{ URL::asset('public/frontend/assets/img/demo/particles/arrow.svg') }}" /></span></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </section>
    <!-- Featured Section End -->

    <div class="voffset-131"></div>

    <!-- Menu Section Start -->
    {{-- <section id="section-ppal-menu" data-aos="fade-in" data-aos-duration="1000">
        @foreach ($categories as $category)
            <div class="row justify-content-md-center">
                <div class="col-12">
                    <div class="container">

                        <div class="row ">
                            <div class="col-lg-12">
                                <h4 class="center title">{{ $category->name }}</h4>
                            </div>
                        </div>
                        <div class="voffset-40"></div>
                        <div class="section ppal-menu">
                            <div class="row ">
                                @foreach ($category->subcategories as $subcategory)
                                    <div class="col-lg-3 padding030">
                                        <h4 class="small center noline">{{ $subcategory->name }}</h4>
                                        <div class="voffset-40"></div>
                                            <ul class="menu-price">
                                                @foreach ($subcategory->products as $product)
                                                <li>
                                                    <div class="card" style="width: 12rem;">
                                                        <img src="{{ asset('public/restaurantImages') }}/{{ $product->image }}" class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <h6 class="card-title">{{ $product->name }}</h6>
                                                            {{-- <p class="card-text">{{ $product->description }}</p> --}}
                                                            
                                                            {{-- <span><i class="fa fa-gbp"></i>&nbsp;{{ $product->price }}</span>
                                                        </div>
                                                        </div>
                                                </li>
                                            @endforeach

                                            </ul>
                                        
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section> --}}
    <!-- Menu Section End -->

    <div class="voffset-131"></div>

    <!-- Gallery Section Start-->
    <section id="section-gallery" data-aos="zoom-in" data-aos-duration="1000">
        <div class="row justify-content-md-center">
            <div class="col-12">
                <div class="container">
                    <div class="row ">
                        <div class="col-lg-12">
                            <h4 class="small center">Browse</h4>
                            <h4 class="title center">Our Gallery</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section filter-grid-portfolio">
            <div class="container">
                <div class="row justify-content-center js-inview">
                    <div class="col-12">
                        <ul class="js-filters filters">
                            <li data-filter="*" class="is-checked">All Gallery</li>
                            <li data-filter=".dining">Fine Dining</li>
                            <li data-filter=".coffe">Cofee Shop</li>
                            <li data-filter=".drinkbar">Drink & Bar</li>
                            <li data-filter=".catering">Catering Services</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="section grid-portfolio">
            <div class="container-fluid">
                <div class="voffset-40"></div>
                <div class="row justify-content-center js-inview">
                    <div class="col-12">
                        <div class="grid-gallery-container">
                            <div id="gll" class="grid-gallery columns-3">
                                <div data-src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/01.jpg') }}"
                                    class="grid-item  dining"><img alt=""
                                        src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/01.jpg') }}"
                                        alt="">
                                    <div class="grid-item__rollover pr">
                                        <a href="#" href="#"><span class="ico-search"></span></a>
                                    </div>
                                </div>
                                <div data-src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/02.jpg') }}"
                                    class="grid-item coffe"><img alt=""
                                        src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/02.jpg') }}"
                                        alt="">
                                    <div class="grid-item__rollover pr">
                                        <a href="#"><span class="ico-search"></span></a>
                                    </div>
                                </div>
                                <div data-src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/03.jpg') }}"
                                    class="grid-item dining"><img alt=""
                                        src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/03.jpg') }}"
                                        alt="">
                                    <div class="grid-item__rollover pr">
                                        <a href="#"><span class="ico-search"></span></a>
                                    </div>
                                </div>
                                <div data-src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/04.jpg') }}"
                                    class="grid-item drinkbar"><img alt=""
                                        src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/04.jpg') }}"
                                        alt="">
                                    <div class="grid-item__rollover pr">
                                        <a href="#"><span class="ico-search"></span></a>
                                    </div>
                                </div>
                                <div data-src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/05.jpg') }}"
                                    class="grid-item catering"><img alt=""
                                        src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/05.jpg') }}"
                                        alt="">
                                    <div class="grid-item__rollover pr">
                                        <a href="#"><span class="ico-search"></span></a>
                                    </div>
                                </div>
                                <div data-src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/06.jpg') }}"
                                    class="grid-item catering"><img alt=""
                                        src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/06.jpg') }}"
                                        alt="">
                                    <div class="grid-item__rollover pr">
                                        <a href="#"><span class="ico-search"></span></a>
                                    </div>
                                </div>

                            </div>
                            <p class="loadmore min"><span class="js-loadmore btn">View More <span><img alt=""
                                            src="{{ URL::asset('public/frontend/assets/img/demo/particles/arrow.svg') }}" /></span>
                            </p>
                            <div class="js-more-items grid-gallery-more-items">
                                <div data-src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/07.jpg') }}"
                                    class="grid-item drinkbar"><img alt=""
                                        src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/07.jpg') }}"
                                        alt="">
                                    <div class="grid-item__rollover pr">
                                        <a href="#"><span class="ico-search"></span></a>
                                    </div>
                                </div>
                                <div data-src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/08.jpg') }}"
                                    class="grid-item catering"><img alt=""
                                        src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/08.jpg') }}"
                                        alt="">
                                    <div class="grid-item__rollover pr">
                                        <a href="#"><span class="ico-search"></span></a>
                                    </div>
                                </div>
                                <div data-src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/09.jpg') }}"
                                    class="grid-item catering"><img alt=""
                                        src="{{ URL::asset('public/frontend/assets/img/demo/masonry/gallery/09.jpg') }}"
                                        alt="">
                                    <div class="grid-item__rollover pr">
                                        <a href="#"><span class="ico-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="voffset-40"></div>
            </div>
        </div>
    </section>
    <!-- Gallery Section End-->

    <div class="voffset-131"></div>

    <!-- Testimonials Section Start -->
    <section data-aos="fade-in" data-aos-duration="1000">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 equalHW padding0">
                    <div class="testimonials-image">
                    </div>
                </div>
                <div class="col-lg-6 equalHW padding0">
                    <div class="section testimonials" id="section-testimonials">
                        <div class="testimonials-content alignVCenter">
                            <div class="container-col">
                                <!--<h4 class="small medium right light">Some</h4>-->
                                <h4 class="white title ">Happy Customers</h4>
                                <div class="voffset-30"></div>
                                <div class="all-testimonials">
                                    <div class="single-testimonial">
                                        <p>“Applicake chocolate cake wafer toffee pie soufflé wafer. Tart marshmallow wafer
                                            macaroon cheesecake jelly. Gingerbread cookie soufflé sweet roll sweet roll
                                            jelly-o” </p>
                                        <p class="customer">Carolyn Meyer</p>
                                    </div>
                                    <div class="single-testimonial">
                                        <p>“Applicake chocolate cake wafer toffee pie soufflé wafer. Tart marshmallow wafer
                                            macaroon cheesecake jelly. Gingerbread cookie soufflé sweet roll sweet roll
                                            jelly-o” </p>
                                        <p class="customer">Carolyn Meyer</p>
                                    </div>
                                    <div class="single-testimonial">
                                        <p>“Applicake chocolate cake wafer toffee pie soufflé wafer. Tart marshmallow wafer
                                            macaroon cheesecake jelly. Gingerbread cookie soufflé sweet roll sweet roll
                                            jelly-o” </p>
                                        <p class="customer">Carolyn Meyer</p>
                                    </div>
                                    <div class="single-testimonial">
                                        <p>“Applicake chocolate cake wafer toffee pie soufflé wafer. Tart marshmallow wafer
                                            macaroon cheesecake jelly. Gingerbread cookie soufflé sweet roll sweet roll
                                            jelly-o” </p>
                                        <p class="customer">Carolyn Meyer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Testimonials Section End -->

    <div class="voffset-131"></div>

    <!-- Team Section Start -->
    <section id="section-teamSection" data-aos="fade-down" data-aos-duration="1000">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12">
                    <h4 class="small center">Browse</h4>
                    <h4 class="title center">Our Creative Team</h4>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-12">
                    <div class="voffset-50"></div>
                    <div class="row">
                        <div class="contentslide slide-team">
                            <div class="sliderslide col-4">
                                <div class="sliderslide-content center">
                                    <img src="{{ URL::asset('public/frontend/assets/img/demo/team/01.jpg') }}"
                                        class="nofilter" alt="Jonh Maverick" />
                                    <div class="voffset-40"></div>
                                    <h4 class="center">Jonh Maverick</h4>
                                    <p class="center">Master Chef</p>
                                    <div class="voffset-40"></div>
                                </div>
                            </div>
                            <div class="sliderslide col-4">
                                <div class="sliderslide-content center">
                                    <img src="{{ URL::asset('public/frontend/assets/img/demo/team/02.jpg') }}"
                                        class="nofilter" alt="Anna Smith" />
                                    <div class="voffset-40"></div>
                                    <h4 class="center">Anna Smith</h4>
                                    <p class="center">Master Chef</p>
                                    <div class="voffset-40"></div>
                                </div>
                            </div>
                            <div class="sliderslide col-4">
                                <div class="sliderslide-content center">
                                    <img src="{{ URL::asset('public/frontend/assets/img/demo/team/03.jpg') }}"
                                        class="nofilter" alt="Paul Hewson" />
                                    <div class="voffset-40"></div>
                                    <h4 class="center">Paul Hewson</h4>
                                    <p class="center">Master Chef</p>
                                    <div class="voffset-40"></div>
                                </div>
                            </div>
                            <div class="sliderslide col-4">
                                <div class="sliderslide-content center">
                                    <img alt="" src="{{ URL::asset('public/frontend/assets/img/demo/team/04.jpg') }}"
                                        class="nofilter" alt="Jonh Maverick" />
                                    <div class="voffset-40"></div>
                                    <h4 class="center">Jonh Maverick</h4>
                                    <p class="center">Master Chef</p>
                                    <div class="voffset-40"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="voffset-80"></div>
            </div>

        </div>
    </section>
    <!-- Team Section Start -->

    <div class="voffset-131 bg"></div>
@endsection
