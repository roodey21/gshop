<x-shop-layout>
    <!-- Page Title -->
    <section class="page-title">
        <div class="auto-container">
			<h2>Checkout Page</h2>
			<ul class="bread-crumb clearfix">
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
			<div class="row clearfix">

				<!-- Form Column -->
				<div class="form-column col-lg-8 col-md-12 col-sm-12">
					<div class="inner-column">
						<h4>Delivery Information</h4>
						<!-- Shipping Form -->
						<div class="shipping-form">
							<form method="post" action="contact.html">
								<div class="row clearfix">

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="username" placeholder="Enter Your name" required="">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="phone" placeholder="Enter Your Phone Number" required="">
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<select name="currency" class="custom-select-box">
											<option>Please Choose your current City</option>
											<option>City 01</option>
											<option>City 02</option>
											<option>City 03</option>
											<option>City 04</option>
										</select>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 form-group">
										<input type="text" name="subject" placeholder="Appartmentment, (optinal)" required="">
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<textarea class="" name="message" placeholder="Description (about Product)"></textarea>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<div class="check-box">
											<input type="checkbox" name="remember-password" id="type-1">
											<label for="type-1">Save my name, email, and website in this browser for the next time.</label>
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 form-group">
										<div class="buttons-box">
											<button class="theme-btn btn-style-one">
												Procced To Cheakout
											</button>
										</div>
									</div>

								</div>
							</form>
						</div>
						<!-- End Shipping Form -->

					</div>
				</div>

				<!-- Order Column -->
				<div class="order-column col-lg-4 col-md-12 col-sm-12">
					<div class="inner-column">
						<h4>Order Summery</h4>
						<!-- Order Box -->
						<div class="order-box">
							<ul class="order-totals">
								<li>Subtotal<span>$345.00</span></li>
								<li>Shipping Fee<span>$34.00</span></li>
							</ul>

							<!-- Voucher Box -->
							<div class="voucher-box">
								<form method="post" action="contact.html">
									<div class="form-group">
										<input type="email" name="search-field" value="" placeholder="Enter voucher Code" required>
										<button type="submit" class="theme-btn apply-btn">Apply code</button>
									</div>
								</form>
							</div>

							<!-- Order Total -->
							<div class="order-total">Total <span>$345.00</span></div>

							<div class="button-box">
								<button class="theme-btn pay-btn">Procced to pay</button>
							</div>

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
</x-shop-layout>
