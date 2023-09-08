<x-app-layout>
    @push('header')
    <x-header>
        <x-slot:page_title>
            Data Bank
        </x-slot:page_title>
        <x-slot:right_side>
            <div class="btn-list">
                <x-create-button :route="route('admin.bank.create')" />
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
                                <th>Nama Bank</th>
                                <th>Nama Rekening</th>
                                <th>Nomor Rekening</th>
                                <th>Status</th>
                                <th class="w-1"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($banks as $bank)
                            <tr>
                                <td>{{ $bank->name }}</td>
                                <td class="fs-5 text-secondary">
                                    {{ $bank->account_name }}
                                </td>
                                <td>
                                    {{ $bank->account_number }}
                                </td>
                                <td>
                                    @if($bank->status)
                                    <span class="badge bg-green text-green-fg">Aktif</span>
                                    @else
                                    <span class="badge bg-red text-red-fg">Tidak Aktif</span>
                                    @endif
                                    {{-- {{ $bank->status }} --}}
                                </td>
                                <td>
                                    <a href="{{ route('admin.bank.edit', $bank->id) }}">Edit</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">
                                    Belum ada nomor rekening yang tersimpan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            {{ $banks->links('vendor.pagination.default') }}
        </div>
    </div>
</x-app-layout>
