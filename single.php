<?php get_header(); ?>

	<!-- Main Content -->
	<div class="container-fluid main-content no-padding">
		
		<!-- Main Content -->
		<div class="col-sm-9 news-content no-padding">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<!-- Header -->
				<div class="page-header">
					<h2><?php the_title(); ?></h2>
				</div>

				<!-- Article -->
				<div class="panel panel-default news-panel">
					<div class="panel-body">
						<?php the_content(); ?>
					</div>

					<div class="panel-footer">
						<span class="time"><span class="glyphicon glyphicon-calendar"></span> <?php the_time('F j, Y'); ?></span>
					</div>
				</div> <!-- /article -->

			<?php endwhile; endif; ?>

		</div>

		<?php get_sidebar("right"); ?>

	</div>

<?php get_footer(); ?>