<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Buildbench_Title_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-title';
    }

    public function get_title() {
        return esc_html__( 'Title', 'buildbench' );
    }

    public function get_icon() { 
        return 'eicon-type-tool';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Title settings', 'buildbench'),
            ]
        );
        $this->add_control(
			'sub_title', [
				'label'			  => esc_html__( 'Sub heading text', 'buildbench' ),
				'type'			  => Controls_Manager::TEXT,
				'label_block'	  => true,
				'placeholder'    => esc_html__( 'Why choose us', 'buildbench' ),
				'default'	     => esc_html__( 'why choose us', 'buildbench' ),
				
			]
      );

        $this->add_control(
			'title', [
				'label'			  => esc_html__( 'Heading  text', 'buildbench' ),
				'type'			  => Controls_Manager::TEXT,
				'label_block'	  => true,
				'placeholder'    => esc_html__( 'Why choose us', 'buildbench' ),
				'default'	     => esc_html__( 'why choose us', 'buildbench' ),
				
			]
      );

   
      
      $this->add_control(
        'heading_type',
        [
            'label' => esc_html__( 'Heading type', 'buildbench' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'h2',
            'options' => [
                'h1'  => esc_html__( 'H1', 'buildbench' ),
                'h2' => esc_html__( 'H2', 'buildbench' ),
                'h3' => esc_html__( 'H3', 'buildbench' ),
                'h4' => esc_html__( 'H4', 'buildbench' ),
                'h5' => esc_html__( 'H5', 'buildbench' ),
                'h6' => esc_html__( 'H6', 'buildbench' ),
                'p' => esc_html__( 'P', 'buildbench' ),
            ],
        ]
    );

     
        
        $this->add_responsive_control(
			'title_align', [
				'label'			 => esc_html__( 'Alignment', 'buildbench' ),
				'type'			 => Controls_Manager::CHOOSE,
				'options'		 => [

               'left'		 => [
                  
                  'title'	 => esc_html__( 'Left', 'buildbench' ),
						'icon'	 => 'fa fa-align-left',
               
               ],
				'center'	     => [
                  
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
                     '{{WRAPPER}} .section-heading-content .section-title' => 'text-align: {{VALUE}};',

				],
			]
        );//Responsive control end
        $this->end_controls_section();

       
        
        //Title Style Section
		$this->start_controls_section(
			'section_title_style', [
				'label'	 => esc_html__( 'Title', 'buildbench' ),
				'tab'	    => Controls_Manager::TAB_STYLE,
			]
        );
        $this->add_control(
			'show_title_border', [
				'label'			  => esc_html__( 'Title border style', 'buildbench' ),
				'type'			  => Controls_Manager::SWITCHER,
            'label_on'       => esc_html__( 'Show', 'buildbench' ),
				'label_off'      => esc_html__( 'Hide', 'buildbench' ),
				'default'        => 'no',
				
			]
      );

      $this->add_control(
        'title_border_color', [

            'label'		 => esc_html__( 'ttle border style color', 'buildbench' ),
            'type'		 => Controls_Manager::COLOR,
            'condition' => [ 'show_title_border' => ['yes'] ],
            'selectors'	 => [
               '{{WRAPPER}} .section-heading-content .section-title .section-bar' => 'background: {{VALUE}};',
            ],
        ]
      );


      $this->add_control(
			'sub_title_color', [

				'label'		 => esc_html__( 'Sub Title color', 'buildbench' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [

               '{{WRAPPER}} .section-heading-content .section-title .sub-title' => 'color: {{VALUE}};',
               
				],
			]
        );
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'content_typography',
				'label' => esc_html__( 'Sub title', 'buildbench' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            
               'selector' => '{{WRAPPER}} .section-heading-content .section-title .sub-title',
			]
        );
        
        $this->add_control(
			'title_color', [

				'label'		 => esc_html__( 'Title color', 'buildbench' ),
				'type'		 => Controls_Manager::COLOR,
				'selectors'	 => [

               '{{WRAPPER}} .section-heading-content .section-title' => 'color: {{VALUE}};',
				],
			]
        );



        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => esc_html__( 'Main title', 'buildbench' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
            
               'selector' => '{{WRAPPER}} .section-heading-content .section-title',
			]
		);
        

    } //Register control end

    protected function render( ) { 

		$settings             = $this->get_settings();
		$title                = $settings['title'];
		$sub_title            = $settings['sub_title'];
      $show_title_border    = $settings['show_title_border'];
      $title_align          = $settings['title_align'];
      $heading_type         = $settings['heading_type'];
     
      $title_1  = str_replace(['{', '}'], ['<span>', '</span>'], $title); 
      
    ?>
         <div class="section-heading-content">
            <<?php echo esc_attr( $heading_type); ?> class="section-title">
                <span class="sub-title"><?php echo esc_html($sub_title); ?></span>
                 <?php echo wp_kses_post($title_1); ?>
                 <?php if($show_title_border=='yes'): ?>
                 <span class="section-bar <?php echo esc_attr( $title_align); ?>"></span>
                <?php endif; ?>
            </<?php echo esc_attr( $heading_type); ?>>
         </div><!-- Section title -->		

     
    <?php  

    }
    
    protected function _content_template() { }
}