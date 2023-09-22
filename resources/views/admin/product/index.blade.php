<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Data Produk
        </x-slot:page_title>
        <x-slot:right_side>
            <div class="btn-list">
                <x-create-button :route="route('admin.product.create')" />
            </div>
        </x-slot:right_side>
    </x-header>
    @endpush

    <div class="row row-card">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Harga Diskon</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>
                                    <div class="py-1 d-flex align-items-center">
                                        <span class="avatar me-2" style="background-image: url({{ $product->thumbnail }})"></span>
                                        <div class="flex-fill">
                                            <div class="font-weight-medium">{{ $product->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="fs-5 text-secondary">
                                    <span class="badge bg-azure text-azure-fg text-uppercase">
                                        {{ $product->category->name }}
                                    </span>
                                </td>
                                <td>
                                    {{ $product->formatted_price }}
                                </td>
                                <td>
                                    {{ $product->formatted_discount }}
                                </td>
                                <td>
                                    <a href="{{ route('admin.product.edit', $product->id) }}">Edit</a>
                                </td>
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
            {{ $products->links('vendor.pagination.default') }}
        </div>
    </div>
</x-app-layout>
