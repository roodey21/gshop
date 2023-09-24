<!-- Main Footer -->
<footer class="main-footer">
    <div class="pattern-layer-one" style="background-image: url(images/icons/pattern-3.png)"></div>
    <div class="pattern-layer-two" style="background-image: url(images/icons/vector-2.png)"></div>
    <div class="auto-container">

        <!-- Widgets Section -->
        <div class="widgets-section">
            <div class="clearfix row">
                <!-- Column -->
                <div class="big-column col-lg-7 col-md-12 col-sm-12">
                    <div class="clearfix row">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <!-- Logo -->
                                <div class="logo"><a href="{{ route('shop.index') }}"><img src="{{ asset('shop/images/logo.png') }}" class="img-fluid" alt="" title="" style="max-height: 100px"></a></div>
                                <div class="text">{{ $web_setting->address }} </div>
                                <ul class="contact-list">
                                    <li><span class="icon flaticon-email"></span>{{ $web_setting->email }}</li>
                                    <li><span class="icon flaticon-call"></span>{{ $web_setting->tel }}</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        {{-- <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h5>Find It Fast</h5>
                                <ul class="page-list">
                                    <li><a href="#">Laptops & Computers</a></li>
                                    <li><a href="#">Cameras & Photography</a></li>
                                    <li><a href="#">Smart Phones & Tablets</a></li>
                                    <li><a href="#">Video Games & Consoles</a></li>
                                    <li><a href="#">TV & Audio</a></li>
                                </ul>
                            </div>
                        </div> --}}

                    </div>
                </div>

                <!-- Column -->
                <div class="big-column col-lg-5 col-md-12 col-sm-12">
                    <div class="clearfix row">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h5>Quick Links</h5>
                                <ul class="page-list">
                                    @foreach ($categories as $category)
                                    <li><a href="{{ route('shop.product.index', ['category' => $category->id]) }}" class="text-capitalize">{{ strtolower($category->name) }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget instagram-widget">
                                <h5>Service us</h5>
                                <ul class="page-list-two">
                                    <li><a href="{{ route('shop.contact') }}">Support Center</a></li>
                                    {{-- <li><a href="#">Term & Conditions</a></li> --}}
                                    <li><a href="{{ route('shop.cek-ongkir') }}">Cek Ongkos Kirim</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="{{ route('shop.contact') }}">Bantuan</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="flex-wrap d-flex justify-content-between align-items-center">
                <div class="copyright"><span>&copy; 2023</span> by {{ $web_setting->name }}. All Rights Reserved.</div>
                {{-- <div class="email-box">
                    <a href="mailto:DumTheme@gmail.com"><span class="icon flaticon-mail"></span>DumTheme@gmail.com</a>
                </div> --}}
                <div class="cards"><img src="images/icons/cards.png" alt="" /></div>
            </div>
        </div>

    </div>
</footer>
<!-- End Main Footer -->
