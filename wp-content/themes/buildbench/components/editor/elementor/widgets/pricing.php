<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Buildbench_Pricing_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-pricing';
    }

    public function get_title() {
        return esc_html__( 'Pricing ', 'buildbench' );
    }

    public function get_icon() { 
        return 'eicon-price-list';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Pricing Content', 'buildbench'),
            ]
        );
        
     

        $this->add_control(
			'pricing_style',
			[
				'label'    => esc_html__( 'Pricing Style', 'buildbench' ),
				'type'     => Custom_Controls_Manager::IMAGECHOOSE,
				'default'  => 'style1',
				'options'  => [
                    'style1' => [
					   	   'title'      => esc_html__( 'Standard Price', 'buildbench' ),
                        'imagelarge' => BUILDBENCH_IMG. '/style/price/style1.png',
                        'imagesmall' => BUILDBENCH_IMG. '/style/price/style1.png',
                        'width'      => '30%',
					],
              		  
			
				],
			]
        );

       
        $this->add_control(
			'price_featured',
			[
				'label'          => esc_html__( 'Featured', 'buildbench' ),
				'type'           => Controls_Manager::SWITCHER,
				'label_on'       => esc_html__( 'Yes', 'buildbench' ),
				'label_off'      => esc_html__( 'No', 'buildbench' ),
				'return_value'   => 'yes',
				'default'        => 'yes',
			]
        );
        $this->add_control(
			'package_plan_tag',
			[
				'label'         => esc_html__( 'Feature tag', 'buildbench' ),
            'type'          => Controls_Manager::TEXT,
            'placeholder'   => esc_html__( 'Best', 'buildbench' ),
            'condition'     => ["pricing_style"=>"style1",'price_featured'=>"yes"],
			]
        );
        
        $this->add_control(
			'package_name',
			[
				'label'        => esc_html__( 'Package Name', 'buildbench' ),
				'type'         => Controls_Manager::TEXT,
            'placeholder'  => esc_html__( 'Enter your Price Package', 'buildbench' ),               
			]
        );
      
      

          
      $repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title', [
				'label'        => esc_html__( 'Field', 'buildbench' ),
				'type'         => \Elementor\Controls_Manager::TEXT,
				'default'      => esc_html__( 'List Title' , 'buildbench' ),
				'label_block'  => true,
			]
		);

		$this->add_control(
			'price_service_list',
			[
				'label'     => esc_html__( 'Package service list', 'buildbench' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'    => $repeater->get_controls(),
				'default'   => [
					[
						'list_title' => esc_html__( 'Title #1', 'buildbench' ),
					],
			
				],
				'title_field' => '{{{ list_title }}}',
			]
		);

        
        $this->add_control(
			'price',
			[
				'label'       => esc_html__( 'Package Price', 'buildbench' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter Package Price', 'buildbench' ),
			]
        );

        $this->add_control('package_validity',
            [
               'label'          => esc_html__( 'Package validity', 'buildbench' ),
               'type'           => Controls_Manager::TEXT,
               'placeholder'    => esc_html__( 'Enter Package validity', 'buildbench' ),
               'default'        => esc_html__('Per month','buildbench'),
               'description'    => esc_html__('Help: per year , per month or every 3 month','buildbench'),
            ]
        );
        
        $this->add_control('currency',
            [
               'label'         => esc_html__( 'Currency', 'buildbench' ),
               'type'          => Controls_Manager::TEXT,
               'default'       => '$',
               'placeholder'   => esc_html__( 'Enter Currency', 'buildbench' ),
               'condition'     => [
                  'pricing_style' => ['style1'],
                    
                ]
            ]
        );
      
      
        
        $this->add_control('price_button_text',
			   [
				'label'    => esc_html__( 'Button Text', 'buildbench' ),
				'type'     => Controls_Manager::TEXT,
				
			   ]
        );
        
        $this->add_control('price_button_url',
            [
               'label'    => esc_html__( 'Button Link', 'buildbench' ),
               'type'     => Controls_Manager::URL,
               
            ]
        );
      
             
        $this->end_controls_section();
  
        $this->start_controls_section('style_section',
            [
                'label'    => esc_html__( 'Style Section', 'buildbench' ),
                'tab'      => Controls_Manager::TAB_STYLE,
            ]
        );
        
        $this->add_control('box_text_color',
            [
               'label'		 => esc_html__( 'Text color', 'buildbench' ),
               'type'		 => Controls_Manager::COLOR,
               'selectors'	 => [
                  '{{WRAPPER}} .plan'                                 => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header h3'                 => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header h4'                 => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header .plan-price strong' => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header .plan-price sup'    => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan .plan-header .plan-price span'   => 'color: {{VALUE}};',
                  '{{WRAPPER}} .plan ul li '                          => 'color: {{VALUE}};',
                           
               ],
			  ]
        );

        $this->add_control('box_background_color',
           [
            'label'		 => esc_html__( 'Background color', 'buildbench' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
               '{{WRAPPER}} .plan .plan-tag:after' => 'border-left-color: {{VALUE}};',
					'{{WRAPPER}} .plan' => 'background: {{VALUE}};',
					
                            
				],
			 ]
        );

        $this->add_control('box_button_text_color',
        [
         'label'		 => esc_html__( 'Button text color', 'buildbench' ),
         'type'		 => Controls_Manager::COLOR,
         'selectors'	 => [
              '{{WRAPPER}} .plan .price-btn-color' => 'color: {{VALUE}};',
               
                           
            ],
         ]
      );

      $this->add_control('box_button_text_hover_color',
      [
       'label'		 => esc_html__( 'Button text hover', 'buildbench' ),
       'type'		 => Controls_Manager::COLOR,
       'selectors'	 => [
            '{{WRAPPER}} .plan .price-btn-color:hover' => 'color: {{VALUE}};',
                              
            ],
         ]
      );
   
     
      $this->add_control('box_button_bg_color',
      [
            'label'		 => esc_html__( 'Button background', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'selectors'	 => [
               '{{WRAPPER}} .plan .price-btn-color' => 'background: {{VALUE}};',
              
                           
            ],
         ]
      );

      $this->add_control('box_button_bg_border_color',
         [
            'label'		 => esc_html__( 'Button border', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'selectors'	 => [
              
               '{{WRAPPER}} .plan .price-btn-color' => 'border-color: {{VALUE}};',
                           
            ],
         ]
      );

      $this->add_control('box_plan_tag_text_color',
      [
            'label'		 => esc_html__( 'Plan Tag text', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'selectors'	 => [
               '{{WRAPPER}} .plan .plan-tag' => 'color: {{VALUE}};',
              
                           
            ],
         ]
      );

      $this->add_control('box_plan_tag_background_color',
      [
            'label'		 => esc_html__( 'Plan Tag background', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'selectors'	 => [
               '{{WRAPPER}} .plan .plan-tag' => 'background: {{VALUE}};',
              
                           
            ],
         ]
      );

      $this->add_responsive_control(
			'pricing_box_padding',
			[
				'label' => esc_html__( 'Box padding', 'buildbench' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .plan' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
      
        $this->end_controls_section();

		
       
        

    } //Register control end

    protected function render( ) { 
     
        $settings           =   $this->get_settings();
        $package_name       =   $settings["package_name"];
        $price              =   $settings["price"];
        $package_plan_tag              =   $settings["package_plan_tag"];
        $currency           =   isset($settings["currency"])?$settings["currency"]:'$';
        $price_featured     =   $settings["price_featured"];
        $price_service_list =   $settings["price_service_list"];
        $package_validity   =   $settings["package_validity"];
        $button_text        =   $settings["price_button_text"]; 
        $button_url         =   $settings["price_button_url"]; 
        $style              =   $settings["pricing_style"];
       
    
        ?>  
        
      <?php if($style=="style1"): ?>
        <div class="plan text-center <?php echo esc_attr( $price_featured=="yes"?'plan-highlight':'solid-bg'); ?> ">
            <?php if($price_featured=="yes"): ?>    
            <span class="plan-tag"><?php echo esc_html($package_plan_tag); ?></span>
            <?php endif;  ?> 
            <div class="plan-header">
                <h3 class="plan-name"><?php echo esc_html($package_name); ?></h3>
                <h4 class="plan-price">
                <sup class="currency"> <?php echo esc_html($currency); ?></sup>
                <strong><?php echo esc_html($price); ?></strong>
                </h4> <!-- Plan Price End -->
            </div><!-- Plan Header -->
            <ul class="list-unstyled">
             <?php foreach($price_service_list as $service_item): ?>
               <li> <?php echo buildbench_kses($service_item["list_title"]); ?> <li>
             <?php endforeach; ?>
            </ul> <!-- List End -->
            <?php if($button_text!=''): ?> 
               <div class="text-center">
                  <a target="<?php echo esc_attr($button_url["is_external"]=="on"?"_blank":"_self"); ?>" href="<?php echo esc_url($button_url["url"]); ?>" class="btn btn-primary price-btn-color"><?php echo esc_html($button_text); ?></a>
               </div>
            <?php endif; ?> 
        </div> <!-- Plan end -->
      <?php endif; ?>

      
    <?php  
    }
    protected function _content_template() { }
}