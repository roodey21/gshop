<x-user-layout>
    @push('header')
        <x-header>
            <x-slot:page_title>
                Detail Transaksi
            </x-slot:page_title>
            <x-slot:right_side>
                <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-left"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l14 0"></path>
                        <path d="M5 12l4 4"></path>
                        <path d="M5 12l4 -4"></path>
                    </svg>
                    Kembali
                </a>
            </x-slot:right_side>
        </x-header>
    @endpush

    <div class="row row-cards">
        <div class="col-12">
            <div class="alert alert-info alert-important" role="alert">
                <div class="d-flex">
                    <div>
                        <!-- Download SVG icon from http://tabler-icons.io/i/info-circle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                            <path d="M12 9h.01"></path>
                            <path d="M11 12h1v4h1"></path>
                        </svg>
                    </div>
                    @if ($transaction->status == 0)
                        <div>
                            Pembeli belum melakukan pembayaran, silahkan lakukan pembayaran.
                        </div>
                    @elseif ($transaction->status == 1)
                        <div>
                            Pembeli sudah melakukan pembayaran.
                        </div>
                    @elseif($transaction->status == 2)
                        <div>
                            Pembayaran sudah dikonfirmasi, silahkan tunggu barang dikirim ke pembeli.
                        </div>
                    @endif
                </div>
            </div>
            <div class="card">
                <div class="justify-content-between card-header d-flex">
                    <div>
                        <h1 class="mb-0 fs-3 fw-semibold">
                            Order : {{ $transaction->invoice }}
                        </h1>
                        <span class="d-block text-secondary">
                            Tanggal Transaksi : {{ $transaction->created_at->format('d F Y') }}
                        </span>
                    </div>
                    <div>
                        print
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <h3 class="mb-0 fs-4 fw-semibold">
                                Alamat Pengiriman
                            </h3>
                            <span>
                                {{ $transaction->address }}
                            </span>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h3 class="mb-0 fs-4 fw-semibold">
                                Metode Pengiriman
                            </h3>
                            <span>
                                {{ $transaction->courier->name }} <span
                                    class="text-uppercase">({{ $transaction->courier->code }})</span>
                            </span>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h3 class="mb-0 fs-4 fw-semibold">
                                Nomor Resi
                            </h3>
                            <span class="d-block">
                                {{ $transaction->resi ?? '-' }}
                            </span>
                            {{-- <span class="d-block">
                                <a href="#" data-bs-toggle="modal" data-bs-target="#modal-input-resi">
                                    Ubah Resi
                                </a>
                            </span> --}}
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <h3 class="mb-0 fs-4 fw-semibold">
                                Status Transaksi
                            </h3>
                            <span class="badge bg-{{ $transaction->status_name['color'] }}">
                                {{ $transaction->status_name['text'] }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-3 border">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped">
                                <thead>
                                    <tr>
                                        <th>Produk Detail</th>
                                        <th>Harga Satuan</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        {{-- <th class="w-1"></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($transaction->transactionDetails as $detail)
                                        <tr>
                                            <td>
                                                <div class="py-1 d-flex align-items-center">
                                                    <span class="avatar me-2"
                                                        style="background-image: url({{ $detail->product->thumbnail }})"></span>
                                                    <div class="flex-fill">
                                                        <div class="font-weight-medium">{{ $detail->product->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $detail->product->formatted_price }}
                                            </td>
                                            <td>
                                                {{ $detail->qty }} x
                                            </td>
                                            <td>
                                                {{ $detail->formatted_subtotal }}
                                            </td>
                                            {{-- <td>
                                                <a
                                                    href="{{ route('admin.product.edit', $detail->product->id) }}">Edit</a>
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4">
                                                Belum ada produk yang ditambahkan.
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0 fs-3">
                        Riwayat Transaksi
                    </h2>
                </div>
                <div class="card-body">
                    <ul class="steps steps-vertical">
                        @foreach ($histories as $history)
                            <li class="step-item">
                                <div class="m-0 h4">{{ $history->status_name['text'] }}</div>
                                @if ($history->status == 0)
                                    <div class="text-secondary">Order dibuat oleh {{ $transaction->name }}, <br> pada
                                        {{ $history->created_at_indonesia }}</div>
                                @endif
                                @if ($history->status == 1)
                                    <div class="text-secondary">Pembayaran dikonfirmasi oleh admin, <br> pada
                                        {{ $history->created_at_indonesia }}</div>
                                @endif
                                @if ($history->status == 2)
                                    <div class="text-secondary">Pesanan sedang diproses oleh admin <br> pada
                                        {{ $history->created_at_indonesia }}</div>
                                @endif
                                @if ($history->status == 3)
                                    <div class="text-secondary">Dikirim menggunakan Ekspedisi
                                        {{ $transaction->courier->name }} <br> Resi: {{ $history->additional_info }}
                                    </div>
                                @endif
                                @if ($history->status == 4)
                                    <div class="text-secondary">Pesanan Sudah sampai </div>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                    {{-- <h3 class="card-title">Steps vertical</h3> --}}
                    {{-- <ul class="steps steps-vertical">
                        <li class="step-item">
                            <div class="m-0 h4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-bag" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z"></path>
                                    <path d="M9 11v-5a3 3 0 0 1 6 0v5"></path>
                                </svg>
                                Order received
                            </div>
                            <div class="text-secondary">

                            </div>
                        </li>
                        <li class="step-item">
                            <div class="m-0 h4">Order received</div>
                            <div class="text-secondary">Lorem ipsum dolor sit amet.</div>
                        </li>
                        <li class="step-item active">
                            <div class="m-0 h4">Out for delivery</div>
                            <div class="text-secondary">Lorem ipsum dolor sit amet.</div>
                        </li>
                        <li class="step-item">
                            <div class="m-0 h4">Finalized</div>
                            <div class="text-secondary">Lorem ipsum dolor sit amet.</div>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0 fs-3">
                        Payment Summary
                    </h2>
                </div>
                <div class="card-body">
                    <div class="border">
                        <div class="table-resposive">
                            <table class="table table-vcenter card-table table-striped">
                                <tr>
                                    <td class="fs-4 fw-semibold">Total Item</td>
                                    <td class="text-end">{{ $transaction->transactionDetails->sum('qty') }} Item</td>
                                </tr>
                                <tr>
                                    <td class="fs-4 fw-semibold">Subtotal</td>
                                    <td class="text-end">{{ 'Rp.' . $transaction->sub_total }}</td>
                                </tr>
                                <tr>
                                    <td class="fs-4 fw-semibold">Biaya Pengiriman</td>
                                    <td class="text-end">
                                        {{ 'Rp.' . number_format($transaction->delivery_cost, 0, ',', ',') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-4 fw-semibold">Diskon Kupon</td>
                                    <td class="text-end">-</td>
                                </tr>
                                <tr>
                                    <td class="fs-3 fw-semibold">Total</td>
                                    <td class="fs-3 fw-semibold text-end">{{ 'Rp.' . $transaction->total_price }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    {{-- <div class="mt-3 border">
                        <div class="table-resposive">
                            <table class="table table-vcenter card-table table-striped">
                                <tr>
                                    <td class="fs-4 fw-semibold">Metode Pembayaran</td>
                                    @if ($transaction->status == 0)
                                        <td class="text-end"> - </td>
                                    @else
                                        <td class="text-end">{{ $transaction->bank->name }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    <td class="fs-4 fw-semibold">Status Pembayaran</td>
                                    <td class="text-end">
                                        {{ $transaction->status == 0
                                            ? 'Menunggu Pembayaran'
                                            : 'Sudah
                                                                                                                        Dibayar' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fs-4 fw-semibold">Bukti Transfer</td>
                                    <td class="text-end">
                                        <a href="#" data-bs-toggle="modal"
                                            data-bs-target="#modal-bukti-transfer">
                                            lihat Bukti Tf
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="mb-0 fs-3">
                        Detail Pelanggan
                    </h2>
                </div>
                <div class="card-body">
                    <dl class="">
                        <dt>Nama :</dt>
                        <dd>{{ $transaction->user->name }}</dd>
                        <dt>Email :</dt>
                        <dd>{{ $transaction->user->email }}</dd>
                        <dt>Telepon :</dt>
                        <dd>{{ $transaction->telephone }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal modal-blur fade" id="modal-input-resi" tabindex="-1" style="display: none;"
        aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('admin.transaction.update-resi', $transaction->id) }}" class="modal-content"
                method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Update Resi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-3 form-group">
                        <label for="" class="form-label">Nomor Resi</label>
                        <input name="resi" id="" class="form-control"
                            placeholder="input nomor resi dari ekspedisi">
                        @error('resi')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </form>
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-bukti-transfer" tabindex="-1" style="display: none;"
        aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="{{ route('admin.transaction.update-confirm', $transaction->id) }}" class="modal-content"
                method="POST">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Transfer</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ $transaction->payment_proof }}" alt="" class="img-fluid">
                    <div class="form-group">
                        <label for="" class="form-label">Konfirmasi Pembayaran</label>
                        <select name="confirm" id="" class="form-select">
                            <option value="">Pilih Status</option>
                            <option value="SUCCESS">Sudah Dibayar (Bukti Sesuai)</option>
                            <option value="FAILED">Belum Dibayar (Bukti Tidak Sesuai)</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
            </form>
        </div>
    </div> --}}
</x-user-layout>
