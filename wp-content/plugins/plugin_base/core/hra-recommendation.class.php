<?php namespace Pluginbase\Core;
/**
 * Class HraRecommendation
 *
 * @since Input Health Options 0.0.3
 */
class HraRecommendation {
    public function __construct(){
        $this->hooks();
    }

    public function hooks(){
        $this->load_assets();
        $this->webhooks();

        /**
         * Admin Page Login
         */
        add_action( 'xbox_init', [ $this, 'hra_recommendation' ], 10 );
    }

    public function load_assets(){
    }

    public function webhooks(){
    }

    public function hra_recommendation(){
        $options = array(
            'id' => 'hra-recommendation',
            'title' => ' HRA Module Recommendations',
            'menu_title' => ' HRA Module Recommendations',
            'skin' => 'teal',
            'layout' => 'wide',//Layouts: wide, boxed
            'position' => 60,
            'parent' => false,
            'capability' => 'manage_options',
            'header' => [
                'icon' => '<i class="xbox-icon xbox-icon-users"></i>',
                'desc' => ' HRA Module Recommendations',
            ],
            'saved_message' => __( 'Settings updated', IHO_DEVCORT_TEXT_DOMAIN ),
            'form_options' => array(
                'id' => 'id-form-tag',
                'action' => '',
                'method' => 'post',
                'save_button_text' => __( 'Save Changes', IHO_DEVCORT_TEXT_DOMAIN ),
                'save_button_class' => '',
            ),
        );


        $xbox = xbox_new_admin_page( $options );
        //if( $_GET['page'] == 'hra-recommendation' or $_GET['action'] == 'xbox_process_form_hra-recommendation'){
            include_once dirname( __FILE__ ) . '/fields/hra_recommendation_page.php';
        //}
    }
}