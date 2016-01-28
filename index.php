<?php get_header(); ?>

	<!-- Main Content -->
	<div class="container-fluid main-content no-padding">
		
		<!-- Main Content -->
		<div class="col-sm-9 news-content no-padding">
			<!-- Header -->
			<div class="page-header">
				<h2>Оголошення</h2>
			</div>

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<!-- Article -->
				<div class="panel panel-default news-panel">
					<div class="panel-heading">
						<h4 class="panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					</div>
					
					<div class="panel-body">
						<!-- <?php the_excerpt(); ?> -->
						<?php the_post_thumbnail('post-thumb', array("class" => "img-thumbnail attachment-post-thumb")); ?>
						<?php print_the_excerpt(); ?>
					</div>

					<div class="panel-footer">
						<span class="time"><span class="glyphicon glyphicon-calendar"></span> <?php the_time('F j, Y'); ?></span>

						<?php if ($more_post) { ?>
							<span class="readmore"><a href="<?php the_permalink(); ?>">Детальніше</a></span>
						<?php } ?>

						<!--<?php new_excerpt_more(); ?>-->
					</div>
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

		<?php get_sidebar("news"); ?>

	</div>

<?php get_footer(); ?>
