<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Edit Kurir
        </x-slot:page_title>
    </x-header>
    @endpush

    <div class="col-md-8">
        <form class="card" action="{{ route('admin.courier.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-header">
                <h3 class="card-title">Data Kurir Ekspedisi</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Ekspedisi</th>
                                <th>Kode</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($couriers as $courier)
                            <tr>
                                <td>{{ $courier->name }}</td>
                                <td>
                                    {{ $courier->code }}
                                </td>
                                <td>
                                    <label class="form-check form-switch">
                                        <input class="form-check-input @error('status') is-invalid @enderror" value="1" type="checkbox" {{ old('status', $courier->status) == 1 ? 'checked':'' }} name="status[{{ $courier->id }}]">
                                        <span class="form-check-label">Aktif</span>
                                    </label>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    Belum ada data kurir yang tersimpan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer text-end">
                <a href="{{ route('admin.courier.index') }}" class="btn btn-outline-dark">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</x-app-layout>
