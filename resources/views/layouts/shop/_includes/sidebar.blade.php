<!-- Sidebar Cart Item -->
<div class="xs-sidebar-group info-group">
    <div class="xs-overlay xs-bg-black"></div>
    <div class="xs-sidebar-widget">
        <div class="sidebar-widget-container">
            <div class="widget-heading">
                <a href="#" class="close-side-widget flaticon-multiply"></a>
            </div>
            <div class="sidebar-textwidget">

                <!-- Sidebar Info Content -->
                <div class="sidebar-info-contents">
                    <div class="content-inner">
                        <div class="logo">
                            <a href="index.html"><img src="images/logo.png" alt="" title=""></a>
                        </div>
                        <div class="content-box">

                            <h6>Services</h6>
                            <ul class="sidebar-services-list">
                                <li><a href="{{ route('shop.product.index') }}">Produk</a></li>
                                <li><a href="#">About Us</a></li>
                            </ul>

                            <h6>Contact info</h6>
                            <!-- List Style One -->
                            <ul class="list-style-one">
                                <li>
                                    <span class="icon flaticon-maps-and-flags"></span>
                                    <strong>Alamat Kami</strong>
                                    {{ $web_setting->address }}
                                </li>
                                <li>
                                    <span class="icon flaticon-call-1"></span>
                                    <strong>Telepon</strong>
                                    <a href="tel:{{ $web_setting->tel }}">{{ $web_setting->tel }}</a><br>
                                    {{-- <a href="tel:+000-000-0000">000 000 0000</a> --}}
                                </li>
                                <li>
                                    <span class="icon flaticon-mail"></span>
                                    <strong>Email</strong>
                                    <a href="mailto:contact@bloxic.com">{{ $web_setting->email }}</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- END sidebar widget item -->
