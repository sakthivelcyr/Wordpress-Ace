<?php

if ( ! defined( 'ABSPATH' ) ) exit;

if(defined('ELEMENTOR_VERSION')):

include_once BUILDBENCH_EDITOR . '/elementor/manager/controls.php';

class BUILDBENCH_Shortcode{

	/**
     * Holds the class object.
     *
     * @since 1.0
     *
     */
    public static $_instance;
    

    /**
     * Localize data array
     *
     * @var array
     */
    public $localize_data = array();

	/**
     * Load Construct
     * 
     * @since 1.0
     */

	public function __construct(){

		add_action('elementor/init', array($this, 'BUILDBENCH_elementor_init'));
        add_action('elementor/controls/controls_registered', array( $this, 'buildbench_icon_pack' ), 11 );
        add_action('elementor/controls/controls_registered', array( $this, 'control_image_choose' ), 13 );
        add_action('elementor/controls/controls_registered', array( $this, 'BUILDBENCH_ajax_select2' ), 13 );
        add_action('elementor/widgets/widgets_registered', array($this, 'BUILDBENCH_shortcode_elements'));
        add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'editor_enqueue_styles' ) );
        add_action( 'elementor/frontend/before_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
        add_action( 'elementor/preview/enqueue_styles', array( $this, 'preview_enqueue_scripts' ) );
        
	}


    /**
     * Enqueue Scripts
     *
     * @return void  
     */ 
    
     public function enqueue_scripts() {
         wp_enqueue_script( 'buildbench-main-elementor', BUILDBENCH_JS  . '/elementor.js',array( 'jquery', 'elementor-frontend' ), BUILDBENCH_VERSION, true );
    }

    /**
     * Enqueue editor styles
     *
     * @return void
     */

    public function editor_enqueue_styles() {
    
        wp_enqueue_style( 'buildbench-icon-elementor', BUILDBENCH_CSS.'/iconfont.css',null, BUILDBENCH_VERSION );

    }

    /**
     * Preview Enqueue Scripts
     *
     * @return void
     */

    public function preview_enqueue_scripts() {}
	/**
     * Elementor Initialization
     *
     * @since 1.0
     *
     */

    public function BUILDBENCH_elementor_init(){
    
        \Elementor\Plugin::$instance->elements_manager->add_category(
            'buildbench-elements',
            [
                'title' =>esc_html__( 'BUILDBENCH', 'buildbench' ),
                'icon' => 'fa fa-plug',
            ],
            1
        );
    }

    /**
     * Extend Icon pack core controls.
     *
     * @param  object $controls_manager Controls manager instance.
     * @return void
     */ 

    public function BUILDBENCH_icon_pack( $controls_manager ) {

        require_once BUILDBENCH_EDITOR_ELEMENTOR. '/controls/icon.php';

        $controls = array(
            $controls_manager::ICON => 'BUILDBENCH_Icon_Controler',
        );

        foreach ( $controls as $control_id => $class_name ) {
            $controls_manager->unregister_control( $control_id );
            $controls_manager->register_control( $control_id, new $class_name() );
        }

    }
    // registering ajax select 2 control
    public function BUILDBENCH_ajax_select2( $controls_manager ) {
        require_once BUILDBENCH_EDITOR_ELEMENTOR. '/controls/select2.php';
        $controls_manager->register_control( 'ajaxselect2', new \Control_Ajax_Select2() );
    }
    
    // registering image choose
    public function control_image_choose( $controls_manager ) {
        require_once BUILDBENCH_EDITOR_ELEMENTOR. '/controls/choose.php';
        $controls_manager->register_control( 'imagechoose', new \Control_Image_Choose() );
    }

    public function BUILDBENCH_shortcode_elements($widgets_manager){
       
           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/owlslider.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_OwlSlider_Widget());  

           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/feature.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Feature_Widget());  

           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/projects.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Project_Widget()); 

           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/services.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Service_Widget()); 
          
           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/latestnews.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Latestnews_Widget());
            
           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/testimonial.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Testimonial_Widget());

           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/title.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Title_Widget());
    
           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/pricing.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Pricing_Widget());

           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/team.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Team_Widget());

           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/working-process.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Working_Process_Widget());

           require_once BUILDBENCH_EDITOR_ELEMENTOR.'/widgets/funfact.php';
           $widgets_manager->register_widget_type(new Elementor\Buildbench_Funfact_Widget());

       
    
    }
    
	public static function BUILDBENCH_get_instance() {
        if (!isset(self::$_instance)) {
            self::$_instance = new BUILDBENCH_Shortcode();
        }
        return self::$_instance;
    }

}
$BUILDBENCH_Shortcode = BUILDBENCH_Shortcode::BUILDBENCH_get_instance();

endif;