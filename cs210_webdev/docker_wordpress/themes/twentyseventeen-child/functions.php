<?php
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

add_action( 'rest_api_init', 'wpc_register_wp_api_endpoints' );
function wpc_register_wp_api_endpoints() {
    register_rest_route( 'myposts', '/category', array(
        'methods' => 'GET',
        'callback' => 'wpc_myposts_category_callback',
    ));
}

function wpc_myposts_category_callback( WP_REST_Request $request_data ) {

  //Get the parameters from the request_data class using the “get_params” method
  // Params are the values after the myposts/category? In the urls
  $parameters = $request_data->get_params();

  // We want to create a category string with each of the categories submitted in the REST request
  $catStr = "";
  foreach( $parameters as $key => $value) {
    $catStr = $catStr . $key . ",";
  }
  error_log("Here is the category query: $catStr", 0 );

  //Call the query_post API with the category string
  // e.g. sports,music,teaching

  $results = query_posts(array(
      'category_name' => $catStr,
      'posts_per_page' => -1
  ));

  //Finally return the results
  Return $results;

}
