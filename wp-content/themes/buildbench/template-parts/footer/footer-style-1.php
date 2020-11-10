  <?php 
      $back_to_top = buildbench_option('back_to_top'); 
     
  ?>
  <?php if(defined( 'FW' )): ?>
      <?php if( is_active_sidebar('footer-left') || is_active_sidebar('footer-center') ): ?> 
         <footer id="ts-footer" class="ts-footer" >
               <div class="container">
                  <div class="row">
                     <div class="col-md-6 col-lg-4">
                        <?php  dynamic_sidebar( 'footer-left' ); ?>
                     </div>
                     <!-- End Col -->
                        <div class="col-md-6 col-lg-4">
                        <?php  dynamic_sidebar( 'footer-center' ); ?>
                        </div>
                     <div class="col-lg-4 col-md-12">
                     
                           <?php 
                           if ( shortcode_exists( 'mc4wp_form' ) ) :
                                 $mailchimp = buildbench_option("footer_style");
                                 if(count($mailchimp)):
                                    $mailchimp = $mailchimp["style-1"]["footer_mailchimp"];
                                    echo do_shortcode($mailchimp); 
                                 endif;  
                           
                        
                           endif; 
                           ?>
                  
                     </div>
                  </div>
                  <!-- End Widget Row -->
               </div>
               <!-- End Contact Container -->
         </footer>
     <?php endif; ?>       
  <?php endif;  ?>
      <div class="copyright">
            <div class="container">
                  <div class="row">
                     <div class="col-md-6 align-self-center">
                        <span>
                           <?php 
                              $copyright_text = buildbench_option('footer_copyright', 'Copyright © 2019 Build Bench. All Right Reserved.'); 
                              echo buildbench_kses($copyright_text);  
                           ?>
                        </span>
                     </div>
                        <!-- End Col -->
                     <div class="col-md-6">
                     <?php if ( defined( 'FW' ) ) : ?>   
                        <div class="footer-social text-right">
                           <ul class="unstyled">
                           <?php 
                              $social_links = buildbench_option('footer_social_links',[]);                         
                              foreach($social_links as $sl):
                              $class = 'ts-' . str_replace('fa fa-', '', $sl['icon_class']);
                           ?>
                           <li class="<?php echo esc_attr($class); ?>">
                              <a href="<?php echo esc_url($sl['url']); ?>" target="_blank">
                                 <i class="<?php echo esc_attr($sl['icon_class']); ?>"></i>
                              </a>
                           </li>
                           <?php endforeach; ?>
                           </ul> <!-- Ul end -->
                        </div>
                    <?php endif; ?>
                        <!-- End Social link -->
                     </div>
                     <!-- End col -->
               </div>
                  <!-- End Row -->
         </div>
            <?php if($back_to_top=="yes"): ?>
               <div class="BackTo">
                  <a href="#" class="icon icon-arrow-up" aria-hidden="true"></a>
               </div>
            <?php endif; ?>
          <!-- End Copyright Container -->
      </div>