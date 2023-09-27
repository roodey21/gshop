<x-shop-layout>
    <!-- Main Section -->
    <section class="main-slider">
        <div class="main-slider-carousel owl-carousel owl-theme">

            <!-- Slide One -->
            <div class="slide">
                <!-- Ct Dot Animated -->
                <div class="ct-dot-animated">
                    <div class="ct-dot-container">
                        <div class="ct-dot-item">
                            <span></span>
                        </div>
                    </div>
                </div>
                <!-- End Ct Dot Animated -->
                <div class="image-layer" style="background-image: url({{ asset('shop/images/main-slider.jpg') }})"></div>
                <div class="auto-container">

                    <!-- Content Column -->
                    <div class="content-box">
                        <div class="box-inner">
                            {!! $setting->description !!}
                        </div>
                    </div>

                </div>
            </div>
            <!-- End Slide One -->

        </div>

    </section>
    <!-- End Main Section -->

    <!-- Featured Section -->
    <section class="featured-section">
        <div class="vector-layer" style="background-image: url({{ asset('shop/images/icons/vector-1.png') }})"></div>
        <div class="vector-layer-two" style="background-image: url({{ asset('shop/images/icons/gerabah-senik.png') }})"></div>
        <div class="auto-container">
            <div class="inner-container">
                <div class="clearfix row">

                    <!-- Feature Block -->
                    <div class="feature-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <div class="icon flaticon-fast"></div>
                                <strong>Pengiriman Nasional</strong>
                                <div class="text">Pengiriman ke Semua kota di Indonesia</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <div class="icon flaticon-padlock"></div>
                                <strong>Keamanan Transaksi</strong>
                                <div class="text">Jaminan 100% Transaksi Aman</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <div class="icon flaticon-headphones-1"></div>
                                <strong>Support 24/7</strong>
                                <div class="text">Kami Siap Membantu Anda 24/7</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <div class="icon flaticon-wallet"></div>
                                <strong>100% Money Back</strong>
                                <div class="text">Garansi Uang Kembali</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Featured Section -->

    <!-- Products Section -->
    <section class="products-section">
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title">
                <h4><span>Populer</span> Products For You !</h4>
            </div>
            <div class="four-item-carousel owl-carousel owl-theme">

                @foreach ($products as $product)
                    <!-- Shop Item -->
                    <div class="shop-item">
                        <form class="inner-box" method="POST" action="{{ route('shop.cart.add', $product->slug) }}">
                            @csrf
                            <div class="image">
                                <a href="#"><img src="{{ $product->thumbnail }}" alt="" /></a>
                                {{-- <span class="tag flaticon-heart"></span> --}}
                                <div class="text-center cart-box">
                                    <a class="cart" onclick="$(this).closest('form').submit()">Add to Cart</a>
                                </div>
                            </div>
                            <div class="lower-content">
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        <span class="{{ $i > $product->average_rating ? 'light':'' }} fa fa-star"></span>
                                    @endfor
                                    {{-- <span class="light fa fa-star"></span> --}}
                                </div>
                                <h6><a href="{{ route('shop.product.show', $product->slug) }}">{{ $product->name }}</a>
                                </h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price">{{ $product->formatted_price }}</div>
                                    <!-- Quantity Box -->
                                    <div class="quantity-box">
                                        <div class="item-quantity">
                                            {{-- <input type="hidden" value="1" name="qty"> --}}
                                            {{-- <input class="qty-spinner" type="text" value=""
                                                name="quantity"> --}}
                                            <input class="qty-spinner" type="text" min="1" value="1"
                                                name="qty">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Products Section -->

    <!-- Brand Section -->
    <section class="brand-section">
        <div class="outer-container">
            <div class="animation_mode">
                <h1>Design Unik</span>. <strong>Kualitas Menarik</strong></h1>
                <img src="{{ asset('shop/images/image-left.jpg') }}" alt="" width="88" height="84"/>
                <img src="{{ asset('shop/images/icons/gerabah-senik.png') }}" alt="" width="115px" height="115px"/>
                <img src="{{ asset('shop/images/image-right.jpg') }}" alt=""  width="88" height="84"/>
                <h1>Design Unik</span>. <strong>Kualitas Menarik</strong></h1>
                <img src="{{ asset('shop/images/image-left.jpg') }}" alt="" width="88" height="84"/>
                <img src="{{ asset('shop/images/icons/gerabah-senik.png') }}" alt="" width="115px" height="115px"/>
                <img src="{{ asset('shop/images/image-right.jpg') }}" alt=""  width="88" height="84"/>
                <h1>Design Unik</span>. <strong>Kualitas Menarik</strong></h1>
                <img src="{{ asset('shop/images/image-left.jpg') }}" alt="" width="88" height="84"/>
                <img src="{{ asset('shop/images/icons/gerabah-senik.png') }}" alt="" width="115px" height="115px"/>
                <img src="{{ asset('shop/images/image-right.jpg') }}" alt=""  width="88" height="84"/>
                <h1>Design Unik</span>. <strong>Kualitas Menarik</strong></h1>
                <img src="{{ asset('shop/images/image-left.jpg') }}" alt="" width="88" height="84"/>
                <img src="{{ asset('shop/images/icons/gerabah-senik.png') }}" alt="" width="115px" height="115px"/>
                <img src="{{ asset('shop/images/image-right.jpg') }}" alt=""  width="88" height="84"/>
            </div>
        </div>
    </section>
    <!-- End Brand Section -->

    <!-- Sale Section -->
    {{-- <section class="sale-section">
		<div class="auto-container">
			<div class="clearfix row">

				<!-- Sale Block -->
				<div class="sale-block col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="sale-box">
							SALE
							<span>30<i>% OFF</i></span>
						</div>
						<div class="image d-flex justify-content-between align-items-center">
							<img src="images/resource/shop-1.jpg" alt="" />
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="off">Get 30% off</div>
									<h5><a href="shop-detail.html">Be together in the moment <br> with Barnix calling</a></h5>
									<a class="buy-now" href="shop-detail.html">buy now</a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Sale Block -->
				<div class="sale-block col-xl-6 col-lg-6 col-md-12 col-sm-12">
					<div class="inner-box">
						<div class="sale-box">
							SALE
							<span>30<i>% OFF</i></span>
						</div>
						<div class="image d-flex justify-content-between align-items-center">
							<img src="images/resource/shop-2.jpg" alt="" />
							<div class="overlay-box">
								<div class="overlay-inner">
									<div class="off">Get 30% off</div>
									<h5><a href="shop-detail.html">Be together in the moment <br> with Barnix calling</a></h5>
									<a class="buy-now" href="shop-detail.html">buy now</a>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section> --}}
    <!-- End Sale Section -->

    <!-- Products Section Two -->
    {{-- <section class="products-section-two">
        <div class="bottom-white-border"></div>
        <div class="auto-container">
            <!-- Sec Title -->
            <div class="sec-title centered">
                <h4><span>Populer</span> Products For You !</h4>
            </div>
            <div class="inner-container">
                <div class="single-item-carousel owl-carousel owl-theme">

                    <!-- Slide -->
                    <div class="slide">
                        <div class="clearfix row">

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">01</span>
                                        <img src="images/resource/product-1.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(312 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">02</span>
                                        <img src="images/resource/product-2.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(312 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">03</span>
                                        <img src="images/resource/product-3.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Monkey Red Caps</a></h6>
                                        <div class="total-products">(213 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">04</span>
                                        <img src="images/resource/product-4.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Men,s Cotton Pant</a></h6>
                                        <div class="total-products">(461 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">05</span>
                                        <img src="images/resource/product-5.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(312 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">06</span>
                                        <img src="images/resource/product-6.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(567 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">07</span>
                                        <img src="images/resource/product-7.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Monkey Red Caps</a></h6>
                                        <div class="total-products">(213 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">08</span>
                                        <img src="images/resource/product-8.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Men,s Cotton Pant</a></h6>
                                        <div class="total-products">(461 Product)</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="slide">
                        <div class="clearfix row">

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">01</span>
                                        <img src="images/resource/product-1.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(312 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">02</span>
                                        <img src="images/resource/product-2.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(312 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">03</span>
                                        <img src="images/resource/product-3.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Monkey Red Caps</a></h6>
                                        <div class="total-products">(213 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">04</span>
                                        <img src="images/resource/product-4.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Men,s Cotton Pant</a></h6>
                                        <div class="total-products">(461 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">05</span>
                                        <img src="images/resource/product-5.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(312 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">06</span>
                                        <img src="images/resource/product-6.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(567 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">07</span>
                                        <img src="images/resource/product-7.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Monkey Red Caps</a></h6>
                                        <div class="total-products">(213 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">08</span>
                                        <img src="images/resource/product-8.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Men,s Cotton Pant</a></h6>
                                        <div class="total-products">(461 Product)</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Slide -->
                    <div class="slide">
                        <div class="clearfix row">

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">01</span>
                                        <img src="images/resource/product-1.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(312 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">02</span>
                                        <img src="images/resource/product-2.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(312 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">03</span>
                                        <img src="images/resource/product-3.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Monkey Red Caps</a></h6>
                                        <div class="total-products">(213 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">04</span>
                                        <img src="images/resource/product-4.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Men,s Cotton Pant</a></h6>
                                        <div class="total-products">(461 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">05</span>
                                        <img src="images/resource/product-5.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(312 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">06</span>
                                        <img src="images/resource/product-6.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Full Sleeve Cotton</a></h6>
                                        <div class="total-products">(567 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">07</span>
                                        <img src="images/resource/product-7.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Monkey Red Caps</a></h6>
                                        <div class="total-products">(213 Product)</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Block Four -->
                            <div class="product-block-four col-lg-3 col-md-6 col-sm-6">
                                <div class="flex-wrap inner-box d-flex justify-content-between align-items-center">
                                    <div class="image">
                                        <span class="number">08</span>
                                        <img src="images/resource/product-8.png" alt="" />
                                    </div>
                                    <div class="content">
                                        <h6><a href="shop-detail.html">Men,s Cotton Pant</a></h6>
                                        <div class="total-products">(461 Product)</div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section> --}}
    <!-- End Products Section Two -->

    <!-- Testimonial Section -->
	<section class="testimonial-section mt-md-4">
		<div class="pattern-layer" style="background-image: url({{ asset('shop/images/background/pattern-3.png') }})"></div>
		<div class="auto-container">
			<div class="inner-container">
				<div class="pattern-layer-two" style="background-image: url({{ asset('shop/images/background/pattern-4.png') }})"></div>
				<div class="vector-layer" style="background-image: url({{ asset('shop/images/background/pattern-2.png') }})"></div>
				<div class="single-item-carousel owl-carousel owl-theme">

                    @foreach ($lastReviews as $review)

					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="clearfix row">
								<!-- Image Column -->
								<div class="image-column col-lg-4 col-md-12 col-sm-12">
									<div class="inner-column">
										<div class="arrow-layer" style="background-image: url({{ asset('shop/images/icons/arrow-2.png') }})"></div>
										<div class="image">
											<img src="{{ asset('shop/images/avatar.png') }}" alt="" />
											<!-- Social Box -->
											<ul class="social-box">
												<h6>{{ $review->transaction->name }}</h6>
											</ul>
										</div>
									</div>
								</div>
								<!-- Content Column -->
								<div class="content-column col-lg-8 col-md-12 col-sm-12">
									<div class="inner-column">
										<div class="rating">
                                            @for ($i = 0; $i < $review->rating; $i++)
                                            <span class="fa fa-star"></span>
                                            @endfor
										</div>
										<div class="text">{{ $review->review }}</div>
										<div class="quote-icon flaticon-quote"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    @endforeach

				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonial Section -->
    <!-- Counter Section -->
    {{-- <section class="counter-section">
		<div class="auto-container">
			<div class="flex-wrap inner-container d-flex justify-content-between align-items-center">

				<!-- Shipping Box -->
				<div class="shipping-box">
					<div class="inner-box">
						Free <span class="theme_color">Shipping</span>
						<div class="order">On all Order</div>
					</div>
				</div>

				<!-- Arrow -->
				<div class="arrow">
					<img src="images/icons/arrow.png" alt="" />
				</div>

				<!-- Counter Boxed -->
				<div class="counter-boxed">
					<div class="clearfix row">

						<!-- Counter Column -->
						<div class="counter-block col-lg-6 col-md-6 col-sm-6">
							<div class="inner-box d-flex align-items-center">
								<div class="counter"><span class="odometer" data-count="12"></span>k</div>
								<div class="counter-text">Furniture Product For Home</div>
							</div>
						</div>

						<!-- Counter Column -->
						<div class="counter-block col-lg-6 col-md-6 col-sm-6">
							<div class="inner-box d-flex align-items-center">
								<div class="counter"><span class="odometer" data-count="120"></span>k</div>
								<div class="counter-text">Our Satiesfiyed Clients</div>
							</div>
						</div>

					</div>
				</div>
				<!-- End Counter Boxed -->

			</div>
		</div>
	</section> --}}
    <!-- End Counter Section -->

    <!-- Collection Section -->
    {{-- <section class="collection-section">
		<div class="auto-container">
			<div class="inner-container">
				<div class="pattern-layer" style="background-image: url(shop/images/icons/pattern-1.png)"></div>
				<div class="shape-layer" style="background-image: url(shop/images/background/pattern-1.png)"></div>
				<div class="clearfix row">
					<div class="title-column col-lg-6 col-md-12 col-sm-12">
						<div class="title">2021 Collection</div>
						<h2>mens Black Meta Sunglass</h2>
						<div class="deals">Deals <span>35% Flat</span></div>
						<a class="shop-now" href="shop-detail.html">Shop Now</a>
						<!-- Arrow -->
						<div class="arrow">
							<img src="images/icons/arrow-1.png" alt="" />
						</div>
					</div>
					<div class="image-column col-lg-6 col-md-12 col-sm-12">
						<div class="image">
							<div class="shadow-layer" style="background-image: url(images/icons/pattern-2.png)"></div>
							<img src="images/resource/chair.png" alt="" />
							<div class="price-tag">
								99<sup>$</sup>
								<span>103</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section> --}}
    <!-- End Collection Section -->

    <!-- Products Section Three -->
    {{-- <section class="products-section-three">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<h4><span>Products </span> your choich !</h4>
			</div>

			<!-- MixitUp Galery -->
            <div class="mixitup-gallery">

                <!-- Filter -->
                <div class="filters">
                	<ul class="filter-tabs">
                        <li class="active filter" data-role="button" data-filter="all">Trending</li>
                        <li class="filter" data-role="button" data-filter=".bestseller">Best Seller</li>
                        <li class="filter" data-role="button" data-filter=".music">music</li>
                        <li class="filter" data-role="button" data-filter=".photography">photography</li>
						<li class="filter" data-role="button" data-filter=".sports">sports</li>
                    </ul>
                </div>

                <div class="clearfix filter-list row">

					<!-- Shop Item -->
					<div class="shop-item mix music photography col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a href="shop-detail.html"><img src="images/resource/products/17.png" alt="" /></a>
								<span class="tag flaticon-heart"></span>
								<div class="text-center cart-box">
									<a class="cart" href="#">Add to Cart</a>
								</div>
							</div>
							<div class="lower-content">
								<div class="rating">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="light fa fa-star"></span>
								</div>
								<h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
								<div class="d-flex justify-content-between align-items-center">
									<div class="price"><span>$239.52</span> $362.00</div>
									<!-- Quantity Box -->
									<div class="quantity-box">
										<div class="item-quantity">
											<input class="qty-spinner" type="text" value="1" name="quantity">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Shop Item -->
					<div class="shop-item mix sports col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a href="shop-detail.html"><img src="images/resource/products/18.png" alt="" /></a>
								<span class="tag flaticon-heart"></span>
								<div class="text-center cart-box">
									<a class="cart" href="#">Add to Cart</a>
								</div>
							</div>
							<div class="lower-content">
								<div class="rating">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="light fa fa-star"></span>
								</div>
								<h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
								<div class="d-flex justify-content-between align-items-center">
									<div class="price"><span>$239.52</span> $362.00</div>
									<!-- Quantity Box -->
									<div class="quantity-box">
										<div class="item-quantity">
											<input class="qty-spinner" type="text" value="1" name="quantity">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Shop Item -->
					<div class="shop-item mix photography bestseller col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a href="shop-detail.html"><img src="images/resource/products/19.png" alt="" /></a>
								<span class="tag flaticon-heart"></span>
								<div class="text-center cart-box">
									<a class="cart" href="#">Add to Cart</a>
								</div>
							</div>
							<div class="lower-content">
								<div class="rating">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="light fa fa-star"></span>
								</div>
								<h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
								<div class="d-flex justify-content-between align-items-center">
									<div class="price"><span>$239.52</span> $362.00</div>
									<!-- Quantity Box -->
									<div class="quantity-box">
										<div class="item-quantity">
											<input class="qty-spinner" type="text" value="1" name="quantity">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Shop Item -->
					<div class="shop-item mix music col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a href="shop-detail.html"><img src="images/resource/products/20.png" alt="" /></a>
								<span class="tag flaticon-heart"></span>
								<div class="text-center cart-box">
									<a class="cart" href="#">Add to Cart</a>
								</div>
							</div>
							<div class="lower-content">
								<div class="rating">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="light fa fa-star"></span>
								</div>
								<h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
								<div class="d-flex justify-content-between align-items-center">
									<div class="price"><span>$239.52</span> $362.00</div>
									<!-- Quantity Box -->
									<div class="quantity-box">
										<div class="item-quantity">
											<input class="qty-spinner" type="text" value="1" name="quantity">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Shop Item -->
					<div class="shop-item mix sports bestseller col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a href="shop-detail.html"><img src="images/resource/products/21.png" alt="" /></a>
								<span class="tag flaticon-heart"></span>
								<div class="text-center cart-box">
									<a class="cart" href="#">Add to Cart</a>
								</div>
							</div>
							<div class="lower-content">
								<div class="rating">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="light fa fa-star"></span>
								</div>
								<h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
								<div class="d-flex justify-content-between align-items-center">
									<div class="price"><span>$239.52</span> $362.00</div>
									<!-- Quantity Box -->
									<div class="quantity-box">
										<div class="item-quantity">
											<input class="qty-spinner" type="text" value="1" name="quantity">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Shop Item -->
					<div class="shop-item mix music photography col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a href="shop-detail.html"><img src="images/resource/products/22.png" alt="" /></a>
								<span class="tag flaticon-heart"></span>
								<div class="text-center cart-box">
									<a class="cart" href="#">Add to Cart</a>
								</div>
							</div>
							<div class="lower-content">
								<div class="rating">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="light fa fa-star"></span>
								</div>
								<h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
								<div class="d-flex justify-content-between align-items-center">
									<div class="price"><span>$239.52</span> $362.00</div>
									<!-- Quantity Box -->
									<div class="quantity-box">
										<div class="item-quantity">
											<input class="qty-spinner" type="text" value="1" name="quantity">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Shop Item -->
					<div class="shop-item mix sports bestseller col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a href="shop-detail.html"><img src="images/resource/products/23.png" alt="" /></a>
								<span class="tag flaticon-heart"></span>
								<div class="text-center cart-box">
									<a class="cart" href="#">Add to Cart</a>
								</div>
							</div>
							<div class="lower-content">
								<div class="rating">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="light fa fa-star"></span>
								</div>
								<h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
								<div class="d-flex justify-content-between align-items-center">
									<div class="price"><span>$239.52</span> $362.00</div>
									<!-- Quantity Box -->
									<div class="quantity-box">
										<div class="item-quantity">
											<input class="qty-spinner" type="text" value="1" name="quantity">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Shop Item -->
					<div class="shop-item mix music photography col-lg-3 col-md-6 col-sm-12">
						<div class="inner-box">
							<div class="image">
								<a href="shop-detail.html"><img src="images/resource/products/24.png" alt="" /></a>
								<span class="tag flaticon-heart"></span>
								<div class="text-center cart-box">
									<a class="cart" href="#">Add to Cart</a>
								</div>
							</div>
							<div class="lower-content">
								<div class="rating">
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="fa fa-star"></span>
									<span class="light fa fa-star"></span>
								</div>
								<h6><a href="shop-detail.html">masks 95 percent 0.3-μm <br> particles</a></h6>
								<div class="d-flex justify-content-between align-items-center">
									<div class="price"><span>$239.52</span> $362.00</div>
									<!-- Quantity Box -->
									<div class="quantity-box">
										<div class="item-quantity">
											<input class="qty-spinner" type="text" value="1" name="quantity">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>

				<!-- Button Box -->
				<div class="text-center button-box">
					<a href="shop.html" class="theme-btn btn-style-one">
						Shop Now <span class="icon flaticon-right-arrow"></span>
					</a>
				</div>

			</div>
		</div>
	</section> --}}
    <!-- End Products Section Three -->

    <!-- Sponsors Section -->
    {{-- <section class="sponsors-section">
        <div class="auto-container">
			<div class="inner-container">
				<div class="sponsors-outer">
					<!-- Sponsors Carousel -->
					<ul class="sponsors-carousel owl-carousel owl-theme">
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/3.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/4.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/5.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/1.png" alt=""></a></figure></li>
						<li class="slide-item"><figure class="image-box"><a href="#"><img src="images/clients/2.png" alt=""></a></figure></li>
					</ul>
				</div>
            </div>
        </div>
    </section> --}}
    <!-- End Sponsors Section -->

    <!-- News Section -->
    {{-- <section class="news-section">
		<div class="auto-container">
			<div class="news-carousel owl-carousel owl-theme">

				<!-- News Block -->
				<div class="news-block">
					<div class="inner-box">
						<div class="image">
							<div class="tag">bedroom</div>
							<a href="blog-detail.html"><img src="images/resource/news-1.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<div class="author">
								<img src="images/resource/author-1.jpg" alt="" />
							</div>
							<h5><a href="blog-detail.html">10 Simple Practices That Will Help You furnis</a></h5>
							<div class="info">By: <span>Alextian</span> <i>January 23,2022</i></div>
						</div>
					</div>
				</div>

				<!-- News Block -->
				<div class="news-block">
					<div class="inner-box">
						<div class="image">
							<div class="tag">bedroom</div>
							<a href="blog-detail.html"><img src="images/resource/news-2.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<div class="author">
								<img src="images/resource/author-1.jpg" alt="" />
							</div>
							<h5><a href="blog-detail.html">10 Simple Practices That Will Help You furnis</a></h5>
							<div class="info">By: <span>Alextian</span> <i>January 23,2022</i></div>
						</div>
					</div>
				</div>

				<!-- News Block -->
				<div class="news-block">
					<div class="inner-box">
						<div class="image">
							<div class="tag">bedroom</div>
							<a href="blog-detail.html"><img src="images/resource/news-1.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<div class="author">
								<img src="images/resource/author-1.jpg" alt="" />
							</div>
							<h5><a href="blog-detail.html">10 Simple Practices That Will Help You furnis</a></h5>
							<div class="info">By: <span>Alextian</span> <i>January 23,2022</i></div>
						</div>
					</div>
				</div>

				<!-- News Block -->
				<div class="news-block">
					<div class="inner-box">
						<div class="image">
							<div class="tag">bedroom</div>
							<a href="blog-detail.html"><img src="images/resource/news-2.jpg" alt="" /></a>
						</div>
						<div class="lower-content">
							<div class="author">
								<img src="images/resource/author-1.jpg" alt="" />
							</div>
							<h5><a href="blog-detail.html">10 Simple Practices That Will Help You furnis</a></h5>
							<div class="info">By: <span>Alextian</span> <i>January 23,2022</i></div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section> --}}
    <!-- End News Section -->

    <!-- Testimonial Section -->
    {{-- <section class="testimonial-section">
		<div class="pattern-layer" style="background-image: url(images/background/pattern-3.png)"></div>
		<div class="auto-container">
			<div class="inner-container">
				<div class="pattern-layer-two" style="background-image: url(images/background/pattern-4.png)"></div>
				<div class="vector-layer" style="background-image: url(images/background/pattern-2.png)"></div>
				<div class="single-item-carousel owl-carousel owl-theme">

					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="clearfix row">
								<!-- Image Column -->
								<div class="image-column col-lg-4 col-md-12 col-sm-12">
									<div class="inner-column">
										<div class="arrow-layer" style="background-image: url(images/icons/arrow-2.png)"></div>
										<div class="image">
											<img src="images/resource/author-2.jpg" alt="" />
											<!-- Social Box -->
											<ul class="social-box">
												<li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
												<li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
												<li><a href="https://dribbble.com/" class="fa fa-dribbble"></a></li>
												<li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- Content Column -->
								<div class="content-column col-lg-8 col-md-12 col-sm-12">
									<div class="inner-column">
										<div class="rating">
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</div>
										<div class="text">The most <span>advanced</span> revenue than this. I will refer everyone I know I like Level more and more each day because it makes my life a lot easier. It really saves me time and effort.</div>
										<div class="quote-icon flaticon-quote"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="clearfix row">
								<!-- Image Column -->
								<div class="image-column col-lg-4 col-md-12 col-sm-12">
									<div class="inner-column">
										<div class="arrow-layer" style="background-image: url(images/icons/arrow-2.png)"></div>
										<div class="image">
											<img src="images/resource/author-2.jpg" alt="" />
											<!-- Social Box -->
											<ul class="social-box">
												<li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
												<li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
												<li><a href="https://dribbble.com/" class="fa fa-dribbble"></a></li>
												<li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li>
											</ul>
										</div>
									</div>
								</div>
								<!-- Content Column -->
								<div class="content-column col-lg-8 col-md-12 col-sm-12">
									<div class="inner-column">
										<div class="rating">
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
											<span class="fa fa-star"></span>
										</div>
										<div class="text">The most <span>advanced</span> revenue than this. I will refer everyone I know I like Level more and more each day because it makes my life a lot easier. It really saves me time and effort.</div>
										<div class="quote-icon flaticon-quote"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section> --}}
    <!-- End Testimonial Section -->

    <!-- Gallery Section -->
    <x-shop.gallery />
    <!-- End Gallery Section -->
</x-shop-layout>
