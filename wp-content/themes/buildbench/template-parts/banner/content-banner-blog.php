<?php 
   $banner_image    =  '';
   $banner_title    = '';
   $banner_subtitle = '';
   $banner_style    = 'full';
   
if ( defined( 'FW' ) ) { 
   $banner_settings         = buildbench_option('blog_banner_setting'); 
   $banner_style            = buildbench_option('sub_page_banner_style');
   $header_style            = buildbench_option('header_layout_style', 'standard');
   // banner style
   $banner_class                = $banner_style=="box"?"container":"container-fluid p-0"; 
   $banner_heading_img_class    = $banner_style=="full" && $header_style!="classic" &&$header_style!="solid"?"banner-heading-full":""; 
   $banner_heading_title        = $banner_style=="full" && $header_style!="classic" && $header_style!="solid"?"mt-114":"";
  
   if($header_style=="transparent"):
     
      $banner_heading_title     = "mt-192";   
   endif;   
   
   if( $header_style == 'standard'):
      $banner_heading_title    = "mt-192";  
    endif; 
   //image
   $banner_image = ( is_array($banner_settings['banner_blog_image']) && $banner_settings['banner_blog_image']['url'] != '') ? 
                        $banner_settings['banner_blog_image']['url'] : BUILDBENCH_IMG.'/banner/banner_image1.png';

   //title 
   $banner_title = (isset($banner_settings['banner_blog_title']) && $banner_settings['banner_blog_title'] != '') ? 
                        $banner_settings['banner_blog_title'] : get_bloginfo( 'name' );
   //show
   $show = (isset($banner_settings['blog_show_banner'])) ? $banner_settings['blog_show_banner'] : 'yes'; 
    
   //breadcumb 
   $show_breadcrumb =  (isset($banner_settings['blog_show_breadcrumb'])) ? $banner_settings['blog_show_breadcrumb'] : 'yes';

 }else{
     //default
   $banner_image             = '';
   $banner_title             = get_bloginfo( 'name' );
   $show                     = 'yes';
   $show_breadcrumb          = 'no';
   $banner_heading_img_class = '';
   $banner_heading_title     = '';
   $banner_class             = '';
     
 }
 if( isset($banner_image) && $banner_image != ''){
    $banner_image = 'style="background-image:url('.esc_url( $banner_image ).');"';
}

?>

<?php if(isset($show) && $show == 'yes'): ?>

  <div id="banner-area" class="banner-area bg-overlay <?php echo esc_attr($banner_image == ''?'banner-solid':'banner-bg'); ?>">
        <div class="<?php echo esc_attr($banner_class); ?> ">
               <div class="banner-heading <?php echo esc_attr($banner_heading_img_class); ?>"  <?php echo wp_kses_post( $banner_image ); ?> >
                  <h1 class="banner-title <?php echo esc_attr($banner_heading_title); ?> ">
                  <?php 
                        if(is_archive()){
                              the_archive_title();
                        }else{
                           echo esc_html($banner_title);
                        }
                  ?>   
                  </h1>
                  <?php if(isset($show_breadcrumb) && $show_breadcrumb == 'yes'): ?>
                        <?php buildbench_get_breadcrumbs(); ?>
                  <?php endif; ?>
               </div>
           
        </div><!-- Container end -->
     </div>
  
<?php endif; ?>     