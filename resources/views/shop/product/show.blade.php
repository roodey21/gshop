<x-shop-layout>
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
			<h2>Detail Produk</h2>
			<ul class="bread-crumb clearfix">
				<li><a href="{{ route('shop.index') }}">Home</a></li>
				<li><a href="{{ route('shop.product.index') }}">Produk</a></li>
				<li>Detail Produk</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Shop Detail Section -->
	<section class="shop-detail-section">
		<div class="auto-container">
			<!-- Upper Box -->
			<div class="upper-box">
				<div class="row clearfix">
					<!-- Gallery Column -->
					<div class="gallery-column col-lg-6 col-md-12 col-sm-12">
						<div class="inner-column">
							<div class="carousel-outer">
                                <!-- Swiper -->
                                <div class="swiper-container content-carousel">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <figure class="image"><a href="{{ $product->thumbnail }}" class="lightbox-image"><img src="{{ $product->thumbnail }}" alt=""></a></figure>
                                        </div>
                                        <div class="swiper-slide">
                                            <figure class="image"><a href="{{ $product->thumbnail }}" class="lightbox-image"><img src="{{ $product->thumbnail }}" alt=""></a></figure>
                                        </div>
                                        <div class="swiper-slide">
                                            <figure class="image"><a href="{{ $product->thumbnail }}" class="lightbox-image"><img src="{{ $product->thumbnail }}" alt=""></a></figure>
                                        </div>
                                        <div class="swiper-slide">
                                            <figure class="image"><a href="{{ $product->thumbnail }}" class="lightbox-image"><img src="{{ $product->thumbnail }}" alt=""></a></figure>
                                        </div>
                                        <div class="swiper-slide">
                                            <figure class="image"><a href="{{ $product->thumbnail }}" class="lightbox-image"><img src="{{ $product->thumbnail }}" alt=""></a></figure>
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-container thumbs-carousel">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <figure class="thumb"><img src="{{ $product->thumbnail }}" alt=""></figure>
                                        </div>
                                        <div class="swiper-slide">
                                            <figure class="thumb"><img src="{{ $product->thumbnail }}" alt=""></figure>
                                        </div>
                                        <div class="swiper-slide">
                                            <figure class="thumb"><img src="{{ $product->thumbnail }}" alt=""></figure>
                                        </div>
                                        <div class="swiper-slide">
                                            <figure class="thumb"><img src="{{ $product->thumbnail }}" alt=""></figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
					</div>
					<!-- Content Column -->
					<div class="content-column col-lg-6 col-md-12 col-sm-12">
						<form action="{{ route('shop.cart.add', $product->slug) }}" class="inner-column" method="POST">
                            @csrf
							<h3>{{ $product->name }}</h3>
							<!-- Rating -->
							<div class="rating">
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
								<span class="light fa fa-star"></span>
								<i>(4 customer review)</i>
							</div>
							<!-- Price -->
							<div class="price">{{ $product->formatted_price }} <span>{{ $product->formatted_price }}</span> <i>-34%</i></div>
							<div class="text">
                                {!! $product->description !!}
                            </div>
							{{-- <div class="d-flex flex-wrap">
								<!-- Model -->
								<div class="model">
									<span class="model-title">Model :</span>
								</div>
								<!-- Select Size -->
								<div class="select-size-box clearfix">
									<div class="select-box"><input type="radio" name="payment-group" id="radio-one" checked><label for="radio-one">tyk</label></div>
									<div class="select-box"><input type="radio" name="payment-group" id="radio-two"><label for="radio-two">ffd2</label></div>
									<div class="select-box"><input type="radio" name="payment-group" id="radio-three"><label for="radio-three">23tt</label></div>
									<div class="select-box"><input type="radio" name="payment-group" id="radio-four"><label for="radio-four">r454</label></div>
									<div class="select-box"><input type="radio" name="payment-group" id="radio-five"><label for="radio-five">45hy</label></div>
								</div>
							</div> --}}

							<!-- Categories -->
							<div class="categories"><span>Kategori :</span> {{ $product->category->name }}</div>

							<!-- Tags -->
							{{-- <div class="categories"><span>Tags :</span> Black, Brown, Red, Shoes, £0.00 - £150.00</div> --}}

							<!-- Social Box -->
							<ul class="social-box">
								<li class="share">Share:</li>
								<li><a href="https://www.facebook.com/" class="fa fa-facebook-f"></a></li>
								<li><a href="https://www.twitter.com/" class="fa fa-twitter"></a></li>
								<li><a href="https://dribbble.com/" class="fa fa-dribbble"></a></li>
								<li><a href="https://www.linkedin.com/" class="fa fa-linkedin"></a></li>
							</ul>

							<div class="d-flex align-items-center flex-wrap">

								<!-- Button Box -->
								<div class="button-box">
									<button type="submit" class="theme-btn btn-style-one">
										Masukkan Keranjang
									</button>
								</div>

								<!-- Quantity Box -->
								<div class="quantity-box">
									<div class="item-quantity">
										<input class="qty-spinner" type="text" value="1" name="qty">
									</div>
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- End Upper Box -->

			<!-- Lower Box -->
			<div class="lower-box">

				<!-- Product Info Tabs -->
				<div class="product-info-tabs">
					<!-- Product Tabs -->
					<div class="prod-tabs tabs-box">

						<!-- Tab Btns -->
						<ul class="tab-btns tab-buttons clearfix">
							<li data-tab="#prod-details" class="tab-btn active-btn">Product Details</li>
							{{-- <li data-tab="#prod-info" class="tab-btn">additional information</li>
							<li data-tab="#prod-review" class="tab-btn">Review (02)</li> --}}
							<li data-tab="#prod-faq" class="tab-btn">Faq</li>
						</ul>

						<!-- Tabs Container -->
						<div class="tabs-content">

							<!-- Tab / Active Tab -->
							<div class="tab active-tab" id="prod-details">
								<div class="content">
									{!! $product->description !!}
								</div>
							</div>

							{{-- <!-- Tab -->
							<div class="tab" id="prod-info">
								<div class="content">
									<h3>Experience is over the world visit</h3>
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate vestibulum Phasellus rhoncus, dolor eget viverra pretium, dolor tellus aliquet nunc vitae ultricies erat elit eu lacus. Vestibulum non justo consectetur, cursus ante, tincidunt sapien. Nulla quis diam sit amet turpis interdum accumsan quis nec enim. Vivamus faucibus ex sed nibh egestas elementum. Mauris et bibendum dui. Aenean consequat pulvinar luctus</p>
								</div>
							</div>

							<!--Tab-->
							<div class="tab" id="prod-review">
								<h2 class="title">2 Reviews For win Your Friends</h2>
								<!--Reviews Container-->
								<div class="comments-area">
									<!--Comment Box-->
									<div class="comment-box">
										<div class="comment">
											<div class="author-thumb"><img src="images/resource/author-1.jpg" alt=""></div>
											<div class="comment-inner">
												<div class="comment-info clearfix">Steven Rich – March 17, 2022:</div>
												<div class="rating">
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star light"></span>
												</div>
												<div class="text">How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings.</div>
											</div>
										</div>
									</div>
									<!--Comment Box-->
									<div class="comment-box reply-comment">
										<div class="comment">
											<div class="author-thumb"><img src="images/resource/author-2.jpg" alt=""></div>
											<div class="comment-inner">
												<div class="comment-info clearfix">William Cobus – April 21, 2022:</div>
												<div class="rating">
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star"></span>
													<span class="fa fa-star-half-empty"></span>
												</div>
												<div class="text">There anyone who loves or pursues or desires to obtain pain itself, because it is pain sed, because occasionally circumstances occur some great pleasure.</div>
											</div>
										</div>
									</div>

								</div>

								<!-- Comment Form -->
								<div class="shop-comment-form">
									<h4>Add Your Comments</h4>
									<div class="rating-box">
										<div class="text"> Your Rating:</div>
										<div class="rating">
											<a href="#"><span class="fa fa-star"></span></a>
										</div>
										<div class="rating">
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
										</div>
										<div class="rating">
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
										</div>
										<div class="rating">
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
										</div>
										<div class="rating">
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
											<a href="#"><span class="fa fa-star"></span></a>
										</div>
									</div>
									<form method="post" action="contact.html">
										<div class="row clearfix">
											<div class="col-md-6 col-sm-6 col-xs-12 form-group">
												<label>First Name *</label>
												<input type="text" name="username" placeholder="" required>
											</div>

											<div class="col-md-6 col-sm-6 col-xs-12 form-group">
												<label>Last Name*</label>
												<input type="email" name="email" placeholder="" required>
											</div>
											<div class="col-md-12 col-sm-12 col-xs-12 form-group">
												<label>Email*</label>
												<input type="text" name="number" placeholder="" required>
											</div>
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
												<label>Your Comments*</label>
												<textarea name="message" placeholder=""></textarea>
											</div>

											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-group">
												<button class="theme-btn btn-style-four">
													Submit now
												</button>

											</div>

										</div>
									</form>

								</div>

							</div> --}}

							<!-- Tab -->
							<div class="tab" id="prod-faq">
								<div class="content">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vulputate vestibulum Phasellus rhoncus, dolor eget viverra pretium, dolor tellus aliquet nunc, vitae ultricies erat elit eu lacus. Vestibulum non justo consectetur, cursus ante, tincidunt sapien. Nulla quis diam sit amet turpis interdum accumsan quis nec enim. Vivamus faucibus ex sed nibh egestas elementum. Mauris et bibendum dui. Aenean consequat pulvinar luctus. Suspendisse consectetur tristique tortor</p>
								</div>
							</div>

						</div>
					</div>

				</div>
				<!--End Product Info Tabs-->

			</div>
			<!-- End Lower Box -->

		</div>
	</section>
	<!-- End Shop Page Section -->

	<!-- Products Section Six -->
	<x-shop.popular-product />
	<!-- End Products Section Six -->

	<!-- Gallery Section -->
	<x-shop.gallery />
    <!-- End Gallery Section -->
</x-shop-layout>
