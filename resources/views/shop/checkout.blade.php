<x-shop-layout>

    @push('css')
        <style>
            .ui-menu.ui-corner-bottom.ui-widget.ui-widget-content {
                height: 250px;
            }
        </style>
    @endpush
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
            <h2>Checkout Page</h2>
            <ul class="clearfix bread-crumb">
                <li><a href="index.html">Home</a></li>
                <li>Pages</li>
                <li>Checkout</li>
            </ul>
        </div>
    </section>
    <!-- End Page Title -->

    <!-- Checkout Section -->
    <section class="checkout-section">

        <div class="auto-container">
            <div class="clearfix row">

                <!-- Form Column -->
                <div class="form-column col-lg-8 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h4>Informasi Pengiriman</h4>
                        <!-- Shipping Form -->
                        <div class="shipping-form">
                            <form method="POST" action="{{ route('cart.checkout.store') }}">
                                @csrf
                                <div class="clearfix row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="name" id="name" placeholder="Masukkan Nama"
                                            value="{{ old('name') }}"
                                            class="form-control @error('name') is-invalid @enderror" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                        <input type="text" name="telephone" id="telephone"
                                            value="{{ old('telephone') }}" placeholder="Masukan Nomor Handphone"
                                            class="form-control @error('telephone') is-invalid @enderror" required>
                                        @error('telephone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                        <select class="custom-select-box @error('province_id') is-invalid @enderror"
                                            name="province_id" id="province_id" required>
                                            <option selected>Pilih Provinsi</option>
                                            @forelse ($provinces as $province)
                                                <option value="{{ $province->id }}">
                                                    {{ $province->name }}</option>
                                            @empty
                                                <option value="">Tidak ada data</option>
                                            @endforelse
                                            @error('province_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                        <select name="city_id"
                                            class="custom-select-box @error('city_id') is-invalid @enderror"
                                            id="city_id" required>
                                            <option selected>Pilih Kota/Kabupaten</option>
                                            @error('city_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                        <select name="subdistrict"
                                            class="custom-select-box @error('subdistric') is-invalid @enderror"
                                            id="subditric" required>
                                            <option selected>Pilih Kecamatan</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                        <input type="text" name="address" id="address"
                                            value="{{ old('address') }}" placeholder="Alamat Lengkap" required>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 form-group" id="courier-select"
                                        style="display: none">
                                        <select name="courier_id"
                                            class="custom-select-box @error('courier_id') is-invalid @enderror"
                                            id="courier_id">
                                            <option value="" selected>Pilih Kurir</option>
                                            {{-- <option value="ambil">Ambil ditoko</option> --}}
                                            @forelse ($couriers as $courier)
                                                @if ($courier->status == 1)
                                                    <option value="{{ $courier->id }}">
                                                        {{ $courier->name }}</option>
                                                @endif
                                            @empty
                                                <option value="">Tidak ada data</option>
                                            @endforelse
                                            @error('courier_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </select>
                                    </div>

                                    <div class="mb-5 col-lg-12 col-md-12 col-sm-12 form-group">
                                        <textarea class="" name="description" id="description" placeholder="Note Produk (Optional)"></textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                        </div>
                        <!-- End Shipping Form -->

                    </div>
                </div>

                <!-- Order Column -->
                <div class="order-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <h4>Order Summary</h4>
                        <!-- Order Box -->
                        <div class="order-box">
                            <ul class="order-totals">
                                <li>Subtotal<span>Rp. {{ auth()->user()->total_cart }}</span></li>
                                <li>Shipping Fee<span class="delivery-cost">-</span></li>
                            </ul>

                            <!-- Order Total -->
                            <div class="order-total">Total <span class="grand-total"></span></div>

                            <div class="button-box">
                                <button type="submit" class="theme-btn pay-btn">Lanjut Pembayaran</button>
                            </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Checkout Section -->

    <!-- Gallery Section -->
    <x-shop.gallery />
    <!-- End Gallery Section -->
    @push('js')
        <script>
            // $('select[name=province]').selectmenu();
            // $('select[name=city]').selectmenu();
            let province_id = null;
            let city_id = null;
            let subdistrict_id = null;
            let weight = "{{ auth()->user()->carts->sum(function ($cart) {return $cart->qty * $cart->product->weight;}) }}";
            let total_cart = "{{ auth()->user()->total_cart }}";
            let subtotal = parseInt(total_cart.replace(",", ""));
            let delivery_cost = 0;
            let grand_total = subtotal + delivery_cost;
            $('.grand-total').html('Rp. ' + grand_total);

            $('select[name=province_id]').on('selectmenuchange', function() {
                const id = $(this).val();
                province_id = id;
                $.ajax({
                    url: '{{ route('ongkir.getCity') }}',
                    method: 'GET',
                    data: {
                        province_id: id
                    },
                    success: function(res) {
                        // Clear the city selectmenu
                        $('select[name=city_id]').empty();

                        // Add a default option
                        $('select[name=city_id]').append('<option value="">Pilih Kota/Kabupaten</option>');

                        // Add options for each city
                        res.data.forEach(city => {
                            $('select[name=city_id]').append(
                                `<option value="${city.id}">${city.name}</option>`);
                        });

                        // Refresh the city selectmenu
                        $('select[name=city_id]').selectmenu('refresh');
                    }
                });
            });

            $('select[name=city_id]').on('selectmenuchange', function() {
                const id = $(this).val();
                city_id = id;
                $.ajax({
                    url: '{{ route('ongkir.getSubdistrict') }}',
                    method: 'GET',
                    data: {
                        city_id: id
                    },
                    success: function(res) {
                        const subdistrict = res.data;

                        // Clear the subdistrict selectmenu
                        $('select[name=subdistrict]').empty();

                        // Add a default option
                        $('select[name=subdistrict]').append('<option value="">Pilih Kecamatan</option>');

                        // Add options for each subdistrict
                        subdistrict.forEach(sub => {
                            $('select[name=subdistrict]').append(
                                `<option value="${sub.subdistrict_id}">${sub.subdistrict_name}</option>`
                            );
                        });

                        // Refresh the subdistrict selectmenu
                        $('select[name=subdistrict]').selectmenu('refresh');
                    }
                });
            });

            $('select[name=subdistrict]').on('selectmenuchange', function() {
                const id = $(this).val();
                subdistrict_id = id;
                if (subdistrict_id != undefined) {
                    $('#courier-select').css('display', 'block');
                } else {
                    $('#courier-select').css('display', 'none');
                }
            });

            $('select[name=courier_id]').on('selectmenuchange', function() {
                const courier_id = $(this).val();
                console.log(courier_id)
                if (courier_id === '1') {
                    delivery_cost = 0;
                    $('.delivery-cost').html('Rp. ' + delivery_cost);
                } else {
                    $.ajax({
                        url: '{{ route('shop.cart.cekOngkir') }}',
                        method: 'GET',
                        data: {
                            destination: $('select[name=subdistrict]').val(),
                            courier_id: courier_id
                        },
                        success: function(res) {
                            console.log(res)
                            delivery_cost = res.data;
                            let new_total = parseInt(total_cart.replace(",", "")) + delivery_cost;
                            $('.delivery-cost').html('Rp. ' + delivery_cost);
                            $('.grand-total').html('Rp. ' + new_total);
                        }
                    });
                }
            });

            // $( "select[name=province]" ).selectmenu({
            // 	change: function( event, ui ) {
            // 		console.log(event.target)
            // 	}
            // });
            // $('select[name=province]').on('change', function() { console.log('ok');
            //     const id = $(this).val()
            //     $.ajax({
            //         url: '{{ route('ongkir.getCity') }}',
            //         method: 'GET',
            //         data: {
            //             province_id: id
            //         },
            //         success: function(res) {
            //             $('select[name=city]').html('')
            //             $('select[name=city]').append(`
    //                 <option value="">Pilih Kota/Kabupaten</option>
    //             `)
            //             res.data.forEach(city => {
            //                 $('select[name=city]').append(`
    //                     <option value="${city.id}">${city.name}</option>
    //                 `)
            //             })
            //         }
            //     })
            // })

            // $('select[name=city]').on('change', function () {
            //     const id = $(this).val()
            //     $.ajax({
            //         url: '{{ route('ongkir.getSubdistrict') }}',
            //         method: 'GET',
            //         data: {
            //             city_id: id
            //         },
            //         success: function(res) {
            //             subdistrict = res.data
            //             $('select[name=subdistrict]').html('')
            //             $('select[name=subdistrict]').append(`
    //                     <option value="">Pilih Kecamatan</option>
    //                 `)
            //             subdistrict.forEach(sub => {
            //                 $('select[name=subdistrict]').append(`
    //                     <option value="${sub.subdistrict_id}">${sub.subdistrict_name}</option>
    //                 `)
            //             })
            //         }
            //     })
            // })
            //
        </script>
    @endpush
</x-shop-layout>
