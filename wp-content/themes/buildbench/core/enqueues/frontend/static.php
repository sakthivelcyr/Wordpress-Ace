<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue all theme scripts and styles
 */


// stylesheets
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {
	// 3rd party css
	wp_enqueue_style( 'buildbench-fonts', buildbench_google_fonts_url(['Montserrat:300,300i,400,400i,500,600,700,800,900', 'Open Sans:400,700']), null, BUILDBENCH_VERSION );
	wp_enqueue_style( 'bootstrap', BUILDBENCH_CSS . '/bootstrap.min.css', null, BUILDBENCH_VERSION );
	wp_enqueue_style( 'font-awesome', BUILDBENCH_CSS . '/font-awesome.css', null, BUILDBENCH_VERSION );
	wp_enqueue_style( 'animate', BUILDBENCH_CSS . '/animate.css', null, BUILDBENCH_VERSION );
	wp_enqueue_style( 'iconfont', BUILDBENCH_CSS . '/iconfont.css', null, BUILDBENCH_VERSION );
	wp_enqueue_style( 'isotope', BUILDBENCH_CSS . '/isotope.css', null, BUILDBENCH_VERSION );
	wp_enqueue_style( 'magnific-popup', BUILDBENCH_CSS . '/magnific-popup.css', null, BUILDBENCH_VERSION );
	wp_enqueue_style( 'owl-carousel', BUILDBENCH_CSS . '/owl.carousel.min.css', null, BUILDBENCH_VERSION );
	wp_enqueue_style( 'owl-theme-default', BUILDBENCH_CSS . '/owl.theme.default.min.css', null, BUILDBENCH_VERSION );
  	// woocommerce
	wp_enqueue_style( 'buildbench-woocommerce', BUILDBENCH_CSS . '/woocommerce.css', null, BUILDBENCH_VERSION );
    // theme css
	wp_enqueue_style( 'buildbench-blog', BUILDBENCH_CSS . '/blog.css', null, BUILDBENCH_VERSION );
	wp_enqueue_style( 'buildbench-gutenberg-custom', BUILDBENCH_CSS . '/gutenberg-custom.css', null, BUILDBENCH_VERSION );
 	wp_enqueue_style( 'buildbench-master', BUILDBENCH_CSS . '/master.css', null, BUILDBENCH_VERSION );
}

// javascripts
// ----------------------------------------------------------------------------------------
if ( !is_admin() ) {

	// 3rd party scripts
	wp_enqueue_script( 'bootstrap', BUILDBENCH_JS . '/bootstrap.min.js', array( 'jquery' ), BUILDBENCH_VERSION, true );
	wp_enqueue_script( 'popper', BUILDBENCH_JS . '/popper.min.js', array( 'jquery' ), BUILDBENCH_VERSION, true );
	wp_enqueue_script( 'jquery-magnific-popup', BUILDBENCH_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ), BUILDBENCH_VERSION, true );
	wp_enqueue_script( 'jquery-countdown', BUILDBENCH_JS . '/jquery.countdown.min.js', array( 'jquery' ), BUILDBENCH_VERSION, true );
	wp_enqueue_script( 'jquery-appear', BUILDBENCH_JS . '/jquery.appear.min.js', array( 'jquery' ), BUILDBENCH_VERSION, true );
	wp_enqueue_script( 'jquery-mixtub', BUILDBENCH_JS . '/jquery-mixtub.js', array( 'jquery' ), BUILDBENCH_VERSION, true );
	wp_enqueue_script( 'owl-carousel', BUILDBENCH_JS . '/owl.carousel.min.js', array( 'jquery' ), BUILDBENCH_VERSION, true );

	// theme scripts
	wp_enqueue_script( 'buildbench-script', BUILDBENCH_JS . '/script.js', array( 'jquery' ), BUILDBENCH_VERSION, true );
	
	// Load WordPress Comment js
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}