<div class="post-media post-image">
   <?php if(has_post_thumbnail()): ?>   
      <a href="<?php echo esc_url(get_the_permalink()); ?>">
        <img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt=" <?php the_title(); ?>">
      </a>
             
</div>
   <?php endif; ?>

<div class="post-body clearfix">
      <div class="entry-header">
        <?php buildbench_post_meta(); ?>
        <h2 class="entry-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <?php 
           if ( is_sticky() ) {
					echo '<sup class="meta-featured-post"> <i class="fa fa-thumb-tack"></i> ' . esc_html__( 'Sticky', 'buildbench' ) . ' </sup>';
           }
       ?>
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
  
</div>
<!-- post-body end-->