<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Buildbench_OwlSlider_Widget extends Widget_Base {

    public function get_name() {
        return 'buildbench-slider';
    }

    public function get_title() {
        return esc_html__( 'Buildbench Sliders', 'buildbench' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return ['buildbench-elements'];
    }

    protected function _register_controls() {
        
        $this->start_controls_section(
            'section_tab_style',
            [
                'label' => esc_html__('Buildbench Slider', 'buildbench'),
            ]
         );
         
         $this->add_control('slider_style',[
				'label' => esc_html__( 'Slider Style', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Full', 'buildbench' ),
				'label_off' => esc_html__( 'Box', 'buildbench' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
         );

         $this->add_control('buildbench_slider_nav_style',  [
            'label' => esc_html__( 'Slider content background', 'buildbench' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'transparent',
            'condition' => ['slider_style' => ''],
            'options' => [
               'transparent'  =>  'transparent',
               'rgba(255, 255, 255, 0.8)' => 'white',
            
          
            ],
            'selectors' => [
               '{{WRAPPER}} .hero-slider .features-slider .content-wrapper' => 'background: {{VALUE}};',
            
            ],
        
           ]
         );

         $this->add_control(
            'buildbench_slider_autoplay',
            [
               'label' => esc_html__( 'Autoplay', 'buildbench' ),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => esc_html__( 'Yes', 'buildbench' ),
               'label_off' => esc_html__( 'No', 'buildbench' ),
               'return_value' => 'yes',
               'default' => 'yes'
            ]
         );

         $this->add_control(
            'buildbench_slider_nav_show',
            [
               'label' => esc_html__( 'Nav show', 'buildbench' ),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'label_on' => esc_html__( 'Yes', 'buildbench' ),
               'label_off' => esc_html__( 'No', 'buildbench' ),
               'return_value' => 'yes',
               'default' => 'yes'
            ]
         );

         $this->add_control(
            'buildbench_slider_nav_classic',
            [
               'label' => esc_html__( 'Classic nav', 'buildbench' ),
               'type' => \Elementor\Controls_Manager::SWITCHER,
               'condition' => ['slider_style' => ''],
               'label_on' => esc_html__( 'Yes', 'buildbench' ),
               'label_off' => esc_html__( 'No', 'buildbench' ),
               'return_value' => 'yes',
               'default' => 'yes'
            ]
         );
         
         $this->add_control('buildbench_slider_alignment_box',  [
            'label' => esc_html__( 'Content Alignment', 'buildbench' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'text-center',
            'condition' => ['slider_style' => ''],
            'options' => [
               'text-left'  => esc_html__( 'Left', 'buildbench' ),
               'text-center' => esc_html__( 'Center', 'buildbench' ),
               'text-right' => esc_html__( 'Right', 'buildbench' ),
          
            ],
           ]
         );

         $this->add_control('buildbench_slider_alignment',  [
            'label' => esc_html__( 'Content Alignment', 'buildbench' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'mx-auto',
            'condition' => ['slider_style' => 'yes'],
            'options' => [
               'text-left'  => esc_html__( 'Left', 'buildbench' ),
               'mx-auto' => esc_html__( 'Center', 'buildbench' ),
          
            ],
           ]
         );
      
         
         $this->add_control(
            'buildbench_slider_items',
            [
                'label' => esc_html__('Buildbench Slider', 'buildbench'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'default' => [
                    [ 'name' => esc_html__(' Carousel #1', 'buildbench') ],
         
                ],
                'fields' => [
                 
                    [
                        'name' => 'buildbench_slider_title_top',
                        'label' => esc_html__('Slider Top title', 'buildbench'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('5 to 7 June 2019, Waterfront Hotel, London', 'buildbench'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'buildbench_slider_title',
                        'label' => esc_html__('Slider Title', 'buildbench'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('digital thinkers Meet', 'buildbench'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'buildbench_slider_description',
                        'label' => esc_html__('Slider Description ', 'buildbench'),
                        'type' => Controls_Manager::TEXTAREA,
                        'default' => esc_html__('How you transform your business as technology, consumer, habits industry dynamis change? Find out from those leading the charge.', 'buildbench'),
                        'label_block' => true,
                      
                    ],
                    [
                        'name' => 'buildbench_slider_bg_image',
                        'label' => esc_html__('Background Image', 'buildbench'),
                        'type' => Controls_Manager::MEDIA,
                        'default' => [
                           'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                        'label_block' => true,
                        'separator'=>'after',
                    ],
                    [
                        'name' => 'buildbench_button_one_text',
                        'label' => esc_html__('Button #1 Text', 'buildbench'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Button one', 'buildbench'),
                        'label_block' => true,
                    ],
                    [
                    'name' => 'buildbench_button_one',
                    'label' => esc_html__( 'Button #1', 'buildbench' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'label_block' => true,
                    'separator'=>'after', 
                    'separator'=>'before',                      
                     ],

                    [
                        'name' => 'buildbench_button_two_text',
                        'label' => esc_html__('Button #2 Text', 'buildbench'),
                        'type' => Controls_Manager::TEXT,
                        'default' => esc_html__('Button Two', 'buildbench'),
                        'label_block' => true,
                    ],
                    [
                        'name' => 'buildbench_button_two',
                        'label' => esc_html__( 'Button #2', 'buildbench' ),
                        'type' => \Elementor\Controls_Manager::URL,
                        'label_block' => true,
                        'separator'=>'after', 
                        'separator'=>'before',                      
                     ],
                     [ 
                        'name' => 'buildbench_align_text',
                        'label' => esc_html__( 'Content Alignment', 'buildbench' ),
                        'type' => \Elementor\Controls_Manager::SELECT,
                        'default' => 'mx-auto',
                        'options' => [
                           'mr-auto'  => esc_html__( 'Left', 'buildbench' ),
                           'mx-auto' => esc_html__( 'Center', 'buildbench' ),
                           'ml-auto text-right' => esc_html__( 'Right', 'buildbench' ),
                     
                        ],
            ]       //
        
                ],
            ]
        );
       
      $this->end_controls_section();

        //style
      $this->start_controls_section('style_section',[
				'label' => esc_html__( 'Content Section', 'buildbench' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
      ); 

  

         $this->add_responsive_control(
         'slider_item_height',
         [
            'label' => esc_html__('Slider height', 'buildbench'),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'px' ,'em'],
            'range' => [
               'px' => [
                  'min' => 0,
                  'max' => 1000,
                 
               ],
               'em' => [
                  'min' => 0,
                  'max' => 1000,
               ],
            ],
            'default' => [
               'unit' => 'px',
               'size' => 800,
            ],
            'selectors' => [
            
               '{{WRAPPER}} .features-slider .slider-item' => 'height: {{SIZE}}{{UNIT}};',
               '{{WRAPPER}} .hero-slider .features-slider .slider-content-box' => 'height: {{SIZE}}{{UNIT}};',
            ],
         ]
      );


      $this->add_control('slide_top_title_color',[
            'label' => esc_html__('Top title color', 'buildbench'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
               '{{WRAPPER}} .slider-item .slider-content .slider-sub-title' => 'color: {{VALUE}};',
               '{{WRAPPER}} .slider-item .slider-content .slider-sub-title > sup' => 'background-color: {{VALUE}};'
            
            ],
         ]
      );

      $this->add_control('slide_title_color',[
             'label' => esc_html__('Title color', 'buildbench'),
             'type' => Controls_Manager::COLOR,
             'default' => '',
             'selectors' => [
                  '{{WRAPPER}} .slider-content .slider-title ' => 'color: {{VALUE}};',
                  '{{WRAPPER}} .features-slider-classic .slider-content .content-wrapper .slider-title  ' => 'color: {{VALUE}};',
              
             ],
         ]
        );
       
      $this->add_control('slide_content_color',[
            'label' => esc_html__('Description color', 'buildbench'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
               '{{WRAPPER}} .slider-item .slider-content p' => 'color: {{VALUE}};',
            
            ],
         ]
      );

      $this->add_group_control(Group_Control_Typography::get_type(), [
         'name'	 => 'buildbench_content_typography',
         'label'    => esc_html__('Content typpgraphy', 'buildbench'),
         'selector'	 => '{{WRAPPER}} .slider-item .slider-content p',
         ]
      );

      $this->add_group_control(Group_Control_Typography::get_type(), [
         'name'	 => 'buildbench_title_c_typography',
         'label'    => esc_html__('Title typpgraphy', 'buildbench'),
         'selector'	 => '{{WRAPPER}} .slider-item .slider-content .slider-title,{{WRAPPER}} .slider-content .content-wrapper .slider-title',
         ]
      );
   
      $this->end_controls_section();  

      $this->start_controls_section('button_one_section',[
            'label' => esc_html__( 'Button one Section', 'buildbench' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         ]
     ); 

      $this->add_control('slide_button_text_color',[
            'label' => esc_html__('Text color', 'buildbench'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
               '{{WRAPPER}} .slider-content a.btn:first-child' => 'color: {{VALUE}};',
               '{{WRAPPER}} .slider-content a.btn:first-child i' => 'color: {{VALUE}};',
            ],
         ]
     );
      
     $this->add_control('slide_button_text_hover_color',[
      'label' => esc_html__('Text hover color', 'buildbench'),
      'type' => Controls_Manager::COLOR,
      'default' => '',
      'selectors' => [
            '{{WRAPPER}} .slider-content a.btn:first-child:hover' => 'color: {{VALUE}};',
            '{{WRAPPER}} .slider-content a.btn:first-child:hover i' => 'color: {{VALUE}};',
         ],
      ]
    );

      $this->add_control('slide_button_bg_color',[
            'label' => esc_html__('Background ', 'buildbench'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
               '{{WRAPPER}} .slider-content a.btn:first-child' => 'background-color: {{VALUE}};',
        
            ],
         ]
     );

     
      $this->add_control('slide_button_border_bg_color',[
            'label' => esc_html__('Border', 'buildbench'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'selectors' => [
 
               '{{WRAPPER}} .slider-content a.btn:first-child' => 'border-color: {{VALUE}};',
            ],
         ]
      );

      $this->end_controls_section();  

      $this->start_controls_section('button_two_section',[
            'label' => esc_html__( 'Button two Section', 'buildbench' ),
            'tab'   => Controls_Manager::TAB_STYLE,
         ]
      ); 

      $this->add_control('slide_button_two_text_color',[
            'label' => esc_html__('Text color ', 'buildbench'),
            'type' => Controls_Manager::COLOR,
            'default' => '',
            'condition' => ['slider_style' => 'yes'],
            'description'=> esc_html__('Full slider','buildbench'),
            'selectors' => [
                '{{WRAPPER}} .slider-content a.slider-btn-2' => 'color: {{VALUE}};',
              ],
         ]
      );

      $this->add_control('slide_button_two_box_text_color',[
         'label' => esc_html__('Text color', 'buildbench'),
         'type' => Controls_Manager::COLOR,
         'default' => '',
         'condition' => ['slider_style' => ''],
         'selectors' => [
                   '{{WRAPPER}} .content-wrapper .slider-btn-2' => 'color: {{VALUE}} !important;',
         ],
      ]
   );

      $this->add_control('slide_button_two_text_hover_color',[
         'label' => esc_html__('Text hover color', 'buildbench'),
         'type' => Controls_Manager::COLOR,
         'condition' => ['slider_style' => 'yes'],
         'description'=> esc_html__('Full width slider','buildbench'),
         'default' => '',
         'selectors' => [
                '{{WRAPPER}} .slider-content a.slider-btn-2:hover' => 'color: {{VALUE}}!important; ',
              ],
         ]
      );

         $this->add_control('slide_button_two_box_text_hover_color',[
            'label' => esc_html__('Text hover color', 'buildbench'),
            'type' => Controls_Manager::COLOR,
            'condition' => ['slider_style' => ''],
            'default' => '',
            'selectors' => [
                 '{{WRAPPER}} .content-wrapper .slider-btn-2:hover' => 'color: {{VALUE}} !important;',
                 '{{WRAPPER}} .content-wrapper .slider-btn-2:hover i' => 'color: {{VALUE}} !important;',
            ],
         ]
      );

      $this->add_control('slide_button_two_bg_color',[
            'label' => esc_html__('Background ', 'buildbench'),
            'type' => Controls_Manager::COLOR,
            'condition' => ['slider_style' => 'yes'],
            'description'=> esc_html__('Full width slider','buildbench'),
            'default' => '',
            'selectors' => [
               '{{WRAPPER}} .slider-content a.slider-btn-2' => 'background: {{VALUE}};border-color: {{VALUE}};',
            ],
         ]
      );

      $this->add_control('slide_button_box_two_bg_color',[
         'label' => esc_html__('Background ', 'buildbench'),
         'type' => Controls_Manager::COLOR,
         'condition' => ['slider_style' => ''],
         'default' => '',
         'selectors' => [
             
               '{{WRAPPER}} .content-wrapper a.slider-btn-2' => 'background-color: {{VALUE}};border-color:{{VALUE}};',
            
            ],
         ]
      );

      
      $this->add_control('slide_button_box_two_hover_bg_color',[
         'label' => esc_html__('Background hover', 'buildbench'),
         'type' => Controls_Manager::COLOR,
         'condition' => ['slider_style' => ''],
         'default' => '',
         'selectors' => [
             
               '{{WRAPPER}} .content-wrapper a.slider-btn-2:hover' => 'background: {{VALUE}}; border-color:{{VALUE}}',
            
            ],
         ]
      );

      $this->add_control('slide_button_box_two_bg_hover_color',[
         'label' => esc_html__('Background hover', 'buildbench'),
         'type' => Controls_Manager::COLOR,
         'condition' => ['slider_style' => 'yes'],
         'description'=> esc_html__('Full width slider','buildbench'),
         'default' => '',
         'selectors' => [
            
               '{{WRAPPER}} .slider-content a.slider-btn-2:hover' => 'background: {{VALUE}};border-color: {{VALUE}};',
             
            
            ],
         ]
      );
 
      $this->end_controls_section();  

    }

    protected function render( ) {

        $settings          = $this->get_settings();
        $buildbench_slider = $settings['buildbench_slider_items'];
        $buildbench_slider_autoplay = $settings['buildbench_slider_autoplay'];
        $alignment         = $settings['buildbench_slider_alignment'];
        $buildbench_slider_nav_show         = $settings['buildbench_slider_nav_show'];
        $alignment_box     = $settings['buildbench_slider_alignment_box'];
        $nav_classic       = $settings['buildbench_slider_nav_classic'];
        $slider_content    = $settings['buildbench_slider_nav_style'] == 'transparent'? 'btn-border':'btn-border-dark';
       
        $style             = $settings["slider_style"]=='yes'?'full':'box';
        $slide_controls = [
              
         'slide_autoplay'=>$buildbench_slider_autoplay, 
         'slider_nav_show'=>$buildbench_slider_nav_show, 
         ];
         $slide_controls = \json_encode($slide_controls); 
      
       
    ?>
     <?php if($style=="full"): ?>
       <div data-controls="<?php echo esc_attr($slide_controls); ?>" id="hero-slider" class="hero-slider owl-carousel features-slider">
         <?php  foreach ($buildbench_slider as $key => $value): ?>
         <?php  $img  = $value['buildbench_slider_bg_image']['url']; ?>
        
           <div class="slider-item" style="background-image: url(<?php echo esc_url($img); ?>);">
            <div class="hero-table">
                <div class="hero-table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 <?php echo esc_attr($value["buildbench_align_text"]); ?>">
                                <div class="slider-content">
                                    <span class="slider-sub-title"> 
                                       <?php echo esc_html($value["buildbench_slider_title_top"]) ?> 
                                       <sup></sup>
                                    </span>
                                    <h1 class="slider-title">
                                       <?php
                                       echo esc_html($value["buildbench_slider_title"]);
                                    
                                       ?> 
                                    </h1>
                                    <p>
                                      <?php echo buildbench_kses($value["buildbench_slider_description"]) ?> 
                                    </p>
                                    <div class="btn-area">
                                       <?php if (!empty($value["buildbench_button_one_text"]) ): ?>
                                        <a
                                           href="<?php echo esc_url($value['buildbench_button_one']['url']); ?>" 
                                           class="btn btn-primary slider-btn-1" 
                                           target="<?php echo esc_attr($value['buildbench_button_one']['is_external']=='on'?'_blank':'_self'); ?>" 
                                           rel="<?php echo esc_attr($value['buildbench_button_one']['nofollow']=='on'?'nofollow':''); ?>" 
                                           >
                                           <?php echo esc_html($value['buildbench_button_one_text']); ?>
                                            <i class="icon icon-arrow-right"></i>
                                        </a>
                                        <?php endif; ?>
                                        <?php if (!empty($value["buildbench_button_two_text"]) ): ?>
                                        <a
                                           href="<?php echo esc_url($value['buildbench_button_two']['url']); ?>" 
                                           class="btn btn-border slider-btn-2"
                                           target="<?php echo esc_attr($value['buildbench_button_two']['is_external']=='on'?'_blank':'_self'); ?>" 
                                           rel="<?php echo esc_attr($value['buildbench_button_two']['nofollow']=='on'?'nofollow':''); ?>"
                                            >
                                        <?php echo esc_html($value['buildbench_button_two_text']); ?>
                                            <i class="icon icon-arrow-right"></i>
                                        </a>
                                        <?php endif; ?>

                                    </div>
                                </div> <!-- slider content end-->
                            </div> <!-- col end-->
                        </div> <!-- row end-->
                    </div>
                    <!-- container end -->
                </div>
                <!-- hero table cell end -->
            </div>
            <!-- hero table end -->
           </div>
      
     
         <?php  endforeach; ?>
       
      </div>
      <?php endif; ?>

      <?php if($style=="box"): ?>
      <div id="hero-slider" class="hero-slider">
         <div data-controlsbox="<?php echo esc_attr($slide_controls); ?>"  class="slide-control owl-carousel <?php echo esc_attr($nav_classic=="yes"?"features-slider-classic":"features-slider"); ?>" id="<?php echo esc_attr($nav_classic=="yes"?"features-slider-classic":"features-slider"); ?>">
         <?php  foreach ($buildbench_slider as $key => $value): ?>
         <?php  $img  = $value['buildbench_slider_bg_image']['url']; ?>
               <div class="slider-content slider-content-box" style="background-image: url(<?php echo esc_url($img); ?>)">
                     <div class="content-wrapper">
                        <h1 class="slider-title"> <?php  echo esc_html($value["buildbench_slider_title"]); ?>  </h1>
                        <?php if (!empty($value["buildbench_button_one_text"]) ): ?>
                                        <a
                                           href="<?php echo esc_url($value['buildbench_button_one']['url']); ?>" 
                                           class="btn btn-primary slider-btn-1" 
                                           target="<?php echo esc_attr($value['buildbench_button_one']['is_external']=='on'?'_blank':'_self'); ?>" 
                                           rel="<?php echo esc_attr($value['buildbench_button_one']['nofollow']=='on'?'nofollow':''); ?>" 
                                           >
                                           <?php echo esc_html($value['buildbench_button_one_text']); ?>
                                            <i class="icon icon-arrow-right"></i>
                                        </a>
                        <?php endif; ?>
                     
                        <?php if (!empty($value["buildbench_button_two_text"]) ): ?>
                                        <a
                                           href="<?php echo esc_url($value['buildbench_button_two']['url']); ?>" 
                                           class="slider-btn-2 btn <?php echo esc_attr($slider_content); ?> "
                                           target="<?php echo esc_attr($value['buildbench_button_two']['is_external']=='on'?'_blank':'_self'); ?>" 
                                           rel="<?php echo esc_attr($value['buildbench_button_two']['nofollow']=='on'?'nofollow':''); ?>"
                                            >
                                        <?php echo esc_html($value['buildbench_button_two_text']); ?>
                                            <i class="icon icon-arrow-right"></i>
                                        </a>
                        <?php endif; ?>
                     </div><!-- content wrapper end -->
               </div><!-- slider content end -->
         <?php  endforeach; ?> 
         </div>
      </div>


      <?php endif; ?>
      
      <?php
    }

    protected function _content_template() { }
}