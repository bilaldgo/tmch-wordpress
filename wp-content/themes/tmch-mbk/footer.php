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
					<span class="h2">Get <span class="yellow-outline">Started</span> From Here</span>
					<p>Let us know your details to get started with us</p>
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
					<?php dynamic_sidebar( 'footer_area' ); ?>
				</div>
				<div>
					<div class="sub-grid">
						<div>
							<?php dynamic_sidebar( 'footer_list_one' ); ?>
						</div>
						<div>
							<?php dynamic_sidebar( 'footer_list_two' ); ?>
						</div>
						<div>
							<?php dynamic_sidebar( 'footer_list_three' ); ?>
						</div>
					</div>
				</div>
				<div class="copyrights">
					<p>&copy; Take My Class Help <?php echo date('Y'); ?>, All Right Reserved.</p>
				</div>
				<div class="copyrights-terms">
					<?php dynamic_sidebar( 'footer_terms_list' ); ?>
				</div>
			</div>
		</div>
	</footer>
</div><!-- #page -->

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

<?php wp_footer(); ?>
<!-- <?php //echo "Page name: " . get_page_template();?> -->
</body>
</html>
