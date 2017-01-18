<?php
/**
 * SSM Code Snippets
 *
 * @package   SSM_Code_Snippets
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package SSM_Code_Snippets
 */
class SSM_Code_Snippets_Registrations {

	public $post_type = 'code-snippet';

	public $taxonomies = array( 'code-category' );

	public function init() {
		// Add the SSM Code Snippets and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses SSM_Code_Snippets_Registrations::register_post_type()
	 * @uses SSM_Code_Snippets_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Code Snippets', 'ssm-code-snippets' ),
			'singular_name'      => __( 'Code Snippet', 'ssm-code-snippets' ),
			'add_new'            => __( 'Add Code Snippet', 'ssm-code-snippets' ),
			'add_new_item'       => __( 'Add Code Snippet', 'ssm-code-snippets' ),
			'edit_item'          => __( 'Edit Code Snippet', 'ssm-code-snippets' ),
			'new_item'           => __( 'New Code Snippet', 'ssm-code-snippets' ),
			'view_item'          => __( 'View Code Snippet', 'ssm-code-snippets' ),
			'search_items'       => __( 'Search Code Snippets', 'ssm-code-snippets' ),
			'not_found'          => __( 'No snippets found', 'ssm-code-snippets' ),
			'not_found_in_trash' => __( 'No snippets in the trash', 'ssm-code-snippets' ),
		);

		$supports = array(
			'title',
		);

		$args = array(
			'labels'          		=> $labels,
			'supports'        		=> $supports,
			'public'          		=> false,
			'capability_type' 		=> 'page',
			'publicly_queriable'	=> true,
			'show_ui' 						=> true,
			'show_in_nav_menus' 	=> false,
			'rewrite'         		=> false,
			'menu_position'   		=> 30,
			'menu_icon'       		=> 'dashicons-hammer',
			'has_archive'					=> false,
			'exclude_from_search'	=> true,
		);

		$args = apply_filters( 'ssm_code_snippets_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Project Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( 'Categories', 'ssm-code-snippets' ),
			'singular_name'              => __( 'Category', 'ssm-code-snippets' ),
			'menu_name'                  => __( 'Categories', 'ssm-code-snippets' ),
			'edit_item'                  => __( 'Edit Category', 'ssm-code-snippets' ),
			'update_item'                => __( 'Update Category', 'ssm-code-snippets' ),
			'add_new_item'               => __( 'Add New Category', 'ssm-code-snippets' ),
			'new_item_name'              => __( 'New Category Name', 'ssm-code-snippets' ),
			'parent_item'                => __( 'Parent Category', 'ssm-code-snippets' ),
			'parent_item_colon'          => __( 'Parent Category:', 'ssm-code-snippets' ),
			'all_items'                  => __( 'All Categories', 'ssm-code-snippets' ),
			'search_items'               => __( 'Search Categories', 'ssm-code-snippets' ),
			'popular_items'              => __( 'Popular Categories', 'ssm-code-snippets' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'ssm-code-snippets' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'ssm-code-snippets' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', 'ssm-code-snippets' ),
			'not_found'                  => __( 'No categories found.', 'ssm-code-snippets' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => false,
			'show_in_nav_menus' => false,
			'show_ui'           => true,
			'show_tagcloud'     => false,
			'hierarchical'      => true,
			'rewrite'           => false,
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'ssm_code_snippets_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}
}