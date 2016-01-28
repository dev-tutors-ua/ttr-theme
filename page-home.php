<?php
	/**
	 * Template Name: Home Page
	 *
	 * @package WordPress
	 */
?>

<?php get_header(); ?>
	
	<!-- Image Carousel -->
	<?php dynamic_sidebar('home_bar'); ?>

	<!-- Main Content -->
	<div class="container-fluid main-content no-padding">

		
		<!-- Main Content -->
		<div class="col-sm-9 news-content no-padding">
			
			<div id="txt-container">
				<!-- Display Home Page Text -->
				<div class="container-fluid no-padding">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<!-- Heading -->
						<div class="page-header">
							<h2><?php the_title(); ?></h2>
						</div>

						<!-- Page Content -->
						<div class="page-article">
							<?php the_content(); ?>
						</div>

					<?php endwhile; endif; ?>
				</div>
			</div>

			<div id="news-container">

				<!-- Display Lates News -->
				<div class="page-header">
					<h2>Останні Події</h2>
				</div>

				<?php $posts_qry = query_posts( 'posts_per_page=3' );

				if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

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

				<div class="well well-sm">
					<a href="/news">Читати всі події &#8594;</a>
				</div>
			</div>

		</div>

		<?php get_sidebar("right"); ?>

	</div>

<?php get_footer(); ?>
