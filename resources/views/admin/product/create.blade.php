<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Buat Produk Baru
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

    <form class="row row-cards" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
        <div class="col-md-8">
            <div class="card">
                @csrf
                <div class="card-header">
                    <h3 class="card-title">Form Produk</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label class="form-label required">Nama Produk</label>
                            <div>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror" aria-describedby="nameHelp"
                                    placeholder="Contoh: Fashion, Alat Dapur" required>
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Kode SKU</label>
                            <div>
                                <input class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku"
                                    placeholder="Kode Barang (Optional)" value="{{ old('sku') }}">
                                @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
                                    cols="30" rows="4" placeholder="Harga" value="{{ old('price') }}" required>
                                @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label class="form-label required">Berat Barang</label>
                            <div class="input-group">
                                <input class="form-control @error('weight') is-invalid @enderror" name="weight"
                                    id="weight" placeholder="Inputkan dalam satuan gram" value="{{ old('weight') }}"
                                    required>
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
                            <label class="form-label">Stok</label>
                            <div>
                                <input class="form-control @error('stock') is-invalid @enderror" name="stock" id="stock"
                                    placeholder="Jumlah Stock Barang" value="{{ old('stock') }}">
                                @error('stock')
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
                                    <option value="{{ $category->id }}" {{ old('category_id', $category->id) ==
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
                                {{ old('description') }}
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
                                type="checkbox" checked="" name="status">
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
                    <h3 class="card-title">Foto Produk</h3>
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
                        <div class="text-secondary">Gunakan tombol + diatas untuk menambah gambar. <br>(max 4 gambar /produk, max 1 mb /gambar)</div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Gambar Utama (Untuk thumbnail)</label>
                        <input type="file" name="images[0]" class="form-control" accept="image/*">
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('lib-js')
    <script src="{{ asset('libs/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('libs/tinymce/plugins/advlist/plugin.js') }}"></script>
    <script src="{{ asset('libs/tinymce/plugins/lists/plugin.js') }}"></script>
    @endpush
    @push('js')
    <script>
        container = document.querySelector('body');
        container.getAttribute('data-bs-theme') == 'dark' ? dark = true : dark = false;
        tinymce.init({
            selector: 'textarea#description',
            skin: ( dark ? 'oxide-dark' : "oxide"),
            content_css: (dark ? "dark" : ""),
            height: 500,
            menubar: false,
            plugins: [
                'lists',
            ],
            toolbar: 'undo redo | formatselect | ' +
            'bold italic backcolor | alignleft aligncenter ' +
            'alignright alignjustify | bullist numlist outdent indent | ' +
            'removeformat | help',
            content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
        });

        let imageCount = 0;
        const maxImage = 3;
        document.querySelector('#add-image').addEventListener('click', function() {
            if (imageCount >= maxImage) {
                return;
            }
            imageCount++;
            let input = document.createElement('div');
            input.classList.add('mb-3');
            input.innerHTML = `
                <label for="" class="form-label">Gambar Lain ${imageCount}</label>
                <input type="file" name="images[${imageCount}]" class="form-control" accept="image/*">
            `;
            document.querySelector('#input-images').appendChild(input);
        });
    </script>
    @endpush
</x-app-layout>
