<!-- Main Footer -->
<footer class="main-footer">
    <div class="pattern-layer-one" style="background-image: url(images/icons/pattern-3.png)"></div>
    <div class="pattern-layer-two" style="background-image: url(images/icons/vector-2.png)"></div>
    <div class="auto-container">

        <!-- Widgets Section -->
        <div class="widgets-section">
            <div class="row clearfix">
                <!-- Column -->
                <div class="big-column col-lg-7 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <!-- Logo -->
                                <div class="logo"><a href="index.html"><img src="images/logo.png" alt="" title=""></a></div>
                                <div class="text">{{ $web_setting->address }} </div>
                                <ul class="contact-list">
                                    <li><span class="icon flaticon-email"></span>{{ $web_setting->email }}</li>
                                    <li><span class="icon flaticon-call"></span>{{ $web_setting->tel }}</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
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
                        </div>

                    </div>
                </div>

                <!-- Column -->
                <div class="big-column col-lg-5 col-md-12 col-sm-12">
                    <div class="row clearfix">

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-7 col-md-6 col-sm-12">
                            <div class="footer-widget links-widget">
                                <h5>Quick Links</h5>
                                <ul class="page-list">
                                    <li><a href="#">Your Account</a></li>
                                    <li><a href="#">Returns & Exchanges</a></li>
                                    <li><a href="#">Return Center</a></li>
                                    <li><a href="#">Purchase Hisotry</a></li>
                                    <li><a href="#">App Download</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Footer Column -->
                        <div class="footer-column col-lg-5 col-md-6 col-sm-12">
                            <div class="footer-widget instagram-widget">
                                <h5>Service us</h5>
                                <ul class="page-list-two">
                                    <li><a href="#">Support Center</a></li>
                                    <li><a href="#">Term & Conditions</a></li>
                                    <li><a href="#">Shipping</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Help</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="d-flex justify-content-between align-items-center flex-wrap">
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
