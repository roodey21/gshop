<x-app-layout>

    @push('header')
    <x-header>
        <x-slot:page_title>
            Web Info
        </x-slot:page_title>
    </x-header>
    @endpush

    <div class="col-12">
        <form action="{{ route('admin.setting.update', $setting->id) }}" method="POST" class="card">
            @csrf
            @method('PUT')
            <div class="card-body">
                <h3 class="card-title">Edit Profile</h3>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Company</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                placeholder="Nama Usaha" value="{{ old('name', $setting->name ) }}">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Telephone</label>
                            <input type="text" class="form-control @error('tel') is-invalid @enderror " name="tel"
                                placeholder="Nomor Telephone" value="{{ old('name', $setting->tel ) }}">
                            @error('tel')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="E-mail Usaha" value="{{ old('name', $setting->email ) }}">
                            @error('email')
                            <div class="invalid-feedabck">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                name="address" placeholder="Alamat Usaha" value="{{ old('name', $setting->address ) }}">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-0 mb-3">
                            <label class="form-label">About Us</label>
                            <div>
                                <textarea class="form-control" name="description" id="description"
                                    placeholder="Beritahu Customer tentang anda">
                                {{ old('description') }}
                            </textarea>
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update Info</button>
            </div>
        </form>
    </div>
    @push('lib-js')
    <script src="{{ asset('libs/tinymce/tinymce.min.js') }}"></script>
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
    </script>
    @endpush
</x-app-layout>
