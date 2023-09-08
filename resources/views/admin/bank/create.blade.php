<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Tambah Rekening Baru
        </x-slot:page_title>
    </x-header>
    @endpush

    <div class="col-md-6">
        <form class="card" action="{{ route('admin.bank.store') }}" method="POST">
            @csrf
            <div class="card-header">
                <h3 class="card-title">Rekening Bank</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label required">Nama Bank</label>
                    <div>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" aria-describedby="nameHelp"
                            placeholder="Contoh: Bank BRI, BCA, Mandiri" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Nama Rekening</label>
                    <div>
                        <input type="text" name="account_name" value="{{ old('account_name') }}" class="form-control @error('account_name') is-invalid @enderror" aria-describedby="nameHelp"
                            placeholder="Nama pemilik rekening" required>
                            @error('account_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label required">Nomor Rekening</label>
                    <div>
                        <input type="text" name="account_number" value="{{ old('account_number') }}" class="form-control @error('account_number') is-invalid @enderror" aria-describedby="nameHelp"
                            placeholder="Hanya angka" required>
                            @error('account_number')
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
