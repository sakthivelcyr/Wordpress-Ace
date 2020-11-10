<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * recent post widget
 */
class Buildbench_Recent_Post extends WP_Widget {

	function __construct() {

		$widget_opt = array(
			'classname'		 => 'buildbench-widget',
			'description'	 => esc_html__('Recent post with thumbnail','buildbench')
		);

		parent::__construct( 'xs-recent-post', esc_html__( 'Buildbench recent post', 'buildbench' ), $widget_opt );
	}

	function widget( $args, $instance ) {

		global $wp_query;

		echo buildbench_return($args[ 'before_widget' ]);

		if ( !empty( $instance[ 'title' ] ) ) {

			echo buildbench_return($args[ 'before_title' ]) . apply_filters( 'widget_title', $instance[ 'title' ] ) . buildbench_return($args[ 'after_title' ]);
		}

		if ( !empty( $instance[ 'number_of_posts' ] ) ) {
			$no_of_post = $instance[ 'number_of_posts' ];
		} else {
			$no_of_post = 3;
      }
      
      if ( !empty( $instance[ 'buildbench_post_type' ] ) ) {
			$buildbench_post_type = $instance[ 'buildbench_post_type' ];
		} else {
			$buildbench_post_type = 'recent';
		}


		$query = array(
			'post_type'		 => array( 'post' ),
			'post_status'	 => array( 'publish' ),
			'orderby'		 => 'date',
			'order'			 => 'DESC',
			'posts_per_page' => $no_of_post
		);  
      if($buildbench_post_type=="populer"){
         $query['orderby'] = "comment_count"; 
      }
 
      $loop = new WP_Query( $query );
      
		?>
		<div class="widget-posts">
			<?php
			if ( $loop->have_posts() ):
				while ( $loop->have_posts() ):
					$loop->the_post();
					?>
					<div class="widget-post media">
						<?php
                     $thumbnail	 = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), '' );
                     if( defined( 'FW' ) ):
                        $img  = fw_resize( $thumbnail[ 0 ], 70, 70,true );
                     else:
                        $img = $thumbnail[0];      
                     endif;   
           
                     echo '<a href="'.get_the_permalink().'"><img src="' . esc_url( $img ) . '" alt="' . esc_attr__('thumb','buildbench') . '"></a>';

							?>
						<div class="media-body">
							<span class="post-date"> 
								<?php echo get_the_time( 'd M, Y' ); ?>
							</span>
							<h4 class="entry-title">
								<a href="<?php echo get_the_permalink(); ?>" ><?php echo get_the_title();?></a>
							</h4>
						
						</div>
					</div>

				<?php endwhile; ?>
			<?php else: ?>
				<div class="nopost_message">
					<p><?php echo esc_html__( 'No post avainable', 'buildbench' ) ?></p>';
				</div>
			<?php endif; ?>  
			</div>
		<?php
		wp_reset_postdata();
		echo buildbench_return($args[ 'after_widget' ]);
	}

	function update( $new_instance, $old_instance ) {

		$old_instance[ 'title' ]			 = strip_tags( $new_instance[ 'title' ] );
		$old_instance[ 'number_of_posts' ] = $new_instance[ 'number_of_posts' ];
		$old_instance[ 'buildbench_post_type' ] = $new_instance[ 'buildbench_post_type' ];

		return $old_instance;
	}

	function form( $instance ) {

     
      if ( isset( $instance[ 'buildbench_post_type' ] ) ) {
         $buildbench_post_type = $instance['buildbench_post_type'];  
      }else{
         $buildbench_post_type = 'recent';  
      } 
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = esc_html__( 'Recent posts', 'buildbench' );
		}
		if ( isset( $instance[ 'number_of_posts' ] ) ) {
			$no_of_post = $instance[ 'number_of_posts' ];
		} else {
			$no_of_post = 3;
		}
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'buildbench' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
      <p>
 
        <select class='widefat' id="<?php echo $this->get_field_id('buildbench_post_type'); ?>"
                name="<?php echo $this->get_field_name('buildbench_post_type'); ?>" type="text">
          <option value='recent'<?php echo ($buildbench_post_type=='recent')?'selected':''; ?>>
            Recent post
          </option>
          <option value='populer'<?php echo ($buildbench_post_type=='populer')?'selected':''; ?>>
           Populer post
          </option> 
     
        </select>                
    
      </p>
		<p>

			<label for="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>"><?php esc_html_e( 'Number of posts:', 'buildbench' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number_of_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'number_of_posts' ) ); ?>" type="text" value="<?php echo esc_attr( $no_of_post ); ?>" />
		</p>
		<?php
	}

}
