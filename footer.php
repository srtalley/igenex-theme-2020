


<section class="footer-main">
<div class="grid-container">
	<div class="grid-x grid-padding-x grid-padding-y">


		<div class="cell medium-4 small-order-1 medium-order-1">
			<?php the_field('footer_content_1','option'); ?>
		</div>
			<?php wp_nav_menu( array(
				'theme_location' => 'footer-patient',
				'container_class' => 'cell medium-4 small-order-3 medium-order-2',
				'menu_class' => 'menu-footer-patient'
			) ); ?>
		<div class="cell medium-4 small-order-2 medium-order-3">
			<?php the_field('footer_content_2','option'); ?>
		</div>
	</div>
</div>
</section>


<!-- <script src="/assets/js/masonry.js"></script> -->

<?php wp_footer(); ?>
<!-- <script
  src="https://code.jquery.com/jquery-migrate-3.0.1.min.js"
  integrity="sha256-F0O1TmEa4I8N24nY0bya59eP6svWcshqX1uzwaWC4F4="
  crossorigin="anonymous"></script> -->
<!-- <script src="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script> -->

</body>
</html>
