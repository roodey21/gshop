<x-shop-layout>

    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
            <h2>Produk Toko</h2>
            <ul class="clearfix bread-crumb">
                <li><a href="index.html">Home</a></li>
                <li>Produk</li>
                <li>Produk Toko</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="clearfix row">

                <!-- Content Side -->
                <div class="content-side col-lg-9 col-md-12 col-sm-12">
                    <!-- Filter Box -->
                    <div class="filter-box">
                        <div class="flex-wrap d-flex justify-content-between align-items-center">
                            <!-- Left Box -->
                            <div class="left-box d-flex align-items-center">
                                {{-- <div class="results">Showing 1–12 of 54 results</div> --}}
                                <div class="results">Menampilkan produk
                                    {{ $products->firstItem() . ' - ' . $products->lastItem() }} dari
                                    {{ $products->total() }} produk</div>
                            </div>
                            <!-- Right Box -->
                            <div class="right-box d-flex">
                                <div class="form-group">
                                    <select name="currency" class="custom-select-box">
                                        <option>Produk Terbaru</option>
                                        <option>Harga Terendah</option>
                                        <option>Harga Tertinggi</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Filter Box -->

                    <div class="shops-outer">
                        <div class="clearfix row">

                            @forelse($products as $product)
                                <!-- Shop Item -->
                                <div class="shop-item col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="{{ route('shop.product.show', $product->slug) }}"><img
                                                    src="{{ $product->thumbnail }}" alt="" /></a>
                                            <div class="options-box">
                                                <ul class="option-list">
                                                    <li><a class="flaticon-resize" href="shop-detail.html"></a></li>
                                                    <li><a class="flaticon-heart" href="shop-detail.html"></a></li>
                                                    <li>
                                                        <form action="{{ route('shop.cart.add', $product->slug) }}"
                                                            method="POST">
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
                                        <div class="lower-content">
                                            <div class="rating">
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="light fa fa-star"></span>
                                            </div>
                                            <h6><a
                                                    href="{{ route('shop.product.show', $product->slug) }}">{{ $product->name }}</a>
                                            </h6>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="price"><span>{{ $product->discount ? $product->formatted_price : '' }}</span>{{ $product->discount ? $product->formatted_discount : $product->formatted_price }}</div>
                                                <!-- Quantity Box -->
                                                <div class="quantity-box">
                                                    <div class="item-quantity">
                                                        <input class="qty-spinner" type="text" min="1"
                                                            value="1" name="qty">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12">
                                    <div class="alert alert-info">
                                        Belum ada produk.
                                    </div>
                                </div>
                            @endforelse
                        </div>

                        <!-- Styled Pagination -->
                        {{ $products->links('vendor.pagination.shop') }}
                        <!-- End Styled Pagination -->

                    </div>

                </div>

                <!-- Sidebar Side -->
                <div class="sidebar-side col-lg-3 col-md-12 col-sm-12">
                    <aside class="sidebar sticky-top">

                        <!-- Category Widget -->
                        <div class="sidebar-widget category-widget">
                            <div class="widget-content">
                                <!-- Sidebar Title -->
                                <div class="sidebar-title">
                                    <h6>Kategori Produk</h6>
                                </div>
                                <!-- Category List -->
                                <ul class="category-list">
                                    @foreach ($categories as $category)
                                        <li><a href="#">{{ $category->name }} <span>({{ $category->products ? $category->products->count() : 0 }})</span></a></li>
                                    @endforeach
                                </ul>

                            </div>
                        </div>

                        <!-- Colors Widget -->
                        {{-- <div class="sidebar-widget colors-widget">
							<div class="widget-content">
								<!-- Sidebar Title -->
								<div class="sidebar-title">
									<h6>Colors</h6>
								</div>
								<div class="sel-colors">
									<div class="color-box"><input type="radio" name="colors" checked id="color-one"><label style="background-color:#c4c4c4;" for="color-one"></label></div>
									<div class="color-box"><input type="radio" name="colors" id="color-two"><label style="background-color:#0b5fb5;" for="color-two"></label></div>
									<div class="color-box"><input type="radio" name="colors" id="color-three"><label style="background-color:#00a651;" for="color-three"></label></div>
									<div class="color-box"><input type="radio" name="colors" id="color-four"><label style="background-color:#fee496;" for="color-four"></label></div>
									<div class="color-box"><input type="radio" name="colors" id="color-five"><label style="background-color:#bc25bf;" for="color-five"></label></div>
									<div class="color-box"><input type="radio" name="colors" id="color-six"><label style="background-color:#000000;" for="color-six"></label></div>
								</div>
							</div>
						</div> --}}

                        {{-- <!-- Brands Widget -->
						<div class="sidebar-widget brands-widget">
							<div class="widget-content">
								<!-- Sidebar Title -->
								<div class="sidebar-title">
									<h6>brands</h6>
								</div>

								<!-- Brands List -->
								<div class="brands-list">
									<form method="post" action="contact.html">

										<div class="form-group">
											<div class="check-box">
												<input type="checkbox" name="remember-password" id="type-1">
												<label for="type-1">Samsung</label>
											</div>
										</div>

										<div class="form-group">
											<div class="check-box">
												<input type="checkbox" name="remember-password" id="type-2">
												<label for="type-2">Oppo</label>
											</div>
										</div>

										<div class="form-group">
											<div class="check-box">
												<input type="checkbox" name="remember-password" id="type-3">
												<label for="type-3">hewaui Galaxy</label>
											</div>
										</div>

										<div class="form-group">
											<div class="check-box">
												<input type="checkbox" name="remember-password" id="type-4">
												<label for="type-4">Ryzen 3600</label>
											</div>
										</div>

										<div class="form-group">
											<div class="check-box">
												<input type="checkbox" name="remember-password" id="type-5">
												<label for="type-5">intel</label>
											</div>
										</div>

										<div class="form-group">
											<div class="check-box">
												<input type="checkbox" name="remember-password" id="type-6">
												<label for="type-6">Mobile Handset</label>
											</div>
										</div>

									</form>
								</div>

							</div>
						</div> --}}

                        <!-- Trending Widget -->
                        {{-- <div class="sidebar-widget trending-widget">
							<div class="widget-content">
								<div class="content">
									<div class="vector-icon" style="background-image: url(images/icons/vector-3.png)"></div>
									<div class="title">Trending</div>
									<h4>2022 <span>Laptop</span> <br> Collection</h4>
									<a class="buy-btn theme-btn" href="#">Buy Now</a>
									<div class="icon">
										<img src="images/resource/lamp-4.png" alt="" />
									</div>
								</div>
							</div>
						</div> --}}

                        {{-- <!-- Tags Widget -->
						<div class="sidebar-widget-two tags-widget">
							<div class="widget-content">
								<!-- Sidebar Title -->
								<div class="sidebar-title">
									<h6>Tags</h6>
								</div>
								<ul class="tag-list">
									<li><a href="#">symphony</a></li>
									<li><a href="#">nokia</a></li>
									<li><a href="#">samsung</a></li>
									<li><a href="#">Alcatel</a></li>
									<li><a href="#">landing</a></li>
									<li><a href="#">Oppos</a></li>
									<li><a href="#">I phone Pro 12</a></li>
									<li><a href="#">poco X3</a></li>
								</ul>
							</div>
						</div> --}}

                    </aside>
                </div>

            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <x-shop.gallery />
    <!-- End Gallery Section -->
</x-shop-layout>
