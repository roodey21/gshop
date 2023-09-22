<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Review Product
        </x-slot:page_title>
        {{-- <x-slot:right_side>
            <div class="btn-list">
                <x-create-button :route="route('admin.product.create')" />
            </div>
        </x-slot:right_side> --}}
    </x-header>
    @endpush

    <div class="row row-card">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Nama Pengguna</th>
                                <th>Nama Product</th>
                                <th>Rating</th>
                                <th>Testimoni</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviews as $review)
                            <tr>
                                <td class="text-secondary fs-5" width="200">
                                    {{ $review->transaction->invoice }}
                                </td>
                                <td>
                                    {{ $review->transaction->user->name }}
                                </td>
                                <td>
                                    {{ $review->product->name }}
                                </td>
                                <td class="fs-6">
                                    @if($review->rating == 0)
                                        <span class="fs-5">Belum direview user</span>
                                    @else
                                        @for ($i = 0; $i < $review->rating; $i++)
                                        <span class="text-yellow">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z" stroke-width="0" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                        @endfor
                                    @endif
                                </td>
                                <td>
                                    {{ $review->review }}
                                </td>
                                <td>
                                    {{-- <a href="{{ route('admin.product.edit', $product->id) }}">Edit</a> --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6">
                                    Belum ada produk yang direview.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $reviews->links('vendor.pagination.default') }}
        </div>
    </div>
</x-app-layout>
