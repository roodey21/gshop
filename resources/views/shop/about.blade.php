<x-shop-layout>

    <section class="page-title">
        <div class="auto-container">
            <h2>About Us</h2>
            <ul class="clearfix bread-crumb">
                <li><a href="{{ route('shop.index') }}">Home</a></li>
                <li>About</li>
            </ul>
        </div>
    </section>


    <section class="about-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Image Column -->
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image">
                            <img decoding="async" src="{{ asset('shop/images/gallery/6.jpg') }}" alt="">
                        </div>
                    </div>
                </div>

                <!-- content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="title">Tentang ARSENIK</div>
                        <h2>Transforming Clay into Local Artistry</h2>

                        <div class="text">{!! $setting->description !!}</div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <x-shop.gallery />

</x-shop-layout>
