<x-shop-layout>
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
			<h2>Akun Saya</h2>
			<ul class="clearfix bread-crumb">
				<li><a href="{{ route('shop.index') }}">Home</a></li>
				<li>User</li>
				{{-- <li>Keranjang</li> --}}
			</ul>
        </div>
    </section>
    <!-- End Page Title -->

    @push('css')
        <style>
            /* .btn-tab-user {
                background-color: #fff;
                border: 1px solid #ebebeb;
                color: #000;
                font-size: var(--font-18);
                text-transform: capitalize;
                font-weight: 500;
                padding: 20px 44px;
                border-radius: 0;
                cursor: pointer;
                width: 100%;
                font-family: var(--font-family-Jost);
            }
            .btn-tab-user.active {
                background-color: var(--black-color);
                color: #fff;
            } */
            th, td {
                padding-top: 1rem!important;
                padding-bottom: 1rem!important;
                font-size: 15px;
            }
            .border-thinner {
                border: 1px solid rgba(0,0,0, 0.10)
            }
            /* .btn-tab-user:hover {
                background-color: var(--black-color);
                color: #fff;
            } */
        </style>
    @endpush
	<!-- Shoping Cart Section -->
	<section class="shoping-cart-section">
		<div class="auto-container">
            <x-shop.user-tab />

            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info">
                        <div class="d-flex">
                            <div class="me-2">
                                <!-- Download SVG icon from http://tabler-icons.io/i/info-circle -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="18" height="18"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M12 9h.01"></path>
                                    <path d="M11 12h1v4h1"></path>
                                </svg>
                            </div>
                            <div class="fs-6 align-middle">
                                @if($transactions->filter(fn ($value, $key) => $value->status == 0)->count() > 0)
                                <span class="fw-semibold">Info!</span> <br>
                                <span>Ada pesanan anda yang belum dibayar</span> <br>
                                @endif
                                @if($transactions->filter(fn ($value, $key) => $value->status == 1)->count() > 0)
                                <span class="fw-semibold">Info!</span> <br>
                                <span>Pesanan anda telah masuk, mohon tunggu konfirmasi dari admin</span> <br>
                                @endif
                                @if($transactions->filter(fn ($value, $key) => $value->status == 2)->count() > 0)
                                <span class="fw-semibold">Info!</span> <br>
                                <span>Pesanan anda sedang diproses oleh admin, mohon tunggu sampai pembeli mengirimkan pesanan anda.</span> <br>
                                @endif
                                @if($transactions->filter(fn ($value, $key) => $value->status == 3)->count() > 0)
                                <span class="fw-semibold">Info!</span> <br>
                                <span>Pembeli telah mengirimkan paket anda, pesanan anda sedang dalam perjalanan ke rumahmu. </span> <br>
                                <span>Mohon untuk <span class="fw-semibold">konfirmasi pesanan</span> bila pesanan anda telah sampai.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card border-thinner">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table">
                                <thead>
                                    <tr>
                                        <th width="30">#</th>
                                        <th width="200">No Invoice</th>
                                        <th>Nama Penerima</th>
                                        <th>Alamat Pengiriman</th>
                                        <th>Tanggal Transaksi</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th class="w-1"></th>
                                        {{-- <th>Keterangan</th>
                                        <th>Sub Kategori</th>
                                        <th class="w-1"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="fw-semibold">{{ $transaction->invoice }}</td>
                                        <td>{{ $transaction->name }}</td>
                                        <td>{{ $transaction->city->type . ' ' . $transaction->city->name }}</td>
                                        <td>{{ $transaction->created_at->format('d M Y') }}</td>
                                        <td>{{ 'Rp. ' . $transaction->total_price }}</td>
                                        <td>
                                            <span class="badge bg-{{ $transaction->status_name['color_bs4'] }}" style="font-size: 12px">
                                                {{ $transaction->status_name['text'] }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('shop.payment', $transaction->code) }}" class="text-primary">Detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</section>
	<!-- End Shoping Cart Section -->

	<!-- Gallery Section -->
	<x-shop.gallery />
	<!-- End Gallery Section -->
</x-shop-layout>
