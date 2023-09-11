<div>
    <section class="products-section-six">
		<div class="auto-container">
			<!-- Sec Title -->
			<div class="sec-title">
				<h4>Produk yang lagi <span>Populer</span> saat ini!</h4>
			</div>
			<div class="row clearfix">

                @foreach ($products as $product)
				<!-- Shop Item Two -->
				<div class="shop-item-two col-lg-3 col-md-6 col-sm-12">
					<div class="inner-box">
						<div class="image">
							<a href="shop-detail.html"><img src="{{ $product->thumbnail }}" alt="" /></a>
							<div class="options-box">
								<ul class="option-list">
									<li><a class="flaticon-resize" href="shop-detail.html"></a></li>
									<li><a class="flaticon-heart" href="shop-detail.html"></a></li>
									<li>
                                        <form action="{{ route('shop.cart.add', $product->slug) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="qty" value="1">
                                            <button style="background: transparent">
                                                <a class="flaticon-shopping-cart-2"></a>
                                            </button>
                                        </form>
                                    </li>
								</ul>
							</div>
						</div>
						<div class="content">
							<h6><a href="shop-detail.html">{{ $product->name }}</a></h6>
							<div class="lower-box">
								<div class="price"><span>{{ $product->formatted_price }}</span> {{ $product->formatted_price }}</div>
								<!-- Select Size -->
								<div class="select-amount clearfix">
                                    <h6 class="fw-medium text-uppercase" style="font-size:14px!important;font-weight:500"><a href="{{ route('shop.product.show',$product->slug) }}">Lihat detail</a></h6>
								</div>
								<!-- Select Size -->
							</div>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</section>
</div>
