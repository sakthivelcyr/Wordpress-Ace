<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * register widget area
 */

function buildbench_widget_init()
{
    if (function_exists('register_sidebar')) {
        register_sidebar(
            array(
                'name' => esc_html__('Blog widget area', 'buildbench'),
                'id' => 'sidebar-1',
                'description' => esc_html__('Appears on posts.', 'buildbench'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget' => '</div>',
                'before_title' => '<h3 class="widget-title">',
                'after_title' => '</h3>',
            )
        );
    }
}

add_action('widgets_init', 'buildbench_widget_init');


function footer_left_widgets_init(){
    if ( function_exists('register_sidebar') )
    register_sidebar(array(
      'name' => 'Footer Left',
      'id' => 'footer-left',
      'before_widget' => '<div class="footer-left-widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3 class="widget-title">',
      'after_title' => '</h3>',
    )
  );
}
add_action( 'widgets_init', 'footer_left_widgets_init' );

function footer_center_widgets_init(){
   if ( function_exists('register_sidebar') )
   register_sidebar(array(
     'name' => 'Footer Center',
     'id' => 'footer-center',
     'before_widget' => '<div class="footer-widget footer-center-widget">',
     'after_widget' => '</div>',
     'before_title' => '<h3 class="widget-title">',
     'after_title' => '</h3>',
   )
 );
}
add_action( 'widgets_init', 'footer_center_widgets_init' );

function footer_right_widgets_init(){
  if ( function_exists('register_sidebar') )
      register_sidebar(array(
        'name' => 'Footer right',
        'id' => 'footer-right',
        'before_widget' => '<div class="footer-widget footer-right-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
      )
    );
}
add_action( 'widgets_init', 'footer_right_widgets_init' );


function woo_sidebar_widgets_init(){
  if ( function_exists('register_sidebar') )
        register_sidebar(array(
            'name'			 => esc_html__( 'WooCommerce Sidebar', 'buildbench' ),
            'id'			 => 'sidebar-woo',
            'description'	 => esc_html__( 'Appears on posts and pages.', 'buildbench' ),
            'before_widget'	 => '<div id="%1$s" class="widgets %2$s">',
            'after_widget'	 => '</div> <!-- end widget -->',
            'before_title'	 => '<h4 class="widget-title">',
            'after_title'	 => '</h4>',
        )
    );
}
add_action( 'widgets_init', 'woo_sidebar_widgets_init' );