<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package tmch-mbk
 */

?>
	<footer id="colophon" class="site-footer">
		<div class="footer-top">
			<div class="container">
				<div class="mx-auto text-center">
					<span class="h2">Lorem <span class="yellow-outline">Ipsum</span> Elite</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				</div>
				<div class="clearfix" style="margin-top: 20px;"></div>
				<div class="newsletter-form-container">
					<form class="newsletter-form" enctype="multipart/form-data">
					<div class="input-group">
						<input class="form-control icon-person" type="text" placeholder=" " id="fname" name="fname">
						<label class="form-label" for="fname">Full name:</label>
					</div>
					<div class="input-group">
						<input class="form-control icon-tel" type="tel" placeholder=" " id="phNumber" name="phNumber">
						<label class="form-label" for="phNumber">Phone Number:</label>
					</div>
					<div class="input-group">
						<input class="form-control icon-mail" type="email" placeholder=" " id="email" name="email">
						<label class="form-label" for="email">Email Address:</label>
					</div>
					<button class="btn btn-solid-outline" type="submit">
						Submit Now <span class="arrow-icon"></span>
					</button>
					</form>
				</div>
				<div class="clearfix" style="margin-top: 20px;"></div>
			</div>
		</div>
		<div class="container">
			<div class="footer-bottom-bg"></div>
			<div class="footer-bottom">
				<div>
					<span class="h3">Logo Here</span>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero et velit interdum, ac aliquet odio mattis.</p>
				</div>
				<div>
					<div class="sub-grid">
						<div>
							<span class="h5">Company</span>
							<ul class="footer-list">
								<li>
									<a href="#">About Us</a>
								</li>
								<li>
									<a href="#">FAQs</a>
								</li>
								<li>
									<a href="#">Blog</a>
								</li>
							</ul>
						</div>
						<div>
							<span class="h5">Resources</span>
							<ul class="footer-list">
								<li>
									<a href="#">Privacy Policy</a>
								</li>
								<li>
									<a href="#">Disclaimer</a>
								</li>
								<li>
									<a href="#">Cookie Policy</a>
								</li>
							</ul>
						</div>
						<div>
							<span class="h5">Product</span>
							<ul class="footer-list">
								<li>
									<a href="#">Order</a>
								</li>
								<li>
									<a href="#">Money Back Guaranteed</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="copyrights">
					<p>&copy; Take My Class Help <?php echo date('Y'); ?>, All Right Reserved.</p>
				</div>
				<div class="copyrights-terms">
					<ul class="footer-list list-inline text-end">
						<li>
							<a href="#">Terms & Conditions</a>
						</li>
						<li>
							<a href="#">Cookies Policy</a>
						</li>
						<li>
							<a href="#">Privacy Policy</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
</body>
</html>
