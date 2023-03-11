<?php get_header(); ?>
	<div class="container">

		<h1 class="mt-4">Sua pesquisa: <?php  echo get_search_query(true)  ?></h1>
		<div class="row">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="col-lg-4">
					<a href="<?php echo get_the_permalink(); ?>" class="hover-transform  card-product">
						<div class="overflow-hidden">
							<img src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : image('placeholder.svg'); ?>" alt="<?php echo ($cap) ? $cap : $title; ?>" class="img-fluid" />
						</div>
						<h2 class="blog-featured-title">
							<?php the_title(); ?>
						</h2>
					</a>
				</div>
			<?php endwhile; ?>
			<?php else: ?>

				<p><?php _e('Nenhum resultado encontrado.'); ?></p>

			<?php endif; ?>
	    </div>
    </div>

<?php get_footer(); ?>
