<x-shop-layout>

    <section class="page-title">
        <div class="auto-container">
            <h2>Contact Us</h2>
            <ul class="clearfix bread-crumb">
                <li><a href="{{ route('shop.index') }}">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </section>

    <section class="featured-section">
        <div class="auto-container">
            {{-- <h3 class="text-center mb-3">Hubungi Kami</h3> --}}
            <div class="inner-container">
                <div class="row clearfix">
                    <!-- Feature Block -->
                    <div class="feature-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <div class="icon flaticon-email-1"></div>
                                <strong>E-mail</strong>
                                <div class="text">{{ $setting->email }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <div class="icon flaticon-call"></div>
                                <strong>Telephone</strong>
                                <div class="text">{{ $setting->tel }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block -->
                    <div class="feature-block col-xl-4 col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="content">
                                <div class="icon flaticon-map"></div>
                                <strong>Alamat</strong>
                                <div class="text">{{ $setting->address }}</div>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Block -->

                </div>
            </div>
        </div>
    </section>

    <section class="google-maps">
        <div class="auto-container">
            <!-- Google Maps Embed -->
            <iframe width="100%" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31649.234661488656!2d110.09585857420627!3d-7.809930558051067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7c131ac1f54811%3A0xeefcf354a9034235!2sKulonprogo%2C%20Yogyakarta%2C%20Indonesia!5e0!3m2!1sen!2sus!4v1632199038991!5m2!1sen!2sus"></iframe>
        </div>
    </section>

    <section></section>

    <x-shop.gallery />
</x-shop-layout>
