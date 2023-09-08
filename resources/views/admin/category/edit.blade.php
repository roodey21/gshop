<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Edit Kategori
        </x-slot:page_title>
    </x-header>
    @endpush

    <div class="col-md-6">
        <form class="card" action="{{ route('admin.category.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-header d-flex justify-content-between">
                <h3 class="card-title">Kategori Produk</h3>
                <button type="button" class="btn btn-danger btn-icon" id="delete-button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-delete">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                    <label class="form-label required">Nama Kategori</label>
                    <div>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}"
                            class="form-control @error('name') is-invalid @enderror" aria-describedby="nameHelp"
                            placeholder="Contoh: Fashion, Alat Dapur" required>
                        @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi/Keterangan</label>
                    <div>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            id="description" cols="30" rows="4"
                            placeholder="Optional">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Induk Kategori</label>
                    <div>
                        <select class="form-select @error('parent_id') is-invalid @enderror" name="parent_id">
                            @forelse ($categories as $item)
                            <option value="{{ $item->id }}" {{ old('parent_id', $category->parent_id) == $item->id ?
                                'selected':'' }}>{{ $item->name }}</option>
                            @empty
                            <option value="">Belum ada kategori</option>
                            @endforelse
                        </select>
                        @error('parent_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <div class="form-label">Status</div>
                    <label class="form-check form-switch">
                        <input class="form-check-input @error('status') is-invalid @enderror" value="1" type="checkbox"
                            {{ old('status', $category->status) == 1 ? 'checked':'' }} name="status">
                        <span class="form-check-label">Aktif</span>
                    </label>
                    @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.category.index') }}" class="btn btn-outline-dark">Kembali</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>

        <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="modal-status bg-danger"></div>
                    <div class="py-4 text-center modal-body">
                        <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="mb-2 icon text-danger icon-lg" width="24"
                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
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
                                    <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST">
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
        @push('js')
        <script>
            $('#delete-button').click(function () {

                })
        </script>
        @endpush
    </div>
</x-app-layout>
