<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Buildbench_Feature_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-feature';
    }

    public function get_title() {
        return esc_html__( 'Buildbench feature', 'buildbench' );
    }

    public function get_icon() { 
        return 'eicon-info-box';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('buildbench Featured Box', 'buildbench'),
            ]
		);

		$this->add_control(
			'sl_number', [
				'label'			=> esc_html__( 'Serial Number', 'buildbench' ),
				'type'			=> Controls_Manager::TEXT,
				'label_block'	=> true,
            	'default'	    => 01,
             
           
			]
		);

      $this->add_control(
			'title', [
				'label'			=> esc_html__( 'Title', 'buildbench' ),
				'type'			=> Controls_Manager::TEXT,
				'label_block'	=> true,
				'placeholder'	=> esc_html__( 'Building Staffs', 'buildbench' ),
				'default'	    => esc_html__( 'Building Staffs', 'buildbench' ),
			]
		);

      $this->add_control('desc', [
			'label'			=> esc_html__( 'Content', 'buildbench' ),
			'type'			=> Controls_Manager::TEXTAREA,
			'label_block'	=> true,
			'placeholder'	=> esc_html__( 'We have a long and proud histiry givin emphasis to envi ronment social and economic outcomes.', 'buildbench' ),
            'default'       => esc_html__( 'We have a long and proud histiry givin emphasis to envi ronment social and economic outcomes.', 'buildbench' ),
           
			]
		);
		

		$this->add_control('image',[
                'label'   => esc_html__( 'Image', 'buildbench' ),
                'type'    => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Utils::get_placeholder_image_src(),
                ],
                'label_block' => true,
              
            ]
        );
        
      $this->add_responsive_control('content_title_align', 
          [
				'label'			 => esc_html__( 'Alignment', 'buildbench' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

					'left'		 => [
						'title'	 => esc_html__( 'Left', 'buildbench' ),
						'icon'	 => 'fa fa-align-left',
					],
					'center'	 => [
						'title'	 => esc_html__( 'Center', 'buildbench' ),
						'icon'	 => 'fa fa-align-center',
					],
					'right'		 => [
						'title'	 => esc_html__( 'Right', 'buildbench' ),
						'icon'	 => 'fa fa-align-right',
					],
					'justify'	 => [
						'title'	 => esc_html__( 'Justified', 'buildbench' ),
						'icon'	 => 'fa fa-align-justify',
					],
				],
				'default'		 => 'left',
                'selectors' => [
                    '{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info .ts-title' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info p' => 'text-align: {{VALUE}};',
				],
			]
        );//Responsive control end
        $this->end_controls_section();


		$this->start_controls_section(
			'section_sl_number_style', [
				'label'	 => esc_html__( '#SL Number', 'buildbench' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
        );

      $this->add_control(
			'sl_color', [
				'label'		 => esc_html__( 'Number color', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'default'   => 'black',
				'selectors'	 => [
					'{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info .feature-number' => 'color: {{VALUE}} !important;',
				],
			]
		);
		
		$this->add_control(
			'sl_bg_color', [
				'label'		 => esc_html__( 'Number Background color', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'default'   => '#e1e1e1',
				'selectors'	 => [
               '{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info .feature-number:after' => 'background: {{VALUE}} !important;',
               '{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info .feature-number' => 'background: {{VALUE}} !important;',
				],
			]
        );
		$this->end_controls_section();
       
		$this->start_controls_section(
			'section_sub_title_style', [
				'label'	 => esc_html__( 'Title', 'buildbench' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
        );

      $this->add_control(
			'title_color', [
				'label'		 => esc_html__( 'Title color', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'default'   => 'black',
				'selectors'	 => [
					'{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info .ts-title' => 'color: {{VALUE}};',
				],
			]
		);
      
      $this->add_group_control(Group_Control_Typography::get_type(),
         [
			'name'		 => 'title_typography',
			'selector'	 => '{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info .ts-title',
			]
		);

      $this->end_controls_section();
        
        //Content Style Section
      $this->start_controls_section('section_content_style',
         [
				'label'	 => esc_html__( 'Content', 'buildbench' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			]
        );

      $this->add_control(
			'feature_content_color', [
				'label'		 => esc_html__( 'Content color', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'default'   => 'black',
				'selectors'	 => [
					'{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info p' => 'color: {{VALUE}};',
				],
			]
        );

      $this->add_group_control(Group_Control_Typography::get_type(),
         [
			 'name'		 => 'feature_content_typography',
			 'selector'	 => '{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info p',
			]
		);

		$this->end_controls_section();

		//Icon Style Section
      $this->start_controls_section('section_icon_style',
         [
				'label'	 => esc_html__( 'Image icon', 'buildbench' ),
				'tab'	   => Controls_Manager::TAB_STYLE,
			]
        );

      $this->add_control('icon_color', [
				'label'		 => esc_html__( 'Image border color', 'buildbench' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [
					    '{{WRAPPER}} .ts-feature-box .ts-feature .ts-feature-info .feature-icon:before' => 'background: {{VALUE}} !important;',
				],
			]
        );
    
      $this->end_controls_section();

      $this->start_controls_section('section_animation_style',
         [
            'label'	 => esc_html__( 'Animation', 'buildbench' ),
            'tab'	    => Controls_Manager::TAB_STYLE,
         ]
     );
         
    
      $this->add_control(
			'section_box_animation',
			[
				'label' => esc_html__( 'Hover animation', 'buildbench' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 1,
					],
					'em' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => 'px',
					'size' => -10,
				],
				'selectors' => [
					'{{WRAPPER}} .ts-feature-box .ts-feature:hover' => 'transform: translate3d(0, {{SIZE}}{{UNIT}}, 0);',
				],
			]
		);


		$this->end_controls_section();

		
    

    } //Register control end

    protected function render( ) { 
      $settings    = $this->get_settings();
  		$image       = $settings["image"];
		$title       = $settings["title"];
		$desc        = $settings["desc"];
      $sl_number   = $settings["sl_number"];
      
    
    ?>
 	<div class="ts-feature-box">
         <div class="ts-feature">
            <div class="ts-feature-info">
               <div class="feature-icon">
                  <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($title); ?>">
               </div>
               <span class="feature-number"><?php echo esc_html($sl_number); ?></span>
               <h3 class="ts-title"><?php echo esc_html($title); ?></h3>
               <p>
               <?php echo buildbench_kses($desc); ?>
               </p>
            </div>
         </div>
    </div> 
    
    <?php  
    }
    protected function _content_template() { }
}