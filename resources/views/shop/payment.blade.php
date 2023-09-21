<x-shop-layout>
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
            <h2>Detail Transaksi</h2>
            <ul class="clearfix bread-crumb">
                <li><a href="{{ route('shop.index') }}">Home</a></li>
                <li>User</li>
                <li>Transaksi</li>
                <li>Detail Transaksi</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

   <!-- Checkout Section -->
    <section class="checkout-section">
        <div class="auto-container">
            <x-shop.user-tab />
            @if($transaction->status == 3)
            <form action="{{ route('user.transaction.confirm', $transaction->id) }}" class="alert alert-info rounded-0 fs-6" method="POST">
                @csrf
                @method('PUT')
                <span class="d-block mb-1">
                    Apakah pesanan anda sudah sampai di rumahmu? Silahkan konfirmasi penerimaan pesananmu dengan klik tombol berikut.
                </span>
                <button class="btn btn-sm btn-primary">Pesanan telah diterima</button>
            </form>
            @endif
            <form action="{{ route('shop.payment.upload-proof', $transaction->id) }}" method="POST" enctype="multipart/form-data" class="clearfix row">
                @csrf
                @method('PUT')
                <div class="mb-5 col-12">
                    <div class="card rounded-0 border-thinner">
                        <div class="card-body" style="padding: 25px">
                            <div class="row">
                                <div class="text-center col-md-4">
                                    <h6>Nomor Invoice</h6>
                                    <p>{{ $transaction->invoice }}</p>
                                </div>
                                <div class="text-center col-md-4">
                                    <h6>Tanggal Transaksi</h6>
                                    <p>{{ $transaction->created_at->format('d M Y, h:i a') }}</p>
                                </div>
                                <div class="text-center col-md-4">
                                    <h6>Status Pesanan <i class="ms-1 fa fa-refresh" style="cursor: pointer" onclick="location.reload()"></i></h6>
                                    <span class="badge bg-{{ $transaction->status_name['color_bs4'] }}"  style="font-size: 12px;">{{ $transaction->status_name['text'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Form Column -->
                <div class="form-column col-lg-8 col-md-12 col-sm-12">
                    <div class="mb-4 inner-column ">
                        <h4>Detail Pengiriman</h4>
                        <div class="card rounded-0 border-thinner">
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
                    <div class="mb-4 inner-column">
                        <h4>Detail Barang</h4>
                        <div class="card rounded-0 border-thinner">
                            <table class="table table-borderless table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>Barang</th>
                                        <th>Qty</th>
                                        <th width="200">Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transaction->transactionDetails as $transactionDetail)
                                        <tr>
                                                <td>{{ $transactionDetail->product->name }}</td>
                                                <td>{{ $transactionDetail->qty }} x</td>
                                                <td>Rp.{{  number_format($transactionDetail->price * $transactionDetail->qty) }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">Subtotal</td>
                                        <td>Rp.{{ $transaction->sub_total }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">Biaya Pengiriman</td>
                                        <td>Rp.{{ number_format($transaction->delivery_cost) }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold" colspan="2">Harga Total</td>
                                        <td class="fw-bold">Rp.{{ $transaction->total_price }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($transaction->status == 0)
                    <div class="card rounded-0 border-thinner">
                        <div class="card-body">
                            <h4>Pilih Metode Pembayaran</h4>

                            <ul class="list-group list-group-flush">
                                @foreach ($banks as $bank)
                                <li class="py-3 list-group-item">
                                    <label class="w-100 d-flex">
                                        <input type="radio" name="payment_method" value="{{ $bank->id }}" class="mx-2" required>
                                        <span class="w-100 d-block fw-semibold"><img src="https://berrybenka.com/berrybenka/desktop/img/atm-bca-logo.jpg" class="me-2">{{ $bank->name }} (Pengecekan Manual)</span>
                                    </label>
                                    <div class="mt-3 alert alert-warning panduan-transfer" role="alert" id="bank-{{ $bank->id }}" style="display: none">
                                        <h6 class="mb-2 text-uppercase fs-6 fw-bold"><i class="fa fa-bell me-2"></i>Panduan Pembayaran</h6>
                                        <hr>
                                        <ul>
                                            <li>Mohon membayar dalam 2x24 jam, jika tidak maka transaksi dibatalkan.</li>
                                            <li>Mohon transfer tanpa pembulatan, sesuai angka yang tertera di tagihan.</li>
                                            <li>Mohon cantumkan Kode Pembelian pada keterangan berita transfer (Bila Ada).</li>
                                            <li>Pembayaran untuk Kode Pembelian berbeda harus dilakukan secara terpisah.</li>
                                            <li>Mohon lakukan konfirmasi setelah melakukan pembayaran.</li>
                                        </ul>
                                        <hr>
                                        <div>
                                            <p class="mb-0 text-dark fw-semibold">{{ $bank->name }}</p>
                                            <p class="mb-0 text-dark fw-semibold">a/n <span>{{ $bank->account_name }}</span></p>
                                            <p class="mb-0 text-dark fw-semibold">Nomor Rekening :<span>{{ $bank->account_number }}</span></p>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                <!-- Order Column -->
                <div class="order-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h4>Upload Bukti Pembayaran</h4>
                        <!-- Order Box -->
                        <div class="order-box">
                            <ul class="order-totals">
                                <li>Total pembayaran<span>Rp. {{ $transaction->total_price }}</span></li>
                            </ul>
                            @if ($transaction->status == 0)
                                <input type="file" class="custom-dile-input form-control-lg rounded-0" name="proof" style="height: 70px; " required>
                                @error('proof')
                                    <div class="mt-2 alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="button-box">
                                    <button class="theme-btn pay-btn" type="submit">Upload Bukti Pembayaran</button>
                                </div>
                            @else
                                <h6 class="text-center fs-6 fw-semibold">Anda sudah upload bukti transfer</h6>
                            @endif
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
    @push('css')
        <style>
            .panduan-transfer ul {
                list-style: disc;
            }
            .panduan-transfer li {
                list-style: disc;
                padding: 0.1rem;
                margin-left: 1.5rem;
            }
            th, td {
                padding-top: 1rem!important;
                padding-bottom: 1rem!important;
            }
            .border-thinner {
                border: 1px solid rgba(0,0,0, 0.10)
            }
        </style>
    @endpush
    @push('js')
        <script>
            $('input[name=payment_method]').on('change', function() {
                console.log('ok')
                $('.panduan-transfer').hide();
                $('#bank-' + $(this).val()).show();
            });
        </script>
    @endpush

    {{-- <section class="shoping-cart-section">
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
                                            <td>Biaya Pengiriman</td>
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
	</section> --}}
    <!-- End Checkout Section -->

    <!-- Gallery Section -->
    {{-- <x-shop.gallery /> --}}
    <!-- End Gallery Section -->
</x-shop-layout>
