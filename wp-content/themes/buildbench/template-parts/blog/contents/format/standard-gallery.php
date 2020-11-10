<div class="post-media post-video">
   <?php if(has_post_thumbnail()): ?>
        <img class="img-fluid" alt="Gallery" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" >
       <?php 
        if ( is_sticky() ) {
                  echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Sticky', 'buildbench' ) . ' </sup>';
           }  
           ?>

   <?php
   if( defined( 'FW' ) && buildbench_meta_option(get_the_ID(),'featured_video')!=''): 
   ?>
         <div class="video-btn">
            <a href="<?php echo buildbench_meta_option(get_the_ID(),'featured_video'); ?>" class="play-btn popup-btn"><i class="icon icon-play"></i></a>
         </div>
         <?php endif; ?> 
               <?php 
                  $date_style = buildbench_option('blog_date_style','classic');
                  if ( $date_style == "creative" ) :
                        buildbench_post_meta_date();
                  endif;
               ?>
         <?php endif; ?>
         </div>
         <div class="post-body clearfix">
         <div class="entry-header">
           <?php buildbench_post_meta(); ?>
           <h2 class="entry-title">
               <a href="<?php esc_url(the_permalink()); ?>"><?php the_title(); ?></a>
           </h2>
         </div>
         
          
         <div class="post-content">
            <div class="entry-content">
                <?php buildbench_excerpt( 40, null ); ?>
            </div>
            <?php
            if(!is_single()):
               
         ?>
            <div class="post-footer readmore-btn-area">
               <a class="readmore" href="<?php the_permalink(); ?>"><?php echo esc_html__('Continue','buildbench'); ?> <i class="icon icon-arrow-right"></i></a>
            </div>
              
         <?php
            endif; 
        ?>
         </div>
   <!-- Post content right-->

</div>
<!-- post-body end-->