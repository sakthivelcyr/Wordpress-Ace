<?php
 

   if ( defined( 'FW' ) ) { 
      $header_contact_info_show     = buildbench_option('header_contact_info_show');
      $header_contact_phone_title   = buildbench_option('header_contact_phone_title');
      $header_contact_phone         = buildbench_option('header_contact_phone');
      $header_contact_mail_title    = buildbench_option('header_contact_mail_title');
      $header_contact_mail          = buildbench_option('header_contact_mail');
      $header_contact_address_title = buildbench_option('header_contact_address_title');
      $header_contact_address       = buildbench_option('header_contact_address');
      
      $header_nav_search_section    = buildbench_option('header_nav_search_section');
      $header_quota_button          = buildbench_option('header_quota_button');
      $header_quota_text            =  $header_quota_button ['yes']['header_quota_text'];
      $header_quota_url             = $header_quota_button ['yes']['header_quota_url'];
      $header_nav_sticky            = buildbench_option('header_nav_sticky');    
   
   }else{
      $header_contact_phone_title   = '';
      $header_contact_mail_title    = '';
      $header_contact_mail          = '';
      $header_contact_address_title = '';
      $header_contact_info_show     = "no";
      $header_contact_phone         = '';
      $header_contact_address       = '';
      $header_quota_button          = 'yes';
      $header_nav_search_section    = 'yes';
      $header_quota_url             = "#";
      $header_quota_text            =  esc_html__('Get a quote','buildbench');
      $header_nav_sticky            = 'no';
   }
   
  
?>
 <?php if(defined( 'FW' )): ?>
<div class="ts-top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                
                <div class="top-bar">
                    <ul class="header-nav-right-info">
                        <li>
                            <i class="fa fa-phone-square"></i>
                            <?php echo esc_html($header_contact_phone); ?>
                        </li>
                        <li>
                            <i class="fa fa-globe"></i>
                            <?php echo esc_html($header_contact_address); ?>
                        </li>
                    </ul>
                </div>
            </div> 
            <div class="col-md-5">
                <div class="top-bar text-right">
                    <ul class="unstyled">
                    
                        <?php 
                        $social_links = buildbench_option('general_social_links',[]);                         
                        foreach($social_links as $sl):
                           $class = 'ts-' . str_replace('fa fa-', '', $sl['icon_class']);
                           $title = $sl["title"];
                    ?>
                    <li class="<?php echo esc_attr($class); ?>">
                        <a title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($sl['url']); ?>" target="_blank">
                        <span class="social-icon">  <i class="<?php echo esc_attr($sl['icon_class']); ?>"></i> </span>
                        </a>
                    </li>
                    <?php endforeach; ?>
                    </ul>
                </div><!-- Top bar end -->
            </div>
        </div>
    </div>
</div>
<!-- Top bar end -->
<?php endif; ?>

<header id="header" class="header-solid">
     <!-- navbar container start -->
     <div class="navbar-container <?php echo esc_attr($header_nav_sticky=='yes'?'navbar-sticky':''); ?> ">
         <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="logo navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <img  class="img-fluid" src="<?php 
                        echo esc_url(
                        buildbench_src(
                            'general_dark_logo',
                            BUILDBENCH_IMG . '/logo-dark.png'
                        )
                        );
                    ?>" alt="<?php bloginfo('name'); ?>">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-nav"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                        <?php get_template_part( 'template-parts/navigations/nav', 'primary' ); ?>
                    <ul class="nav-right form-inline">
                        <?php if($header_nav_search_section=='yes'): ?>
                            <li class="nav-search-btn">
                                <a href="#modal-popup-2" class="xs-modal-popup"><i class="icon icon-search1"></i></a>
                                <!-- xs modal -->
                            </li>
                        <?php endif; ?>
                        <?php if(defined( 'FW' )): ?>
                           <?php if($header_quota_button['style'] =='yes' && $header_quota_text != ''): ?>
                              <li class="nav-button">
                                 <a href="<?php echo esc_url($header_quota_url); ?>" class="quote-btn">  <?php echo esc_html($header_quota_text); ?>
                                 </a>
                              </li>
                           <?php endif; ?>
                        <?php endif; ?>
                    </ul><!-- Right menu end -->
            </nav>
         </div>
      </div>
        <!-- navbar contianer end -->
 </header>
                         