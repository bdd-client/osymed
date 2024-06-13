<?php
require_once('custom-widget/my-widget.php');
add_action( 'wp_enqueue_scripts', 'custom_style' );
function custom_style() {
  //  wp_enqueue_style( 'parent-style', get_template_directory_uri().'-child/style.css' );
   wp_enqueue_style( 
		'parent-style', 
		get_template_directory_uri() . '-child/style.css' , 
		array(),
		'1.0.0'
	);
   wp_enqueue_style( 
		'custom-style', 
		get_template_directory_uri() . '-child/custom.css' , 
		array(),
		'1.0.0'
	);

   wp_enqueue_style( 
		'bootstrap', 
		'//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', 
		array(), 
		'5.0.2'
	);

   wp_enqueue_style(
		'fontawesome',
		"//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css",
		array(),
		'6.1.1'
	);
}

add_action( 'wp_enqueue_scripts', 'custom_script' );
function custom_script() {
   wp_enqueue_script( 
		'bootstrap', 
		'//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js',
		array('jquery'),
		'5.0.2',
		true
	);

   wp_enqueue_script( 
		'custom-script', 
		get_template_directory_uri() . '-child/custom.js' , 
		array(),
		'1.0.0'
	);
}

function wpdocs_my_search_form( $form ) {
	$form = '
		<form role="search" method="get" id="searchform" class="searchform hide-mobile" action="' . home_url( '/' ) . '" >
			<div>
				<label class="screen-reader-text" for="s">' . __( 'Search for:' ) . '</label>
				<input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Search" />
				<button id="searchsubmit" type="submit">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</form>
	';

	return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );
?>