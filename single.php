<?php get_header(); ?>

	<div class="project-page">
        <div class="site-wrap">
            <div class="nav-menu projects">
                <a href="<?php echo site_url(); ?>">about me</a>
                <a href="<?php echo site_url("/projects"); ?>">projects</a>
            </div> 
		  
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="project-content">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-lg-8">
							<?php
								$project_images = get_field( 'project_header' );
								if ( $project_images ) : ?>
									<img class="project-header" src="<?php echo esc_url( $project_images['url'] ); ?>" alt="<?php echo esc_attr( $project_images['alt'] ); ?>" />
							<?php endif; ?>
						</div>
			
						<div class="col-md-12 col-sm-12 col-lg-4">
							<div class="project-info">
								<h2><?php the_title() ?></h2>
								<h5 class="category-tags"><?php the_category(', ') ?></h5>
			
								<h6><?php the_content() ?></h6>

								<?php
								$link = get_field( 'button_link' );
								if ( $link ) :
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<a class="btn-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif; ?>

								<?php
								$link = get_field( 'button_link_2' );
								if ( $link ) :
									$link_url = $link['url'];
									$link_title = $link['title'];
									$link_target = $link['target'] ? $link['target'] : '_self';
									?>
									<a class="btn-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
								<?php endif; ?>

							</div>
						</div>
					</div>
		
					<div class="project-imgs">

					<?php
						$project_image_1 = get_field( 'project_image_1' );
						if ( $project_image_1 ) : ?>
							<img class="project-image img-right" src="<?php echo esc_url( $project_image_1['url'] ); ?>" alt="<?php echo esc_attr( $project_image_1['alt'] ); ?>" />
					<?php endif; ?>

					<?php if ( $image_1_description = get_field( 'image_1_description' ) ) : ?>
						<h6 class="txt-left"><?php echo $image_1_description; ?></h6>
					<?php endif; ?>

					<?php
						$project_image_2 = get_field( 'project_image_2' );
						if ( $project_image_2 ) : ?>
							<img class="project-image" src="<?php echo esc_url( $project_image_2['url'] ); ?>" alt="<?php echo esc_attr( $project_image_2['alt'] ); ?>" />
					<?php endif; ?>

					<?php if ( $image_2_description = get_field( 'image_2_description' ) ) : ?>
						<h6 class="txt-right"><?php echo $image_2_description; ?></h6>
					<?php endif; ?>

					</div>
			
				</div>

							<?php
								/*
								 * Ah, post formats. Nature's greatest mystery (aside from the sloth).
								 *
								 * So this function will bring in the needed template file depending on what the post
								 * format is. The different post formats are located in the post-formats folder.
								 *
								 *
								 * REMEMBER TO ALWAYS HAVE A DEFAULT ONE NAMED "format.php" FOR POSTS THAT AREN'T
								 * A SPECIFIC POST FORMAT.
								 *
								 * If you want to remove post formats, just delete the post-formats folder and
								 * replace the function below with the contents of the "format.php" file.
								*/
								// get_template_part( 'post-formats/format', get_post_format() );
							?>

						<?php endwhile; ?>
            
    
            <div class="project-navigation">
				<?php 
				$previous = get_previous_post();
				$next = get_next_post();

				if (get_next_post()) { ?>
					<a class="nav-right" href="<?php echo get_the_permalink($next) ?>">Next Project: <?php echo get_the_title($next) ?></a>
				<?php } if (get_previous_post()) { ?>
					<a class="nav-left" href="<?php echo get_the_permalink($previous) ?>">Previous Project: <?php echo get_the_title($previous)?></a>
				<?php } 
				?>
                <!-- <a href="#">Previous project</a>
                <a href="#">Next project</a> -->
    
            </div>
        </div>
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
											<p><?php _e( 'This is the error message in the single.php template.', 'bonestheme' ); ?></p>
									</footer>
							</article>

						<?php endif; ?>


<?php get_footer(); ?>
