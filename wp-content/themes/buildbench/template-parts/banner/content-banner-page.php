<?php 
$banner_image    = '';
$banner_title    = '';
$banner_style    = 'full';

if ( defined( 'FW' ) ) { 


    $banner_settings          = buildbench_option('page_banner_setting'); 
    $banner_image             = buildbench_meta_option( get_the_ID(), 'header_image' );
    $header_style             = buildbench_option('header_layout_style', 'standard');
    $banner_style             = buildbench_option('sub_page_banner_style');
  
    // banner style
    $banner_class                = $banner_style=="box"?"container box-banner":"container-fluid p-0"; 
    $banner_heading_img_class    = $banner_style=="full" && $header_style!="classic" &&$header_style!="solid" && $header_style!="box"?"banner-heading-full":""; 
    $banner_heading_title        = $banner_style=="full" && $header_style!="classic" && $header_style!="solid" && $header_style!="box"?"mt-114":"";
  
    if($header_style=="transparent"):
      
      $banner_heading_title     = "mt-192";   
   endif; 
   if( $header_style == 'standard'):
     $banner_heading_title    = "mt-192";  
   endif; 
    //title
    if(buildbench_meta_option( get_the_ID(), 'header_title' ) != ''){
        $banner_title = buildbench_meta_option( get_the_ID(), 'header_title' );
        
     }elseif($banner_settings['banner_page_title'] != ''){
        $banner_title = $banner_settings['banner_page_title'];
        
    }else{
      $banner_title = get_the_title(); 
    }
   
    //image
    if(is_array($banner_image) && $banner_image['url'] != '' ){
        $banner_image = $banner_image['url'];
    }elseif( is_array($banner_settings['banner_page_image']) && $banner_settings['banner_page_image']['url'] != ''){
          $banner_image = $banner_settings['banner_page_image']['url'];
    }else{
      
         $banner_image = BUILDBENCH_IMG.'/banner/banner_image1.png';
    }
     
   $show = (isset($banner_settings['page_show_banner'])) ? $banner_settings['page_show_banner'] : 'yes'; 
   // breadcumb
   $show_breadcrumb =  (isset($banner_settings['page_show_breadcrumb'])) ? $banner_settings['page_show_breadcrumb'] : 'yes';

 
 }else{
     //default
     $banner_image             = '';
     $banner_title             = get_the_title();
     $show                     = 'yes';
     $show_breadcrumb          = 'no';
     $banner_heading_img_class = '';
     $banner_heading_title     ='';
     $banner_class             = '';
 }
 if( $banner_image != ''){
    $banner_image = 'style="background-image:url('.esc_url( $banner_image ).');"';
}
?>

<?php if(isset($show) && $show == 'yes'): ?>

<div id="banner-area" class="banner-area bg-overlay <?php echo esc_attr($banner_image == ''?'banner-solid':'banner-bg'); ?>">
      <div class="<?php echo esc_attr($banner_class); ?> ">
               <div class="banner-heading <?php echo esc_attr($banner_heading_img_class); ?>"  <?php       echo wp_kses_post( $banner_image ); ?> >
                  <h1 class="banner-title <?php echo esc_attr($banner_heading_title); ?>">
                        <?php echo esc_html($banner_title); ?> 
                  </h1>
                  <?php if(isset($show_breadcrumb) && $show_breadcrumb == 'yes'): ?>
                      <?php buildbench_get_breadcrumbs(); ?>
                   <?php endif; ?>
               </div>
      </div><!-- Container end -->
   </div>
<?php endif; ?>