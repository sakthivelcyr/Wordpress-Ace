<?php
$class = '';
$title = '';
if (defined('FW')) {
   $header_contact_info_show = buildbench_option('header_contact_info_show');
   $header_contact_phone     = buildbench_option('header_contact_phone');
   $header_contact_address   = buildbench_option('header_contact_address');

   $header_nav_search_section    = buildbench_option('header_nav_search_section');
   $header_quota_button          = buildbench_option('header_quota_button');
   $header_quota_text            =  $header_quota_button['yes']['header_quota_text'];
   $header_quota_url             = $header_quota_button['yes']['header_quota_url'];
   //Page settings
   $header_nav_sticky            = buildbench_option('header_nav_sticky');

   //   header contact info link
   $header_contact_link            = buildbench_option('header_contact_link');
   $header_mail_link               = buildbench_option('header_mail_link');
   $header_address_link            = buildbench_option('header_address_link');
} else {
   $header_contact_info_show    = "no";
   $header_contact_phone        = '';
   $header_contact_address      = '';
   $header_quota_button          = 'yes';
   $header_nav_search_section    = 'yes';
   $header_quota_url             = "#";
   $header_quota_text            = esc_html__('Get a quote', 'buildbench');
   $header_nav_sticky            = 'no';
   //   header contact info link
   $header_contact_link            = '';
   $header_mail_link               = '';
   $header_address_link            = '';
}


?>

<header id="header" class="header-transparent header-classic">
   <div class="nav-standard ts-nav-classic <?php echo esc_attr($header_nav_sticky == 'yes' ? 'navbar-sticky' : ''); ?> ">
      <div class="container">
         <div class="row ">
            <div class="col-lg-2 pr-0">
               <!--  <a class="nav-brand" href="#"></a>-->
               <div class=" main-logo">
                  <a class="logo" href="<?php echo esc_url(home_url('/')); ?>">
                     <img class="img-fluid" src="<?php
                                                   echo esc_url(
                                                      buildbench_src(
                                                         'general_dark_logo',
                                                         BUILDBENCH_IMG . '/logo.png'
                                                      )
                                                   );
                                                   ?>" alt="<?php bloginfo('name'); ?>">
                  </a>
               </div>
            </div><!-- Col end -->
            <div class="col-lg-10 pl-0 text-right">
               <div class="top-bar">
                  <ul class="header-nav-right-info">
                     <li>
                        <?php if (isset($header_contact_link) && $header_contact_link  != '') { ?>
                           <a href="<?php echo esc_url($header_contact_link); ?>">
                              <i class="fa fa-phone-square"></i>
                              <?php echo esc_html($header_contact_phone); ?>
                           </a>
                        <?php } else { ?>
                           <i class="fa fa-phone-square"></i>
                           <?php echo esc_html($header_contact_phone); ?>
                        <?php } ?>
                     </li>
                     <li>
                        <?php if (isset($header_address_link) && $header_address_link  != '') { ?>
                           <a href="<?php echo esc_url($header_address_link); ?>" target="_blank">
                              <i class="fa fa-globe"></i>
                              <?php echo esc_html($header_contact_address); ?>
                           </a>
                        <?php } else { ?>
                           <i class="fa fa-globe"></i>
                           <?php echo esc_html($header_contact_address); ?>
                        <?php } ?>

                     </li>
                  </ul>
                  <ul class="unstyled">
                     <?php

                     $social_links = buildbench_option('general_social_links', []);
                     if (count($social_links)) :

                        foreach ($social_links as $sl) :

                           if (isset($sl['icon_class']) && isset($sl['ttile'])) :
                              $class = 'ts-' . str_replace('fa fa-', '', $sl['icon_class']);
                              $title = $sl["title"];
                           endif;

                     ?>
                           <li class="<?php echo esc_attr($class); ?>">
                              <a title="<?php echo esc_attr($title); ?>" href="<?php echo esc_url($sl['url']); ?>" target="_blank">
                                 <span class="social-icon"> <i class="<?php echo esc_attr($sl['icon_class']); ?>"></i> </span>
                              </a>
                           </li>
                        <?php endforeach; ?>
                     <?php endif; ?>
                  </ul>
               </div><!-- Top bar end -->

               <!-- navbar container start -->
               <div class="navbar-container">
                  <nav class="navbar navbar-light xs-navbar navbar-expand-lg">

                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#primary-nav" aria-controls="primary-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                     </button>
                     <?php get_template_part('template-parts/navigations/nav', 'primary'); ?>

                     <ul class="nav-right ml-auto form-inline">
                        <?php if ($header_nav_search_section == 'yes') : ?>
                           <li class="nav-search-btn">
                              <a href="#modal-popup-2" class="xs-modal-popup"><i class="icon icon-search1"></i></a>
                              <!-- xs modal -->
                           </li>
                        <?php endif; ?>
                        <?php if (defined('FW')) : ?>
                           <?php if ($header_quota_button['style'] == 'yes' && $header_quota_text != '') : ?>
                              <li class="nav-button">
                                 <a href="<?php echo esc_url($header_quota_url); ?>" class="quote-btn"> <?php echo esc_html($header_quota_text); ?>
                                 </a>
                              </li>
                           <?php endif; ?>
                        <?php endif; ?>
                     </ul><!-- Right menu end -->

                  </nav>


               </div>
            </div>
         </div><!-- .row end -->
      </div><!-- .container end -->
   </div>
</header>