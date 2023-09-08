<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Buat Kategori Baru
        </x-slot:page_title>
    </x-header>
    @endpush

    <div class="col-md-6">
        <form class="card" action="{{ route('admin.category.store') }}" method="POST">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Kategori Produk</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">Nama Kategori</label>
                    <div>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" aria-describedby="nameHelp"
                            placeholder="Contoh: Fashion, Alat Dapur" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi/Keterangan</label>
                    <div>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30"
                            rows="4" placeholder="Optional">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Induk Kategori</label>
                    <div>
                        <select class="form-select @error('parent_id') is-invalid @enderror" name="parent_id" >
                            @forelse ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('parent_id', $category->id) == $category->id ? 'selected':'' }}>{{ $category->name }}</option>
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
                        <input class="form-check-input @error('status') is-invalid @enderror" value="1" type="checkbox" checked="" name="status">
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
        </form>
    </div>
</x-app-layout>
