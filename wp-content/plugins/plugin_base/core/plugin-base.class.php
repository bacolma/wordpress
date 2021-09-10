<?php namespace Pluginbase\Core;

/**
 * Main class Pluginbase
 *
 * @since Ramp lifechart 0.0.1
 */
class PluginBase {
    /**
     * @var array $config_ramp_lifechart Base configuration array
     * @since Ramp lifechart 0.0.1
     */
    private $config_plugin_base;

    /**
     * RampLifechart constructor.
     *
     * @param array $config_ramp_lifechart Base configuration array
     *
     * @since Ramp lifechart 0.0.1
     */
    public function __construct( $config_plugin_base ){
        $this->config_plugin_base = $config_plugin_base;
        $this->load_classes();
        $this->hooks();   
    }

    /**
     * Load instances of api and assets
     *
     * @since Ramp lifechart 0.0.1
     */
    public function load_classes(){
        new AssetsLoader( $this->config_plugin_base['version'] );
        new HraRecommendation();
    }


    /**
     * Load hooks
     *
     * @since Ramp lifechart 0.0.1
     */
    public function hooks(){
        add_action( 'init', [ $this, 'plugin_base_post_type' ] );
        add_action( 'init', [ $this, 'plugin_base_post_type_2' ] );
    }

      /**
     * Create custom post type "Assessment"
     *
     * @since Ramp assessment 0.0.1
     */

    public function plugin_base_post_type(){
        // Set UI labels for Custom Post Type
        $labels = array(
            'name' => _x( 'Assessments', 'Post Type General Name', PLUGIN_BASE_TEXT_DOMAIN ),
            'singular_name' => _x( 'Assessment', 'Post Type Singular Name', PLUGIN_BASE_TEXT_DOMAIN ),
            'menu_name' => __( 'Assessment', PLUGIN_BASE_TEXT_DOMAIN ),
            'parent_item_colon' => __( 'Parent Assessment', PLUGIN_BASE_TEXT_DOMAIN ),
            'all_items' => __( 'All assessment', PLUGIN_BASE_TEXT_DOMAIN ),
            'view_item' => __( 'View Assessment', PLUGIN_BASE_TEXT_DOMAIN ),
            'add_new_item' => __( 'Add New Assessment', PLUGIN_BASE_TEXT_DOMAIN ),
            'add_new' => __( 'Add New', PLUGIN_BASE_TEXT_DOMAIN ),
            'edit_item' => __( 'Edit Assessment', PLUGIN_BASE_TEXT_DOMAIN ),
            'update_item' => __( 'Update Assessment', PLUGIN_BASE_TEXT_DOMAIN ),
            'search_items' => __( 'Search Assessment', PLUGIN_BASE_TEXT_DOMAIN ),
            'not_found' => __( 'Not Found', PLUGIN_BASE_TEXT_DOMAIN ),
            'not_found_in_trash' => __( 'Not found in Trash', PLUGIN_BASE_TEXT_DOMAIN ),
        );

        // Set other options for Custom Post Type

        $args = array(
            'label' => __( 'menu_base', PLUGIN_BASE_TEXT_DOMAIN ),
            'description' => __( 'Menu1', PLUGIN_BASE_TEXT_DOMAIN ),
            'labels' => $labels,
            'supports' => array( 'title', 'thumbnail' ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'capability_type' => 'page',
            'show_in_rest' => false,
            'rewrite' => array(
                'slug' => 'assessment',
                'with_front' => false
            ),
        );
        // flush_rewrite_rules(); // For clear rules
        register_post_type( 'menu_base', $args );
    }

       /**
     * Create custom post type "Assessment"
     *
     * @since Ramp assessment 0.0.1
     */

    public function plugin_base_post_type_2(){
        // Set UI labels for Custom Post Type
        $labels = array(
            'name' => _x( 'Menu2', 'Post Type General Name', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'singular_name' => _x( 'Menu2', 'Post Type Singular Name', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'menu_name' => __( 'Menu2', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'parent_item_colon' => __( 'Parent Assessment', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'all_items' => __( 'All assessment', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'view_item' => __( 'View Assessment', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'add_new_item' => __( 'Add New Assessment', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'add_new' => __( 'Add New', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'edit_item' => __( 'Edit Assessment', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'update_item' => __( 'Update Assessment', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'search_items' => __( 'Search Assessment', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'not_found' => __( 'Not Found', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'not_found_in_trash' => __( 'Not found in Trash', RAMP_ASSESSMENT_TEXT_DOMAIN ),
        );

        // Set other options for Custom Post Type

        $args = array(
            'label' => __( 'ramp_assessment', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'description' => __( 'Assessment', RAMP_ASSESSMENT_TEXT_DOMAIN ),
            'labels' => $labels,
            'supports' => array( 'title', 'thumbnail' ),
            'hierarchical' => false,
            'public' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'show_in_admin_bar' => true,
            'menu_position' => 5,
            'can_export' => true,
            'has_archive' => false,
            'exclude_from_search' => true,
            'publicly_queryable' => true,
            'capability_type' => 'page',
            'show_in_rest' => false,
            'rewrite' => array(
                'slug' => 'assessment',
                'with_front' => false
            ),
        );
        // flush_rewrite_rules(); // For clear rules
        register_post_type( 'ramp_assessment', $args );
    }

}
