<x-shop-layout>
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
			<h2>Cek Ongkir</h2>
			<ul class="clearfix bread-crumb">
				<li><a href="{{ route('shop.index') }}">Home</a></li>
				<li>Cek Ongkir</li>
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

	<!-- Shoping Cart Section -->
	<section class="shoping-cart-section">
		<div class="auto-container">

			<div class="clearfix row">
				<!-- Total Column -->
				<div class="total-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">

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
