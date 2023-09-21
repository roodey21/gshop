<x-shop-layout>
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
			<h2>Keranjang</h2>
			<ul class="clearfix bread-crumb">
				<li><a href="{{ route('shop.index') }}">Home</a></li>
				<li>User</li>
				<li>Keranjang</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Shoping Cart Section -->
	<section class="shoping-cart-section">
		<div class="auto-container">
            <x-shop.user-tab />

			<div class="clearfix row">

				<!-- Cart Column -->
				<div class="cart-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">

						<!--Cart Outer-->
						<div class="cart-outer">
							<div class="table-outer">
								<table class="cart-table">
									<thead class="cart-header">
										<tr>
											<th class="prod-column">product</th>
											<th>&nbsp;</th>
											<th>Price</th>
											<th>Quantity</th>
											<th>Total</th>
										</tr>
									</thead>

									<tbody>

                                        @forelse ($carts as $cart)
										<tr data-id="{{ $cart->id }}">
											<td colspan="2" class="prod-column">
												<div class="column-box">
													<figure class="prod-thumb">
														<span class="cross-icon flaticon-cancel-1" onclick="deleteItem(this)" data-id="{{ $cart->id }}"></span>
														<a href="#"><img src="{{ $cart->product->thumbnail }}" alt=""></a>
													</figure>
													<h6 class="prod-title">{{ $cart->product->name }}</h6>
													{{-- <div class="prod-text">Color : Brown <br> Quantity : 2</div> --}}
												</div>
											</td>

											<td class="price">{{ $cart->product->formatted_price }}</td>
											<!-- Quantity Box -->
											<td class="quantity-box">
												<div class="item-quantity">
													<input class="qty-spinner" type="text" value="{{ $cart->qty }}" name="qty">
												</div>
											</td>
											<td class="sub-total">{{ $cart->formatted_total  }}</td>
										</tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    <h6>Belum ada produk di keranjangmu</h6>
                                                </td>
                                            </tr>
                                        @endforelse
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

						<!-- Shipping Total Outer -->
						<div class="shipping-outer">
							<!-- Title Box -->
							<div class="title-box">
								<h6>Cek Ongkir Kamu Disini</h6>
							</div>
							<form action="{{ route('ongkir.cekOngkir') }}" class="cart-shipping-box">
								<ul class="shipping-list">
									<li>
                                        <label for="" class="form-label">Pilih Provinsi</label>
                                        <select class="form-control" name="province">
                                            <option value="">Pilih Provinsi</option>
                                            @foreach ($provinces as $province)
                                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </li>
									<li>
                                        <label for="" class="form-label">Pilih Kota/Kabupaten</label>
                                        <select class="form-control" name="city">
                                            <option value="">Pilih Kota/Kabupaten</option>
                                        </select>
                                    </li>
									<li>
                                        <label for="" class="form-label">Pilih Kecamatan</label>
                                        <select class="form-control" name="subdistrict">
                                            <option value="">Pilih Kecamatan</option>
                                        </select>
                                    </li>
								</ul>
								<!-- Buttons Box -->
								<div class="buttons-box">
									<button type="submit" class="theme-btn btn-style-one">
										Calculate Shiping
									</button>
								</div>
							</form>
						</div>

					</div>
				</div>
                <form action="" id="form-delete" method="POST">
                    @csrf
                    @method('DELETE')

                </form>
                @push('js')
                <script>
                    let subdistrict = null;
                    const deleteItem = (el) => {
                        const id = el.getAttribute('data-id')
                        const form = document.getElementById('form-delete')
                        form.setAttribute('action', `/keranjang/${id}`)
                        Swal.fire({
                            title: 'Yakin ingin menghapus item?',
                            text: "Kamu tidak akan bisa mengembalikan ini!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit()
                            }
                        })
                    }
                    $('input[name=qty]').on('change', function() {
                        const id = $(this).closest('tr').attr('data-id')
                        const qty = $(this).val()
                        $.ajax({
                            url: `/keranjang/${id}/update`,
                            method: 'PATCH',
                            data: {
                                _token: '{{ csrf_token() }}',
                                qty: qty
                            },
                            success: function() {
                                window.location.reload()
                            }
                        })
                    })
                    $('select[name=province]').on('change', function() {
                        const id = $(this).val()
                        $.ajax({
                            url: '{{ route('ongkir.getCity') }}',
                            method: 'GET',
                            data: {
                                province_id: id
                            },
                            success: function(res) {
                                $('select[name=city]').html('')
                                $('select[name=city]').append(`
                                    <option value="">Pilih Kota/Kabupaten</option>
                                `)
                                res.data.forEach(city => {
                                    $('select[name=city]').append(`
                                        <option value="${city.id}">${city.name}</option>
                                    `)
                                })
                            }
                        })
                    })
                    $('select[name=city]').on('change', function () {
                        const id = $(this).val()
                        $.ajax({
                            url: '{{ route('ongkir.getSubdistrict') }}',
                            method: 'GET',
                            data: {
                                city_id: id
                            },
                            success: function(res) {
                                subdistrict = res.data
                                $('select[name=subdistrict]').html('')
                                $('select[name=subdistrict]').append(`
                                        <option value="">Pilih Kecamatan</option>
                                    `)
                                subdistrict.forEach(sub => {
                                    $('select[name=subdistrict]').append(`
                                        <option value="${sub.subdistrict_id}">${sub.subdistrict_name}</option>
                                    `)
                                })
                            }
                        })
                    })
                    // $('select[name=subdistrict]').on('change', function () {
                    //     const id = $(this).val()
                    //     const subdistrictSelected = subdistrict.find(sub => sub.id == id)
                    //     console.log(subdistrictSelected)
                    // })
                </script>
                @endpush
			</div>
		</div>
	</section>
	<!-- End Shoping Cart Section -->

    <!-- costs results -->
    @if (session()->has('data-ongkir'))
    <section class="shoping-cart-section">
        <div class="auto-container">
            <div class="clearfix row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h6>Hasil Pengecekan Biaya Ongkir</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>
                                            Ekspedisi
                                        </th>
                                        <th>
                                            Jenis Pengiriman
                                        </th>
                                        <th>
                                            Estimasi Sampai
                                        </th>
                                        <th>
                                            Biaya Pengiriman
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (session('data-ongkir') as $data)
                                        @foreach($data['costs'] as $cost)
                                        <tr>
                                            <td>
                                                {{ $data['name'] }}
                                            </td>
                                            <td>
                                                {{ $cost['description'] }}
                                            </td>
                                            <td>
                                                {{ $cost['cost'][0]['etd'] ? $cost['cost'][0]['etd']. ' (dalam hari)':'-' }}
                                            </td>
                                            <td>
                                                Rp. {{ number_format($cost['cost'][0]['value'], 0, ',', '.') }} /kg
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- End costs results -->
	<!-- Gallery Section -->
	<x-shop.gallery />
	<!-- End Gallery Section -->
</x-shop-layout>
