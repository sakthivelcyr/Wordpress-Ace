<?php
/**
 * Blog Header
 *
 */
 
$buildbench_banner_bg	 = $buildbench_banner_title = $buildbench_banner_subtitle = '';
$buildbench_header_style    = 'standard';
 
if ( defined( 'FW' ) ) {
    
    $buildbench_banner_settings = buildbench_option('shop_banner_settings');
    //Page settings
    $buildbench_header_style    = buildbench_option('header_layout_style', 'standard');

    $buildbench_show = (isset($buildbench_banner_settings['show'])) ? $buildbench_banner_settings['show'] : 'yes'; 
    $buildbench_show_breadcrumb = (isset($buildbench_banner_settings['show_breadcrumb'])) ? $buildbench_banner_settings['show_breadcrumb'] : 'yes';

    $buildbench_banner_title = (isset($buildbench_banner_settings['title']) && $buildbench_banner_settings['title'] != '') ? 
                        $buildbench_banner_settings['title'] : esc_html__('Products','buildbench');
    $buildbench_single_title = (isset($buildbench_banner_settings['single_title']) && $buildbench_banner_settings['single_title'] != '') ? 
                        $buildbench_banner_settings['single_title'] : esc_html__('Products','buildbench');

    $buildbench_banner_image = ( is_array($buildbench_banner_settings['image']) && $buildbench_banner_settings['image']['url'] != '') ? 
                        $buildbench_banner_settings['image']['url'] : BUILDBENCH_IMG.'/banner/about-banner.jpg';

}else{
    $buildbench_banner_image =BUILDBENCH_IMG.'/banner/banner_image.png';
    $buildbench_banner_title = esc_html__('Shop','buildbench');
    $buildbench_single_title = esc_html__('Products','buildbench');
    $buildbench_show = 'yes';
    $buildbench_show_breadcrumb = 'yes';
}
if( isset($buildbench_banner_image) && $buildbench_banner_image != ''){
    $buildbench_banner_bg = 'style="background-image:url('.esc_url( $buildbench_banner_image ).');"';
}

if(isset($buildbench_show) && $buildbench_show == 'yes'): ?>

<?php

   $buildbench_banner_heading_class = '';

   if( $buildbench_header_style=="transparent" ){
      $buildbench_banner_heading_class     = "mt-80"; 
   } elseif( $buildbench_header_style== 'standard' ){
      $buildbench_banner_heading_class     = "mt-80";   
   }
?>

<div id="page-banner-area" class="page-banner-area banner-area" <?php echo wp_kses_post( $buildbench_banner_bg ); ?>>
   <!-- Subpage title start -->
   <div class="page-banner-title">
   
      <div class="text-center">
      
         <p class="banner-title <?php echo esc_attr($buildbench_banner_heading_class); ?>">
            <?php 
                  if(is_shop()){
                        $shop_title = explode(':',get_the_archive_title() );
                        if(isset($shop_title[1])){
                           echo esc_html($shop_title[1]);
                        }else{
                           echo esc_html($buildbench_banner_title);
                        }
                  
                  }elseif(is_product()){
                        echo buildbench_kses( $buildbench_single_title );
                  }else{
                        echo buildbench_kses( $buildbench_banner_title );
                  }
            ?>
         </p> 
      
      
         <?php if($buildbench_show_breadcrumb == 'yes'): ?>
               <?php woocommerce_breadcrumb(); ?>
         <?php endif; ?>
      </div>
   </div><!-- Subpage title end -->
</div><!-- Page Banner end -->

<?php endif; ?>