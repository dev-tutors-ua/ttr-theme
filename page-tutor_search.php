<?php get_header(); ?>

	<!-- Main Content -->
	<div class="container-fluid main-content no-padding">
		
		<!-- Main Content -->
		<div class="col-sm-9 news-content no-padding">

			<!-- Header -->
			<div class="page-header">
				<h2>Пошук Тьюторів</h2>
			</div>

			<!-- Page Content -->
			<div class="page-article">
				<?php if (TTR_db_page::have_tutors()): if (TTR_db_page::get_page_type() == "search"): TTR_db_page::get_pagination(); while (TTR_db_page::have_tutors()): ?>
					<!-- Article -->
					<div class="panel panel-default news-panel">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a href="<?php TTR_db_page::get_link(); ?>"><?php TTR_db_page::get_name(); ?></a>
							</h4>
						</div>

						<div class="panel-body">
							<p><?php TTR_db_page::get_description_short(); ?></p>
						</div>

						<div class="panel-footer">
							<a href="<?php TTR_db_page::get_link(); ?>"><?php _e("Детальніше","ttr-db"); ?></a>
						</div>
					</div> <!-- /article -->
				<?php endwhile; TTR_db_page::get_pagination(); elseif (TTR_db_page::get_page_type() == "view"): ?> 
					<div class="page-article">
						<p><?php echo "<b>".__("Name", "ttr-db").":</b> " ?><?php TTR_db_page::get_name(); ?></p>
						<p><?php echo "<b>".__("City", "ttr-db").":</b> " ?><?php TTR_db_page::get_location(); ?></p>
						<p><?php echo "<b>".__("Subject", "ttr-db").":</b> "?><?php TTR_db_page::get_subject(); ?></p>
						<p><?php echo "<b>".__("Age", "ttr-db").":</b> " ?><?php TTR_db_page::get_age(); ?></p>

						<p><?php TTR_db_page::get_description(); ?></p>
					</div>
				<?php endif; endif; ?>
			</div>

		</div>

		<?php get_sidebar("right"); ?>
		
	</div>

<?php get_footer(); ?>
