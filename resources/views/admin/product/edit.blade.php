<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Edit Data Produk
        </x-slot:page_title>
        <x-slot:right_side>
            <a href="{{ route('admin.product.index') }}" class="btn btn-outline-secondary">
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

    <form action="{{ route('admin.product.update', $product->id) }}" method="POST" class="row row-cards" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="card">
                @csrf
                @method('PUT')
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Form Produk</h3>
                    <button type="button" class="btn btn-danger btn-icon" id="delete-button" class="btn btn-danger"
                        data-bs-toggle="modal" data-bs-target="#modal-delete">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 7h16"></path>
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            <path d="M10 12l4 4m0 -4l-4 4"></path>
                        </svg>
                    </button>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label required">Nama Produk</label>
                        <div>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                class="form-control @error('name') is-invalid @enderror" aria-describedby="nameHelp"
                                placeholder="Contoh: Fashion, Alat Dapur" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label required">Harga Produk</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    Rp
                                </span>
                                <input class="form-control @error('price') is-invalid @enderror" name="price" id="price"
                                    placeholder="Harga" value="{{ old('price', $product->price) }}" required>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label required">Berat Barang</label>
                            <div class="input-group">
                                <input class="form-control @error('weight') is-invalid @enderror" name="weight"
                                    id="weight" placeholder="Inputkan dalam satuan gram"
                                    value="{{ old('weight', $product->weight) }}" required>
                                <span class="input-group-text">
                                    Gr
                                </span>
                                @error('weight')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kode SKU</label>
                            <div>
                                <input class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku"
                                    placeholder="Kode Barang (Optional)" value="{{ old('sku', $product->sku) }}">
                                @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kategori</label>
                            <div>
                                <select class="form-select @error('category_id') is-invalid @enderror"
                                    name="category_id">
                                    @forelse ($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category->id) ==
                                        $category->id ? 'selected':'' }}>{{ $category->name }}</option>
                                    @empty
                                    <option value="">Belum ada kategori</option>
                                    @endforelse
                                </select>
                                @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Deskripsi/Keterangan</label>
                        <div>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                                id="description" placeholder="Deskripsikan produk kamu disini">
                                {{ old('description', $product->description) }}
                            </textarea>
                            @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-label">Status</div>
                        <label class="form-check form-switch">
                            <input class="form-check-input @error('status') is-invalid @enderror" value="1"
                                type="checkbox" {{ old('status', $product->status) == 1 ? 'checked':'' }} name="status">
                            <span class="form-check-label">Aktif</span>
                        </label>
                        @error('status')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3 class="card-title">Form Produk</h3>
                    <button type="button" class="btn btn-primary btn-icon" id="add-image">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 5l0 14" />
                            <path d="M5 12l14 0" />
                        </svg>
                    </button>
                </div>
                <div class="card-body" id="input-images">
                    <div class="alert alert-info" role="alert">
                        <h4 class="alert-title">Petunjuk!</h4>
                        <div class="text-secondary">Gunakan tombol + diatas untuk menambah gambar. <br>(max 5 gambar /produk, max 1 mb /gambar)</div>
                    </div>
                    <div class="row row-cards">
                        @foreach ($product->getMedia('product-images') as $image)
                        <div class="mb-3 col-6">
                            <a data-fslightbox="gallery" href="{{ $image->getUrl() }}">
                              <!-- Photo -->
                              <div class="border img-responsive img-responsive-1x1 rounded-3" style="background-image: url({{ $image->getUrl() }})"></div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-status bg-danger"></div>
                <div class="py-4 text-center modal-body">
                    <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-2 icon text-danger icon-lg" width="24" height="24"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path
                            d="M10.24 3.957l-8.422 14.06a1.989 1.989 0 0 0 1.7 2.983h16.845a1.989 1.989 0 0 0 1.7 -2.983l-8.423 -14.06a1.989 1.989 0 0 0 -3.4 0z">
                        </path>
                        <path d="M12 9v4"></path>
                        <path d="M12 17h.01"></path>
                    </svg>
                    <h3>Apakah anda yakin?</h3>
                    <div class="text-secondary">Kategori yang sudah dihapus tidak dapat dikembalikan!</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <a href="#" class="btn w-100" data-bs-dismiss="modal">
                                    Cancel
                                </a>
                            </div>
                            <div class="col">
                                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100" data-bs-dismiss="modal">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('lib-js')
    <script src="{{ asset('libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('libs/tinymce/plugins/advlist/plugin.js') }}"></script>
    <script src="{{ asset('libs/tinymce/plugins/lists/plugin.js') }}"></script>
    <script src="{{ asset('libs/fslightbox/index.js?1684106062') }}" defer></script>
    @endpush

    @push('js')
    <script>
        container = document.querySelector('body');
            container.getAttribute('data-bs-theme') == 'dark' ? dark = true : dark = false;
            tinymce.init({
                selector: 'textarea#description',
                skin: ( dark ? 'oxide-dark' : 'oxide'),
                content_css: (dark ? 'dark' : ''),
                height: 300,
                menubar: false,
                plugins: [
                    'lists',
                ],
                toolbar: 'undo redo | formatselect | ' +
                'bold italic backcolor | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat | help',
                content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }',
            });
        let imageCount = {{ $product->getMedia('product-images')->count() }};
        const maxImage = 5;
        document.querySelector('#add-image').addEventListener('click', function() {
            if (imageCount >= maxImage) {
                return;
            }
            imageCount++;
            let input = document.createElement('div');
            input.classList.add('mb-3');
            input.innerHTML = `
                <label for="" class="form-label">Gambar ${imageCount}</label>
                <input type="file" name="images[]" class="form-control">
            `;
            document.querySelector('#input-images').appendChild(input);
        });
    </script>
    @endpush
</x-app-layout>
