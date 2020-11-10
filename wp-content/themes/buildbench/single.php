<?php
/**
 * the template for displaying all posts.
 */
   get_header(); 

   get_template_part( 'template-parts/banner/content', 'banner-blog' );



?>
<div id="main-content" class="main-container blog-single"  role="main">
    <div class="container">
        <div class="row">
		
            <div class="col-lg-12 mx-auto">
				<?php while ( have_posts() ) : the_post(); ?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(["post-content","post-single"]); ?>>
						<?php get_template_part( 'template-parts/blog/contents/content', 'single' ); ?>
				  </article>
					<?php get_template_part( 'template-parts/blog/post-parts/part', 'author' ); ?>
					
					<?php 
						buildbench_post_nav(); 
				     ?>
               <?php
                comments_template(); 
       
               ?>
				<?php endwhile; ?>
            </div> <!-- .col-md-8 -->
         
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!--#main-content -->
<?php get_footer(); ?>