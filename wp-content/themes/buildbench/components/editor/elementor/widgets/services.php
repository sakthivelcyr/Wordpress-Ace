<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Buildbench_Service_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-service';
    }

    public function get_title() {
        return esc_html__( 'Services ', 'buildbench' );
    }

    public function get_icon() { 
        return ' eicon-meta-data';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() { 

      $this->start_controls_section(
         'section_tab',
         [
             'label' => esc_html__('Service settings', 'buildbench'),
         ]
     );

      $this->add_control('service_item',
      [
         'label'     => esc_html__( 'Select Service', 'buildbench' ),
         'type'      => \Elementor\Controls_Manager::SELECT,
         'options'   => $this->getServices(),
      
      ]
     );

     $this->add_control('buildbench_service_image_pos',  [
      'label' => esc_html__( 'Icon Alignment', 'buildbench' ),
      'type' => \Elementor\Controls_Manager::SELECT,
      'default' => 'pull-left',
         'options' => [
         'pull-left'  => esc_html__( 'Left', 'buildbench' ),
         'top' => esc_html__( 'Top', 'buildbench' ),
         ],
       ]
     );

     $this->add_control('desc_limit',
            [
              'label'         => esc_html__( 'content limit', 'buildbench' ),
              'type'          => Controls_Manager::NUMBER,
              'default'       => '10',
               
            ]
     ); 

     $this->add_control('show_feature_image',[
         'label' => esc_html__( 'Feature image', 'buildbench' ),
         'type' => \Elementor\Controls_Manager::SWITCHER,
         'label_on' => esc_html__( 'Show', 'buildbench' ),
         'label_off' => esc_html__( 'Hide', 'buildbench' ),
         'return_value' => 'yes',
         'default' => 'yes',
         'condition' => ['feature_service' => ''],
        ]
     );

     $this->add_control('feature_service',[
      'label' => esc_html__( 'Icon service', 'buildbench' ),
      'type' => \Elementor\Controls_Manager::SWITCHER,
      'label_on' => esc_html__( 'Enable', 'buildbench' ),
      'label_off' => esc_html__( 'Disble', 'buildbench' ),
      'return_value' => 'yes',
      'default' => 'yes',
         
      ]
   );
      
     $this->end_controls_section();

     $this->start_controls_section('style_section',
         [
            'label' => esc_html__( 'Style Section', 'buildbench' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         ]
    ); 

    $this->add_control('service_text_color',
         [
            'label'    => esc_html__('Title color', 'buildbench'),
            'type'     => Controls_Manager::COLOR,
            'selectors'   => [
                 '{{WRAPPER}} .ts-service-box .ts-service-box-info h3 a' => 'color: {{VALUE}};',
                 '{{WRAPPER}} .featured-box .ts-title a' => 'color: {{VALUE}};',
             ],
         ]
     );

     $this->add_control('service_text_color_hover',
     [
         'label'     => esc_html__('Title hover', 'buildbench'),
         'type'      => Controls_Manager::COLOR,
         'selectors' => [
          
           '{{WRAPPER}} .ts-service-box .ts-service-box-info h3 a:hover' => 'color: {{VALUE}};',
           '{{WRAPPER}} .featured-box .ts-title a:hover' => 'color: {{VALUE}};',
       
         ],
     ]
    );
    $this->add_control('service_desc_color',
      [
         'label'    => esc_html__('Description color', 'buildbench'),
         'type'     => Controls_Manager::COLOR,
         'selectors'   => [
               '{{WRAPPER}} .ts-service-box .ts-service-box-info p' => 'color: {{VALUE}};',
               '{{WRAPPER}} .featured-box p' => 'color: {{VALUE}};',
         ],
      ]
    );
    $this->add_control('service_desc_hv_color',
    [
       'label'    => esc_html__('Description hover color', 'buildbench'),
       'type'     => Controls_Manager::COLOR,
       'condition' => ['buildbench_service_image_pos' => 'top'],
       'selectors'   => [
            '{{WRAPPER}} .ts-service-box .ts-service-box-info:hover p' => 'color: {{VALUE}};',
            '{{WRAPPER}} .featured-box:hover p' => 'color: {{VALUE}};',
        ],
    ]
   );

    $this->add_group_control(Group_Control_Typography::get_type(), 
         [
         'name'		 => 'buildbench_service_post_typography',
         'label'    => esc_html__('Content typpgraphy', 'buildbench'),
         'selectors'	 => '{{WRAPPER}} .ts-service-box .ts-service-box-info p',
            '{{WRAPPER}} .featured-box .feature-text',
                  
             
               
         ]
   );

    $this->end_controls_section();  

   $this->start_controls_section('style_position_section',
         [
            'label' => esc_html__( 'Position', 'buildbench' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         ]
      ); 
      
      $this->add_control(
         'service_background_position',
         [
            'label' => esc_html__( 'Background position', 'buildbench' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px', '%' ],
            'range' => [
               'px' => [
                  'min' => 0,
                  'max' => 1000,
                  'step' => 1,
               ],
               '%' => [
                  'min' => 0,
                  'max' => 100,
               ],
            ],
            'default' => [
               'unit' => '%',
               'size' => -10,
            ],
            'selectors' => [
            
               '{{WRAPPER}} .ts-service-box .ts-service-box-info:after' => 'top: {{SIZE}}{{UNIT}};;',
            ],
         ]
      );



      $this->end_controls_section();  
    }

    protected function render(){
    
      $settings = $this->get_settings();
      $service_single = $settings['service_item'];
      $buildbench_service_image_pos  =$settings['buildbench_service_image_pos'];
      $show_feature_image  =$settings['show_feature_image'];
      $feature_service  =$settings['feature_service'];
      $desc_limit  =$settings['desc_limit'];
    
         $args = [
            'post_type'        => 'ts-service',
            'posts_per_page'   => 1,
            'p'                => $service_single,
        
         ];
         $service = get_posts( $args,ARRAY_A);
      
               

      ?>
      <?php if(count($service)): ?>
               <?php if($feature_service!="yes"): ?>
                  <div class="ts-service<?php echo esc_attr($buildbench_service_image_pos!="pull-left"?"-classic":''); ?>">
                     <div class="ts-service-box <?php echo esc_attr($buildbench_service_image_pos!="pull-left"?"text-center pb-60":''); ?>">
                                 <?php if($show_feature_image=="yes"): ?>
                                    <div class="srevice-img">
                                    <img class="img-fluid" src="<?php echo get_the_post_thumbnail_url( $service[0]->ID, 'large' ); ?>">
                                    </div>
                                 <?php endif; ?>
                                    <div class="ts-service-box-img <?php echo esc_attr($buildbench_service_image_pos); ?>">
                                    <?php  $service_icon =  buildbench_meta_option($service[0]->ID,'service_icon','');  ?>
                                    <?php if(is_array($service_icon)): ?>
                                       <img src="<?php echo esc_attr($service_icon['url']); ?>" >
                                    <?php endif; ?> 
                                    </div>
                                    <div class="ts-service-box-info">
                                       <h3 class="ts-title"><a href="<?php echo get_post_permalink($service[0]->ID); ?>"><?php echo esc_html($service[0]->post_title); ?></a></h3>
                                       <p><?php echo esc_html($service[0]->post_excerpt); ?></p>
                                 </div>
                     </div><!-- Service 2 end -->
                  </div>
               <?php else: ?>   
               <div class="featured-box">
                  <?php 
                     $service_icon =  buildbench_meta_option($service[0]->ID,'service_icon',''); 
                  
                  ?>
                  <?php if(is_array($service_icon)): ?>
                     <img src="<?php echo esc_attr($service_icon['url']); ?>" > 
                  <?php endif; ?>
                     <h3 class="ts-title">
                           <a href="<?php echo get_post_permalink($service[0]->ID); ?>"> <?php echo esc_html($service[0]->post_title); ?> </a>
                     </h3>
                     <p class="feature-text"><?php echo wp_trim_words($service[0]->post_excerpt,$desc_limit,''); ?>
                     </p>
               </div>
               <?php endif; ?>
             
      <?php endif; ?>
      <?php 
    }

    public function getServices(){
      $service_list = [];
      $args = array(
          'post_type' 		    	=> 'ts-service',
          'suppress_filters' 		=> false,
          'posts_per_page'       => '-1'
       
       );
       
       $posts = get_posts($args);
       foreach ($posts as $postdata) {
          setup_postdata( $postdata );
          $service_list[$postdata->ID] = [$postdata->post_title];
        }
      
     
      return $service_list;
  }

   }