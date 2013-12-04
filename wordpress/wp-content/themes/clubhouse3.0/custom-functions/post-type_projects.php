<?php
// Register Custom Post Types
add_action('init', 'portfolio_register');  
        function portfolio_register() {  
                $labels = array(
                        'name'                  => _x('Projects', 'post type general name'),
                        'singular_name'         => _x('Projects', 'post type singular name'),
                        'add_new'               => _x('Add New Project', 'Project item'),
                        'add_new_item'          => __('Add New Project'),
                        'edit_item'             => __('Edit Project'),
                        'new_item'              => __('New Project'),
                        'view_item'             => __('View Project'),
                        'search_items'          => __('Search Projects'),
                        'not_found'             => __('No Projects found'),
                        'not_found_in_trash'    => __('Nothing found in Trash'),
                        'parent_item_colon'     => ''
                );
               
                $args = array(
                        'labels'                => $labels,
                        'public'                => true,
                        'publicly_queryable'    => true,
                        'show_ui'               => true,
                        'query_var'             => true,
                        'menu_icon'             => get_stylesheet_directory_uri() . '/images/portfolio.png',
                        'rewrite'               => array('slug'=>'work'),
                        'capability_type'       => 'post',
                        'hierarchical'          => false,
                        'menu_position'         => null,
                        'supports' 				=> array('title','editor','thumbnail', 'excerpt'),
                );
                register_post_type( 'portfolio' , $args );
        }  

// Register Press Taxonomy
function project_taxonomy() {

        register_taxonomy(
                'project_type',
                'portfolio',
                array(
                        "hierarchical"          => true, 
                        "label"                 => 'Project Type',
                        'public'                => true,
                        'query_var'             => true,
                        'show_ui'               => true,
                        'rewrite'               => true
                )
        );
}
add_action('init', 'project_taxonomy');
?>