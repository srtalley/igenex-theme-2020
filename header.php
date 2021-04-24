<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>


<?php
	$url = 'https://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>


<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
	<head>
		<meta name="google-site-verification" content="7gzzi9wfRy0U1vpvDEJHPDHkZSEAH8gDPdOHZiVwmf4" />
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="shortcut icon" href="<?php echo get_home_url(); ?>/wp-content/uploads/favicon/favicon.ico" type="image/x-icon">
		<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-WBZ2LQZ');</script>
		<!-- End Google Tag Manager -->
		<?php wp_head(); ?>

		<meta property="og:locale" content="en_US"/>
		<!-- <link href="//cdn.rawgit.com/noelboss/featherlight/1.7.12/release/featherlight.min.css" type="text/css" rel="stylesheet" /> -->


	</head>
	<!-- <body <?php //body_class(array($varx, 'mainsite')); ?>> -->
	<body <?php body_class(array('patient', 'mainsite')); ?>>


		<!-- Google Tag Manager (noscript) -->
 <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBZ2LQZ" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<?php if ( get_theme_mod( 'wpt_mobile_menu_layout' ) === 'offcanvas' ) : ?>
		<?php get_template_part( 'template-parts/mobile-off-canvas' ); ?>
	<?php endif; ?>


	<!-- desktop nav -->

	<div class="igenex_nav desktop <?php the_field('theme'); ?>">
	<?php if( have_rows('top_nav','option') ): ?>
		<div class="grid-container top-nav 'patient'">
			<div class="grid-x align-middle">
				<?php while( have_rows('top_nav','option') ): the_row(); ?>
					<div class="cell shrink main-logo">
						<a href="<?php echo site_url(''); ?>"><img src="<?php the_sub_field('top_nav_logo') ?>" alt="IGeneX Logo"></a>
					</div>
					<div class="cell auto patient-nav-main">
						<?php wp_nav_menu( array(
							'theme_location' => 'patient-menu',
							'container_class' => 'grid-container',
							'menu_class' => 'menu-patient grid-x'
						) ); ?>
						</div>

					<div class="cell shrink patient">
						<?php
						$cart_link = get_sub_field('cart_url');
						if( $cart_link ): ?>
							<div class="cell shrink"><a class="cart-link" style="position: relative;" href="<?php echo $cart_link['url']; ?>" target="<?php echo $cart_link['target']; ?>">

								<svg xmlns="http://www.w3.org/2000/svg" class="cart-icon" width="38" height="60" viewBox="0 0 29 23">
								<title>Shopping Cart</title>
								  <path class="cart-fill" fill="" fill-rule="evenodd" d="M1089.92402,54.1656758 L1085.60437,54.1656758 L1086.49977,50.9537127 L1091.0253,50.9537127 L1089.92402,54.1656758 Z M1088.24883,59.0491992 L1084.24179,59.0491992 L1085.13787,55.8372361 L1089.35012,55.8372361 L1088.24883,59.0491992 Z M1077.95077,54.1656758 L1076.85496,50.9537127 L1084.79654,50.9537127 L1083.89977,54.1656758 L1077.95077,54.1656758 Z M1082.53787,59.0491992 L1079.61844,59.0491992 L1078.52125,55.8372361 L1083.43395,55.8372361 L1082.53787,59.0491992 Z M1074.41571,59.0491992 L1073.14205,55.8372361 L1076.78724,55.8372361 L1077.88305,59.0491992 L1074.41571,59.0491992 Z M1071.23019,51.0151056 L1071.20625,50.9537127 L1075.11958,50.9537127 L1076.21607,54.1656758 L1072.47922,54.1656758 L1071.23019,51.0151056 Z M1076.51089,64.1775965 C1077.07522,64.1775965 1077.53488,64.6457171 1077.53488,65.2212752 C1077.53488,65.7968333 1077.07522,66.2656515 1076.51089,66.2656515 C1075.94588,66.2656515 1075.48758,65.7968333 1075.48758,65.2212752 C1075.48758,64.6457171 1075.94588,64.1775965 1076.51089,64.1775965 L1076.51089,64.1775965 Z M1086.56543,64.1775965 C1087.12976,64.1775965 1087.58874,64.6457171 1087.58874,65.2212752 C1087.58874,65.7968333 1087.12976,66.2656515 1086.56543,66.2656515 C1086.00111,66.2656515 1085.54144,65.7968333 1085.54144,65.2212752 C1085.54144,64.6457171 1086.00111,64.1775965 1086.56543,64.1775965 L1086.56543,64.1775965 Z M1092.84824,49.6344637 C1092.69502,49.4140075 1092.44672,49.28285 1092.18063,49.28285 L1070.54684,49.28285 L1069.06387,45.5232347 C1068.93869,45.2072009 1068.6384,45 1068.30391,45 L1064.81947,45 C1064.36732,45 1064,45.3739384 1064,45.8357802 C1064,46.2969243 1064.36732,46.6708627 1064.81947,46.6708627 L1067.74985,46.6708627 L1069.22735,50.4165251 C1069.2294,50.4214086 1069.2294,50.4269898 1069.23145,50.4318733 L1069.62203,51.4169498 L1071.16384,55.3258614 C1071.16384,55.3265591 1071.16452,55.3265591 1071.16452,55.3272567 L1074.38835,63.4987867 C1074.01761,63.9738838 1073.7864,64.566883 1073.7864,65.2212752 C1073.7864,66.7560968 1075.00603,68 1076.51089,68 C1078.01576,68 1079.23538,66.7560968 1079.23538,65.2212752 C1079.23538,64.8215239 1079.14919,64.4433997 1079.00007,64.1001577 L1084.07557,64.1001577 C1083.92645,64.4433997 1083.84026,64.8215239 1083.84026,65.2212752 C1083.84026,66.7560968 1085.06057,68 1086.56543,68 C1088.06961,68 1089.28924,66.7560968 1089.28924,65.2212752 C1089.28924,63.6864535 1088.06961,62.4425504 1086.56543,62.4425504 C1086.53192,62.4425504 1086.50114,62.4516198 1086.4683,62.4523174 C1086.43,62.4467362 1086.39511,62.4292951 1086.35407,62.4292951 L1075.73315,62.4292951 L1075.05938,60.7200619 L1079.03427,60.7200619 C1079.03496,60.7200619 1079.03564,60.7207595 1079.03633,60.7207595 C1079.03701,60.7207595 1079.03769,60.7200619 1079.03838,60.7200619 L1083.15487,60.7200619 C1083.15555,60.7200619 1083.15623,60.7207595 1083.15692,60.7207595 C1083.1576,60.7207595 1083.15829,60.7200619 1083.15897,60.7200619 L1088.82957,60.7200619 C1089.17774,60.7200619 1089.48829,60.4954198 1089.60321,60.1605496 L1092.95427,50.3942004 C1093.04182,50.1388619 1093.00215,49.8556176 1092.84824,49.6344637 L1092.84824,49.6344637 Z" transform="translate(-1064 -45)"/>
								</svg>
								<?php
									$cart_qty = WC()->cart->get_cart_contents_count();

									if($cart_qty) {
								 ?>

								 <svg class="qty-cart" width="20" height="20" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="position: absolute;top:8px;right:3px;">
								   <title>Cart Quantity</title>
								   <g fill="none" fill-rule="evenodd">
								     <circle cx="6" cy="6" r="6" fill="#259ecc"/>
								     <text text-anchor="middle" font-family="Helvetica" font-size="7" fill="#FFF" transform="translate(0 -1)">
								       <tspan x="6" y="9.5"><?php echo $cart_qty; ?></tspan>
								     </text>
								   </g>
								 </svg>
							<?php } ?>
							</a></div>
						<?php endif; ?>
					</div>

				<?php endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
</div>
<!-- end desktop nav -->


<!-- moble navigation -->
<div class="igenex_nav mobile <?php the_field('theme'); ?>">
	<div class="top-nav">
		<?php if( have_rows('top_nav','option') ): ?>
		<div class="grid-container">
			<div class="grid-x align-justify align-middle text-center mobile-top-nav">
				<?php while( have_rows('top_nav','option') ): the_row(); ?>
				<div class="cell small-2">
					<img src="<?php echo esc_url( home_url( '/' ) ); ?>assets/img/static/menu-logo.png" class="mobile-nav-trigger" alt="IGeneX Logo">
				</div>
				<div class="cell auto text-center logo">
					<a href="<?php echo site_url(''); ?>"><img src="<?php the_sub_field('top_nav_logo') ?>" alt="IGeneX Logo"></a>
				</div>
				<div class="cell small-2 ">
					<?php
					$cart_link = get_sub_field('cart_url');
					if( $cart_link ): ?>
						<div class="cell small-2 <?php the_field('theme'); ?>"><a style="position: relative;" href="<?php echo $cart_link['url']; ?>" target="<?php echo $cart_link['target']; ?>"><img src="<?php echo esc_url( home_url( '/' ) ); ?>assets/img/static/cart-logo.png" alt="Shopping Cart">
						<?php
						if($cart_qty) {
					 ?>
					 <svg class="qty-cart" width="20" height="20" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg" style="position: absolute;top:-10px;right:-16px;">
					 <title>Cart Quantity</title>
						 <g fill="none" fill-rule="evenodd">
							 <circle cx="6" cy="6" r="6" fill="#9B9B9B"/>
							 <text text-anchor="middle" font-family="Helvetica" font-size="7" fill="#FFF" transform="translate(0 -1)">
								 <tspan x="6" y="9.5"><?php echo $cart_qty; ?></tspan>
							 </text>
						 </g>
					 </svg>

				<?php } ?>
						</a></div>
					<?php endif; ?>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="drawer 'patient'">
				<div class="grid-y grid-padding-y" style="height:100vh; overflow:scroll;">
					<div class="cell header">
						<img src="<?php echo esc_url( home_url( '/' ) ); ?>assets/img/static/close-icon.png" class="close-icon">
					</div>
					<div class="cell">
						<?php wp_nav_menu( array(
							'theme_location' => 'patient-menu',
							'menu_id' => 'patient-container-mobile',
							'menu_class' => 'menu-patient-mobile',
						) ); ?>
						</div>
				</div>
	</div>

</div>
<!-- end mobile nav -->
