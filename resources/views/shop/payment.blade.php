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
                        <div class="inner-column">
                            <h4>Detail Pesanan</h4>
                            <table class="table table-bordered table-responsive">
                                <thead>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Berat (gram)</th>
                                        <th>Alamat</th>
                                        <th>Harga Produk</th>
                                        <th>Ongkos kirim</th>
                                        <th>Kurir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($carts as $cart)
                                        <tr>
                                            <td>{{ $transaction->name }}</td>
                                            <td>{{ $cart->product->name }}</td>
                                            <td>{{ $cart->qty }}</td>
                                            <td>{{ $cart->product->weight }}</td>
                                            <td>{{ $transaction->address }}</td>
                                            <!-- Gantilah dengan alamat pengiriman yang sesuai -->
                                            <td>Rp. {{ number_format($cart->product->price * $cart->qty, 0, ',', '.') }}
                                            </td>
                                            <td>{{ $transaction->delivery_cost }}</td>
                                            <td>
                                                {{ $transaction->courier->name }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

                <!-- Order Column -->
                <div class="order-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h4>Order Summery</h4>
                        <!-- Order Box -->
                        <div class="order-box">
                            <ul class="order-totals">
                                <li>Subtotal<span>Rp. {{ auth()->user()->total_cart }}</span></li>
                                <li>Shipping Fee<span>$34.00</span></li>
                            </ul>

                            <!-- Voucher Box -->
                            {{-- <div class="voucher-box">
								<form method="post" action="contact.html">
									<div class="form-group">
										<input type="email" name="search-field" value="" placeholder="Enter voucher Code" required>
										<button type="submit" class="theme-btn apply-btn">Apply code</button>
									</div>
								</form>
							</div> --}}

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
    <!-- End Checkout Section -->

    <!-- Gallery Section -->
    {{-- <x-shop.gallery /> --}}
    <!-- End Gallery Section -->
</x-shop-layout>
