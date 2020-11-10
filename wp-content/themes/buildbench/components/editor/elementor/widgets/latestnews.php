<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;

class Buildbench_Latestnews_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-latestnews';
    }

    public function get_title() {
        return esc_html__( 'Latest News', 'buildbench' );
    }

    public function get_icon() { 
        return 'eicon-posts-grid';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() {
		$this->start_controls_section(
			'section_tab', [
				'label' => esc_html__( 'Latest Post', 'buildbench' ),
			]
        );
      
      $this->add_control(
         'post_style',
         [
             'label'     => esc_html__('Post style', 'buildbench'),
             'type' => \Elementor\Controls_Manager::SELECT,
             'default' => '',
             'options' => [
                'ts-latest-news-standard'  => esc_html__( 'Standard', 'buildbench' ),
                ''                         => esc_html__( 'Classic', 'buildbench' ),
             ],
            
         ]
      ); 
      
      $this->add_control(
         'post_count',
                     [
                        'label'         => esc_html__( 'Post count', 'buildbench' ),
                        'type'          => Controls_Manager::NUMBER,
                        'default'       => '3',

                     ]
        );

        
      $this->add_control(
			'post_orderby',
			[
				'label' => esc_html__( 'Post order', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'DESC'  => esc_html__( 'Desc', 'buildbench' ),
					'ASC' => esc_html__( 'Asc', 'buildbench' ),
					
				],
			]
      );
      

      $this->add_control('post_category',
        [
           'label'     => esc_html__( 'Category', 'buildbench' ),
           'type'      => \Elementor\Controls_Manager::SELECT2,
           'multiple'  => true,
           'default'   => 'all',
           'options'   => $this->getCategories(),
        
        ]
       ); 

      $this->add_control(
			'post_col',
			[
				'label'   => esc_html__( 'Post Column', 'buildbench' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'3'  => esc_html__( '4 Column ', 'buildbench' ),
					'4'  => esc_html__( '3 Column', 'buildbench' ),
					'6'  => esc_html__( '2 Column', 'buildbench' ),
			
				],
			]
		);
      $this->add_control(
         'post_title_crop',
         [
           'label'         => esc_html__( 'Title limit', 'buildbench' ),
           'type'          => Controls_Manager::NUMBER,
           'default'       => '3',
           
         ]
       ); 
       
      $this->add_control(
         'show_desc',
         [
             'label'     => esc_html__('Show desc', 'buildbench'),
             'type'      => Controls_Manager::SWITCHER,
             'label_on'  => esc_html__('Yes', 'buildbench'),
             'label_off' => esc_html__('No', 'buildbench'),
             'default'   => 'yes',
            
         ]
      ); 
       
      $this->add_control('desc_limit',
            [
              'label'         => esc_html__( 'Description limit', 'buildbench' ),
              'type'          => Controls_Manager::NUMBER,
              'default'       => '10',
              'condition'     => [ 
                 'show_desc' => ['yes'] 
               ],
              
            ]
          );   
    
      $this->add_control('show_date',
            [
                'label'     => esc_html__('Show Date', 'buildbench'),
                'type'      => Controls_Manager::SWITCHER,
                'label_on'  => esc_html__('Yes', 'buildbench'),
                'label_off' => esc_html__('No', 'buildbench'),
                'default'   => 'yes',
            ]
        ); 
      $this->add_control(
         'show_cat',
               [
                  'label'     => esc_html__('Show Category', 'buildbench'),
                  'type'      => Controls_Manager::SWITCHER,
                  'label_on'  => esc_html__('Yes', 'buildbench'),
                  'label_off' => esc_html__('No', 'buildbench'),
                  'default'   => 'no',
         
               ]
      );

      $this->add_control(
         'show_readmore',
         [
             'label'     => esc_html__('Show readmore', 'buildbench'),
             'type' => \Elementor\Controls_Manager::SELECT,
             'default' => 'block-inline',
             'options' => [
                'block-inline'  => esc_html__( 'Show', 'buildbench' ),
                'none'   => esc_html__( 'Hide', 'buildbench' ),
             ],
            'selectors' => [
                '{{WRAPPER}} .ts-latest-news .single-latest-news .btn-link' => 'display: {{VALUE}};',
             ],
            
         ]
      ); 

      $this->add_responsive_control(
			'post_content_align', [
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
                  '{{WRAPPER}} .ts-latest-news .single-latest-news' => 'text-align: {{VALUE}};',
            
				],
			]
        );//Responsive control end
       
      $this->end_controls_section();
      
      $this->start_controls_section('style_section',
			[
				'label' => esc_html__( 'Style', 'buildbench' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
      );
      
      $this->add_control(
			'post_color_sep',
			[
				'label' => esc_html__( 'Post color', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				
			]
		);
      
    
      $this->add_control(
         'post_text_color',
         [
             'label' => esc_html__('Title color', 'buildbench'),
             'type' => Controls_Manager::COLOR,
             'default' => '',
             'selectors' => [
                  '{{WRAPPER}} .ts-latest-news .single-latest-news .ts-post-title a' => 'color: {{VALUE}};',
             ],
         ]
        );

      $this->add_control(
         'post_text_color_hover',
         [
             'label'     => esc_html__('Title hover', 'buildbench'),
             'type'      => Controls_Manager::COLOR,
             'default'   => '',
             'selectors' => [
               '{{WRAPPER}}  .ts-latest-news .single-latest-news .ts-post-title a:hover' => 'color: {{VALUE}};',
           
             ],
         ]
        );

        $this->add_control(
         'post_content_color',
         [
             'label' => esc_html__('Description color', 'buildbench'),
             'type' => Controls_Manager::COLOR,
             'default' => '',
             'selectors' => [
                  '{{WRAPPER}} .ts-latest-news .single-latest-news p' => 'color: {{VALUE}};',
             ],
         ]
        );

        $this->add_control(
         'post_readmore_color',
         [
             'label' => esc_html__('Read more color', 'buildbench'),
             'type' => Controls_Manager::COLOR,
             'default' => '',
             'selectors' => [
                  '{{WRAPPER}} .ts-latest-news .single-latest-news .btn-link' => 'color: {{VALUE}};',
             ],
         ]
        );

    

        $this->add_control(
			'post_border_sep',
			[
				'label' => __( 'Post border', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
     
    

      $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'post_border',
				'label' => esc_html__( 'Post border', 'buildbench' ),
				'selector' => '{{WRAPPER}} .ts-latest-news .single-latest-news',
			]
      );

  
      $this->add_control(
			'post_content_border_sep',
			[
				'label' => esc_html__( 'Post content border', 'buildbench' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
     
      
      $this->add_group_control(
			Group_Control_Border::get_type(),
            [
               'name' => 'post_content_border',
               'label' => esc_html__( 'Post content border', 'buildbench' ),
               'selector' => '{{WRAPPER}} .ts-latest-news .single-latest-news .single-news-content',
            ]
		);
  
      $this->end_controls_section();  
    } 

    protected function render() {

     
    $settings        = $this->get_settings();
    $post_title_crop = $settings["post_title_crop"];
    $show_desc       = $settings["show_desc"];
    $desc_limit      = $settings["desc_limit"];
    $post_count      = $settings["post_count"];
    $show_date       = $settings["show_date"];
    $show_cat        = $settings["show_cat"];
    $post_style      = $settings["post_style"];
    $post_orderby    = $settings['post_orderby'];
    $post_col        = $settings["post_col"];
    $post_category   = $settings["post_category"];

    $args = array(
        'numberposts'      => $post_count,
        'orderby'          => 'post_date',
        'order'            => 'DESC',
        'post_type'        => 'post',
        'category__in'    =>  $post_category,
        'post_status'      => 'publish',
      
    );

    $args['order'] = $post_orderby;
    $recent_posts = wp_get_recent_posts( $args, ARRAY_A );
 
    ?>
      <div class="row ts-latest-news <?php echo esc_attr($post_style); ?> ">
            <?php  foreach( $recent_posts as $recent):   ?>
                  <div class="col-md-<?php echo esc_attr($post_col); ?>" >
                        <div class="single-latest-news">
                          <?php if(has_post_thumbnail($recent['ID'])): ?>
                              <div class="latest-news-img">
                                 <a href="<?php echo esc_url(get_permalink($recent["ID"])); ?>">
                                       <img src="<?php echo esc_url(get_the_post_thumbnail_url( $recent['ID'], 'large' )); ?>" alt="<?php echo wp_trim_words( wp_kses($recent["post_title"],['p']), $post_title_crop, '');  ?>">
                                 </a>         
                              </div>
                           <?php endif; ?>   
                           <div class="single-news-content">
                           <div class="post-meta-info">
                           <?php if($show_cat=='yes'): ?>
                                 <span class="category-info">
                                    <i class="icon icon-book-open"></i>
                                    <?php
                                       $cats= get_the_category_list( ', ' ,'', $recent["ID"]);

                                       echo trim($cats,' " ');
                                    ?>
                                 </span>
                                 <?php endif; ?> 
                                 <span class="date-info"><i class="icon icon-clock"></i> 
                                    <?php echo esc_html($show_date=='yes'?date('d/m/Y', strtotime($recent["post_date"])):'');  ?> 
                                 </span>
                            </div>
                              <h3 class="ts-post-title"><a href="<?php echo esc_url(get_permalink($recent["ID"])); ?>"><?php echo wp_trim_words( wp_kses($recent["post_title"],['p']), $post_title_crop, '');  ?></a></h3>
                              <?php if($show_desc=="yes"): ?>
                                  <p> 
                                     <?php echo wp_trim_words( wp_kses($recent["post_content"],['p']), $desc_limit, '');  ?>  
                                   
                                  </p>
                              <?php endif; ?> 
                              <a href="<?php echo esc_url(get_permalink($recent["ID"])); ?>" class="btn btn-link"> <?php esc_html_e('Read More','buildbench'); ?> <i class="icon icon-arrow-right"></i> </a>
                           </div>
                        </div>
                     </div>
            <?php endforeach; ?> 
      </div> <!-- row end -->
   <?php 
    wp_reset_query();
    }

    public function getCategories(){
      
      $terms = get_terms( array(
                  'taxonomy'    => 'category',
                  'hide_empty'  => false,
                  'posts_per_page' => -1, 
          ) );

      
      $cat_list = [];
    
      foreach($terms as $post) {
     
          $cat_list[$post->term_id]  = [$post->name];
      }
      
      return $cat_list;

  } 

}