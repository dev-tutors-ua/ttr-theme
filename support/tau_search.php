<?php

class TAU_Search extends WP_Widget {
	function __construct() {
		parent::__construct(
			'tau_search_widget', // Base ID
			__( 'TAU Search', 'text_domain' ), // Name
			
			array( 'description' => __( 'Custom Search Widget for TAU theme', 'text_domain' ), ) // Args
		);

	}

	// Front End
	public function widget( $args, $instance ) {
		echo $args["before_widget"];
		echo $args["before_title"] . "Пошук" . $args["after_title"];
	?>

		<form role="search" method="get" id="searchform" class="searchform" action="<?php echo get_site_url(); ?>">
			<div class="input-group">
				<input type="text" class="form-control" name="s" placeholder="Пошук">
				<span class="input-group-btn">
					<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
				</span>
			</div>
		</form>
	<?php
		echo $args["after_widget"];
	}

	public function form( $instance ) {
	}
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		return $instance;
	}
}

?>
