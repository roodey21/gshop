<x-shop-layout>
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
            <h2>Pilih Pembayaran</h2>
        </div>
    </section>
    <!-- End Page Title -->

   <!-- Checkout Section -->
    <section class="checkout-section">
        <div class="auto-container">
            <div class="clearfix row">

                <!-- Form Column -->
                <div class="form-column col-lg-8 col-md-12 col-sm-12">
                    <div class="form-column col-lg-12 col-md-12 col-sm-12">
                        <div class="mb-4 inner-column ">
                            <h4>Detail Pengiriman</h4>
                            <div class="card">
                                <table class="table table-borderless table-striped table-responsive">
                                    <tbody>
                                        <tr>
                                            <th>Nama Pembeli</th>
                                            <td>{{ $transaction->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Pengiriman</th>
                                            <td>{{ $transaction->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kurir</th>
                                            <td>{{ $transaction->courier->name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="inner-column">
                            <h4>Detail Barang</h4>
                            <div class="card">
                                <table class="table table-borderless table-striped table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Barang</th>
                                            <th>Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction->transactionDetails as $transactionDetail)
                                            <tr>
                                                    <td>{{ $transactionDetail->product->name }} - {{ $transactionDetail->qty }} X </td>
                                                    <td>Rp.{{  number_format($transactionDetail->price * $transactionDetail->qty) }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>Rp.{{ $transaction->sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ongkir</td>
                                            <td>Rp.{{ number_format($transaction->delivery_cost) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Harga Total</td>
                                            <td class="fw-bold">Rp.{{ $transaction->total_price }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Order Column -->
                <div class="order-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h4>Payment</h4>
                        <!-- Order Box -->
                        <div class="order-box">
                            <ul class="order-totals">
                                <li>Subtotal<span>Rp. {{ auth()->user()->total_cart }}</span></li>
                                <li>Shipping Fee<span>$34.00</span></li>
                            </ul>

                            <!-- Voucher Box -->
                            <div class="voucher-box">
								<form method="post" action="contact.html">
									<div class="form-group">
										<input type="email" name="search-field" value="" placeholder="Enter voucher Code" required>
										<button type="submit" class="theme-btn apply-btn">Apply code</button>
									</div>
								</form>
							</div

                            <!-- Order Total -->
                            <div class="order-total">Total <span>$345.00</span></div>

                            <div class="button-box">
                                <button class="theme-btn pay-btn">Procced to pay</button>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="shoping-cart-section">
		<div class="auto-container">
			<div class="clearfix row">

				<!-- Cart Column -->
				<div class="cart-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
						<!--Cart Outer-->
						<div class="cart-outer">
							<div class="table-outer">
								<table class="cart-table">
									 <tbody>
                                        <tr>
                                            <th>Nama Pembeli</th>
                                            <td>{{ $transaction->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat Pengiriman</th>
                                            <td>{{ $transaction->address }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kurir</th>
                                            <td>{{ $transaction->courier->name }}</td>
                                        </tr>
                                    </tbody>
								</table>
							</div>
						</div>

					</div>
					<div class="inner-column">
						<!--Cart Outer-->
						<div class="cart-outer">
							<div class="table-outer">
								<table class="cart-table">
									<thead class="cart-header">
										<tr>
											<th class="prod-column">Produk</th>
											<th>Harga</th>
										</tr>
									</thead>

									<tbody>
                                        @foreach ($transaction->transactionDetails as $transactionDetail)
										<tr>
											<td class="prod-column">
												<div class="column-box">
													<figure class="prod-thumb">
														<a href="#"><img src="{{ $transactionDetail->product->thumbnail }}" alt=""></a>
													</figure>
													<h6 class="prod-text">{{ $transactionDetail->product->name }} - {{ $transactionDetail->qty }}x </h6>

												</div>
											</td>
											<td class="price">{{ $transactionDetail->product->formatted_price }}</td>
										</tr>
                                        @endforeach
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>Rp.{{ $transaction->sub_total }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ongkir</td>
                                            <td>Rp.{{ number_format($transaction->delivery_cost) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="fw-bold">Harga Total</td>
                                            <td class="fw-bold">Rp.{{ $transaction->total_price }}</td>
                                        </tr>
									</tbody>
								</table>
							</div>
						</div>

					</div>
				</div>

				<!-- Total Column -->
				<div class="total-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">

						<!-- Cart Total Outer -->
						<div class="cart-total-outer">
							<!-- Title Box -->
							<div class="title-box">
								<h6>Cart Totals</h6>
							</div>
							<div class="cart-total-box">
								<ul class="cart-totals">
									<li>Subtotals : <span>Rp. {{ auth()->user()->total_cart }}</span></li>
									<li>Totals : <span>Rp. {{ auth()->user()->total_cart }}</span></li>
								</ul>
								<div class="check-box">
									<input type="checkbox" name="remember-password" id="type-1">
									<label for="type-1">Shipping & taxes calculated at checkout</label>
								</div>
								<!-- Buttons Box -->
								<div class="buttons-box">
									<a href="{{ route('shop.cart.checkout') }}" class="theme-btn proceed-btn">
										Procced To Cheackout
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- End Checkout Section -->

    <!-- Gallery Section -->
    {{-- <x-shop.gallery /> --}}
    <!-- End Gallery Section -->
</x-shop-layout>
