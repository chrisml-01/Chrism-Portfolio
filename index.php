<?php get_header(); ?>

<div class="project-container">
        <div class="site-wrap">    
            <div class="nav-menu projects">
                <a href="<?php echo site_url(); ?>">about me</a>
                <a href="<?php echo site_url("/projects"); ?>" class="active">projects</a>
			</div> 
			
			
            <div class="masonry">     

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>   

                <div class="item">
					<?php 
					$item_size = array("item_small", "item_medium", "item_large");
					$randomizeSize = $item_size[array_rand($item_size)];?>

					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<div class="item_content <?php echo $randomizeSize?>" style="background-image: url('<?php echo $image[0]; ?>')">
							<a href="<?php the_permalink(); ?>" class="item_content">
								<figure>
									<img src="assets/1.png" class="item_image">                               
								</figure>
							</a>
						</div> 
					<?php endif; ?>

                         
				</div>

				<?php endwhile; ?>
				
			</div>
			
			

			<?php else : ?>

				<article id="post-not-found" class="hentry cf">
						<header class="article-header">
							<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
					</header>
						<section class="entry-content">
							<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
					</section>
					<footer class="article-footer">
							<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
					</footer>
				</article>

			<?php endif; ?>

    
        </div>
    </div>
<?php get_footer(); ?>
