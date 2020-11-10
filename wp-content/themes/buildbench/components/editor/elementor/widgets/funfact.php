<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Buildbench_Funfact_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-funfact';
    }

    public function get_title() {
        return esc_html__( 'Buildbench funfact', 'buildbench' );
    }

    public function get_icon() { 
        return 'fa fa-calculator';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() {

      $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('buildbench funfact Box', 'buildbench'),
            ]
		);

      $this->add_control(
         'style_fun',
         [
             'label'     => esc_html__('Style ', 'buildbench'),
             'type' => \Elementor\Controls_Manager::SELECT,
             'default' => 'funfact-item',
             'options' => [
                'ts-funfact ts-funfact-classic'  => esc_html__( 'Classic', 'buildbench' ),
                'funfact-item'   => esc_html__( 'Standard', 'buildbench' ),
             ],
               
         ]
      );

      $this->add_control(
         'style_fun_center',
         [
             'label'     => esc_html__('Icon position ', 'buildbench'),
             'type' => \Elementor\Controls_Manager::SELECT,
             'default' => 'icon-left',
             'condition' => ['style_fun' => 'ts-funfact ts-funfact-classic'],
             'options' => [
                'icon-left'  => esc_html__( 'Left', 'buildbench' ),
                'icon-center'   => esc_html__( 'Center', 'buildbench' ),
             ],
               
         ]
      );
      $this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Funfact Icons', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'icon icon-Funfacts-3',
					'library' => 'solid',
				],
			]
		);

      $this->add_control(
			'number', [
				'label'			=> esc_html__( 'Number count', 'buildbench' ),
				'type'			=> Controls_Manager::TEXT,
				'label_block'	=> true,
				'placeholder'	=> esc_html__( '512', 'buildbench' ),
				'default'	    => esc_html__( '512', 'buildbench' ),
			]
      );


      $this->add_control('desc', [
			'label'			=> esc_html__( 'Content', 'buildbench' ),
			'type'			=> Controls_Manager::TEXTAREA,
			'label_block'	=> true,
			'placeholder'	=> esc_html__( 'Successfully Project Finished.', 'buildbench' ),
         'default'      => esc_html__( 'Successfully Project Finished.', 'buildbench' ),
           
			]
		);
		

        
      $this->add_responsive_control('content_title_align', 
          [
				'label'			 => esc_html__( 'Alignment', 'buildbench' ),
            'type'			 => Controls_Manager::CHOOSE,
            'condition' => ['style_fun' => 'ts-funfact ts-funfact-classic'],
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
                  '{{WRAPPER}} .ts-funfact-classic .single-funfact' => 'text-align: {{VALUE}};',
                    
				],
			]
        );//Responsive control end


      $this->end_controls_section();

      
		$this->start_controls_section(
			'section_count_number_style', [
				'label'	 => esc_html__( 'Counter number', 'buildbench' ),
				'tab'	 => Controls_Manager::TAB_STYLE,
			]
        );

      $this->add_control(
			'title_color', [
				'label'		 => esc_html__( 'Number color', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'default'   => 'black',
				'selectors'	 => [
					'{{WRAPPER}} .funfact-item-style > .funfact-item-list .funfact-title' => 'color: {{VALUE}};',
				],
			]
		);
      
      $this->add_group_control(Group_Control_Typography::get_type(),
         [
			'name'		 => 'number_typography',
			'selector'	 => '{{WRAPPER}} .funfact-item-style .funfact-item-list .funfact-title',
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
					'{{WRAPPER}} .funfact-item-style .funfact-item-list  p' => 'color: {{VALUE}};',
				],
			]
        );

    
      $this->add_group_control(Group_Control_Typography::get_type(),
         [
			 'name'		 => 'feature_content_typography',
			 'selector'	 => '{{WRAPPER}} .funfact-item-style .funfact-item-list .single-funfact p',
			]
		);

		$this->end_controls_section();

		//Icon Style Section
      $this->start_controls_section('section_icon_style',
         [
				'label'	 => esc_html__( 'Icon', 'buildbench' ),
				'tab'	   => Controls_Manager::TAB_STYLE,
			]
        );

        $this->add_control(
			'icon_color', [
				'label'		 => esc_html__( 'Icon color', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'default'   => 'black',
				'selectors'	 => [
					'{{WRAPPER}} .funfact-item-style > .funfact-item-list .single-funfact > i' => 'color: {{VALUE}};',
				],
			]
      );
      
      $this->add_group_control(Group_Control_Typography::get_type(),
      [
       'name'		 => 'icon_typography',
       'selector'	 => '{{WRAPPER}} .funfact-item-style > .funfact-item-list .single-funfact > i',
      ]
     );

      $this->end_controls_section();


		
    

    } //Register control end

    protected function render( ) { 

      $settings    = $this->get_settings();
  		$icon       = $settings["icon"];
		$number       = $settings["number"];
		$desc        = $settings["desc"];
      $style_fun = $settings["style_fun"];
      $style_fun_center = $settings["style_fun_center"];
      
    ?>
   
 	<div class="funfact-item-style <?php echo esc_attr( $style_fun ); ?>">
      <div class="funfact-item-list">   
         <div class="single-funfact <?php echo esc_attr($style_fun_center); ?>">
            <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
            <h3 class="funfact-title" data-counter="<?php echo esc_attr($number); ?>"> <?php echo esc_html($number); ?>
             <sup> <?php echo esc_html__('+','buildbench'); ?> </sup>
            </h3>
            <p><?php echo esc_html($desc); ?></p>
         </div>
      </div>   
    </div> 
    
    <?php  
    }
    protected function _content_template() { }
}