<x-user-layout>
    @push('header')
        <x-header>
            <x-slot:page_title>
                Data Transaksi
            </x-slot:page_title>
        </x-header>
    @endpush

    <div class="row row-card">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th width="200">Order ID</th>
                                <th>Nama Pembeli</th>
                                <th>Alamat</th>
                                <th>Tgl Transaksi</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                                <th class="w-1"></th>
                                {{-- <th>Keterangan</th>
                                <th>Sub Kategori</th>
                                <th class="w-1"></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $transaction)
                                <tr>
                                    <td class="fw-semibold">{{ $transaction->invoice }}</td>
                                    <td>{{ $transaction->name }}</td>
                                    <td>{{ $transaction->city->type . ' ' . $transaction->city->name }}</td>
                                    <td>{{ $transaction->created_at->format('d M Y') }}</td>
                                    <td>{{ 'Rp. ' . $transaction->total_price }}</td>
                                    <td>
                                        <span class="badge bg-{{ $transaction->status_name['color'] }}">
                                            {{ $transaction->status_name['text'] }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="{{ route('user.transaction.show', $transaction->id) }}">Lihat</a>
                                    </td>
                                    {{-- <td class="fs-5 text-secondary">
                                    {{ $category->description ?? '-' }}
                                </td>
                                <td>
                                    <ul>
                                        @forelse ($category->subCategories as $sub)
                                        <li class="fs-5">{{ $sub->name }}</li>
                                        @empty
                                        -
                                        @endforelse
                                    </ul>
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
                                </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">
                                        Belum ada Transaksi, Lakukanlah Transaksi terlebih dahulu.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $transactions->links('vendor.pagination.default') }}
        </div>
    </div>
</x-user-layout>
