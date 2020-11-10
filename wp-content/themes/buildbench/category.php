<?php
/**
 * the template for displaying archive pages.
 */

   get_header(); 
   get_template_part( 'template-parts/banner/content', 'banner-blog' );

   $blog_sidebar = buildbench_option('blog_sidebar',3); 

   $column = ($blog_sidebar == 1 || !is_active_sidebar('sidebar-1')) ? 'col-lg-8 mx-auto' : 'col-lg-8 col-md-12';
   // for demo 

   if( function_exists( 'buildbench_under_dev' ) && '13'== get_query_var('cat') ){
      $blog_sidebar = 3;
      $column = 'col-lg-8 col-md-12';
      
   }
   // demo


?>

<section id="main-content" class="blog main-container" role="main">
	<div class="container">
		<div class="row">
	   <?php if($blog_sidebar == 2){
				get_sidebar();
			  }  ?>
			<div class="<?php echo esc_attr($column);?>">
				<?php if ( have_posts() ) : ?>
				
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/blog/contents/content', get_post_format() ); ?>
					<?php endwhile; ?>

					<?php get_template_part( 'template-parts/blog/paginations/pagination', 'style1' ); ?>
				<?php else : ?>
					<?php get_template_part( 'template-parts/blog/contents/content', 'none' ); ?>
				<?php endif; ?>
			</div><!-- .col-md-8 -->

         <?php if($blog_sidebar == 3){
				get_sidebar();
			  }  ?>
		</div><!-- .row -->
	</div><!-- .container -->
</section><!-- #main-content -->
<?php get_footer(); ?>