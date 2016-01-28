<?php get_header(); ?>

	<!-- Main Content -->
	<div class="container-fluid main-content no-padding">
		
		<!-- Main Content -->
		<div class="col-sm-9 news-content no-padding">
			<!-- Header -->
			<div class="page-header">
				<h2>Пощук: "<?php the_search_query(); ?>"</h2>
			</div>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<div class="panel panel-default news-panel">
					<?php 
						$post_type_str = get_post_type(get_the_ID());
					?>

					<div class="panel-heading">
						<h4 class="panel-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?>
								<!-- Display Post Type -->
								<?php if ($post_type_str == "page") { ?>
									<small>Сторінка</small>
								<?php } else if ($post_type_str == "post") { ?>
									<small>Новина</small>
								<?php } ?>
							</a>
						</h4>
					</div>

					<?php if ($post_type_str == "post") { ?>
						<div class="panel-body">
							<?php the_post_thumbnail('post-thumb', array("class" => "img-thumbnail attachment-post-thumb")); ?>
							<?php print_the_excerpt(); ?>
						</div>
					<?php } ?>

				</div> <!-- /article -->

			<?php endwhile; endif; ?>

			<!-- Pagination Links Bottom -->
			<div class="nav-pagination clearfix">
				<div class="older">
					<?php next_posts_link( '&larr; Старіші записи' ); ?>
				</div>

				<div class="newer">
					<?php previous_posts_link( 'Новіші записи &rarr;' ); ?>
				</div>
			</div>

		</div>

		<?php get_sidebar("right"); ?>

	</div>

<?php get_footer(); ?>
