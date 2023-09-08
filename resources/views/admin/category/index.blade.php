<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Kategori Produk
        </x-slot:page_title>
        <x-slot:right_side>
            <div class="btn-list">
                <x-create-button :route="route('admin.category.create')" />
            </div>
        </x-slot:right_side>
    </x-header>
    @endpush

    {{-- <div class="position-fixed" style="top: 24px; right: 20px; z-index: 10">
        <div class="alert alert-success alert-dismissible" role="alert">
            <div class="d-flex">
                <div>
                    <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l5 5l10 -10"></path>
                    </svg>
                </div>
                <div>
                    Wow! Everything worked!
                </div>
            </div>
            <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
        </div>
    </div> --}}
    <div class="row row-card">
        <div class="col-12">
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Kategori</th>
                                <th>Keterangan</th>
                                <th>Sub Kategori</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td class="fs-5 text-secondary">
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
                                    {{-- {{ $category->subCategories }} --}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    Belum ada kategori, tambahkan kategori terlebih dahulu.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $categories->links('vendor.pagination.default') }}
        </div>
    </div>
</x-app-layout>
