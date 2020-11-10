<?php

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit;


class Buildbench_Project_Widget extends Widget_Base {


    public $base;

    public function get_name() {
        return 'buildbench-project';
    }

    public function get_title() {
        return esc_html__( 'Projects ', 'buildbench' );
    }

    public function get_icon() { 
        return 'eicon-sitemap';
    }

    public function get_categories() {
        return [ 'buildbench-elements' ];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'section_tab',
            [
                'label' => esc_html__('Projects settings', 'buildbench'),
            ]
        );

        
      $this->add_control(
			'project_style',
			[
				'label' => esc_html__( 'Project Style', 'buildbench' ),
				'type' => Custom_Controls_Manager::IMAGECHOOSE,
				'default' => 'style1',
				'options' => [
					'style1' => [
						      'title'      => esc_html__( ' Style 1 ', 'buildbench' ),
                        'imagelarge' =>  BUILDBENCH_IMG. '/style/projects/style1.png',
                        'imagesmall' =>  BUILDBENCH_IMG. '/style/projects/style1.png',
                        'width' => '30%',
				   	],
              	'style2' => [
						      'title'      => esc_html__( ' Style 2', 'buildbench' ),
                        'imagelarge' =>  BUILDBENCH_IMG. '/style/projects/style2.png',
                        'imagesmall' =>  BUILDBENCH_IMG. '/style/projects/style2.png',
                        'width'      => '30%',
				   	],  				
        
            	],
			]
        );
     
      $this->add_control('project_count',
            [
               'label'         => esc_html__( 'Project count', 'buildbench' ),
               'type'          => Controls_Manager::NUMBER,
               'default'       => '3',
            ]
       );
        
      $this->add_control('project_category',
               [
                  'label'     => esc_html__( 'Category', 'buildbench' ),
                  'type'      => \Elementor\Controls_Manager::SELECT,
                  'default'   => 'all',
                  'options'   => $this->getCategories(),
               
               ]
      );
        
      $this->add_control('show_readmore',
            [
               'label'     => esc_html__('Show Readmore', 'buildbench'),
               'type'      => Controls_Manager::SWITCHER,
               'label_on'  => esc_html__('Yes', 'buildbench'),
               'label_off' => esc_html__('No', 'buildbench'),
               'default'   => 'yes',
         

            ]
        );
        
      $this->add_control('show_filter',
            [
               'label'     => esc_html__('Show Filter', 'buildbench'),
               'type'      => Controls_Manager::SWITCHER,
               'label_on'  => esc_html__('Yes', 'buildbench'),
               'label_off' => esc_html__('No', 'buildbench'),
               'default'   => 'yes',
               'condition' =>["project_style"=>["style1"] ],
         

            ]
        ); 
       
      $this->end_controls_section();

      $this->start_controls_section('style_section',
            [
               'label' => esc_html__( 'Style Section', 'buildbench' ),
               'tab'   => Controls_Manager::TAB_STYLE,
            ]
        ); 

      $this->add_control('project_text_color',
            [
               'label'    => esc_html__('Title color', 'buildbench'),
               'type'     => Controls_Manager::COLOR,
               'selectors'   => [
                     '{{WRAPPER}} .single-recent-work .recet-work-footer .ts-project-el-title' => 'color: {{VALUE}};',
                  ],
            ]
         );



      $this->add_control('project_text_color_hover',
         [
            'label'     => esc_html__('Title hover', 'buildbench'),
            'type'      => Controls_Manager::COLOR,
            'selectors' => [
             
                  '{{WRAPPER}}  .single-recent-work .recet-work-footer .ts-project-el-title:hover' => 'color: {{VALUE}};',
            
            ],
         ]
      );

         $this->add_control('project_zone_text_color',
         [
            'label'    => esc_html__('Zone color', 'buildbench'),
            'type'     => Controls_Manager::COLOR,
            'selectors'   => [
                  '{{WRAPPER}} .single-recent-work .recet-work-footer h4 .ts-project-el-zone' => 'color: {{VALUE}};',
               ],
         ]
        );
        $this->add_control('project_readmore_icon_color',
        [
           'label'    => esc_html__('Read more color', 'buildbench'),
           'type'     => Controls_Manager::COLOR,
           'selectors'   => [
                 '{{WRAPPER}} .single-recent-work .link-more i' => 'color: {{VALUE}};',
              ],
        ]
       );

       $this->add_control('project_readmore_icon_bg',
       [
          'label'    => esc_html__('Read more bg-color', 'buildbench'),
          'type'     => Controls_Manager::COLOR,
          'selectors'   => [
                '{{WRAPPER}} .single-recent-work .link-more ' => 'background: {{VALUE}};',
             ],
       ]
      );

       $this->add_group_control(Group_Control_Typography::get_type(), 
            [
            'name'		 => 'buildbench_project_navigation_typography',
            'label'    => esc_html__('Navigation Typhography', 'buildbench'),
            'selectors'	 => [
                     '{{WRAPPER}} .ts-mix-projects .single-recent-work .recet-work-footer .ts-project-el-title',
                  
                  ]
            ]
         );

         $this->add_group_control(Group_Control_Typography::get_type(), 
         [
           'name'		 => 'buildbench_project_title_typography',
           'label'    => esc_html__('Title Typhography', 'buildbench'),
           'selector'	 => 
                  '{{WRAPPER}} .single-recent-work .recet-work-footer h4.ts-project-el-title',
                 
         ]
       );


         $this->end_controls_section();  
      }
      protected function render( ) { 
        
         $settings      = $this->get_settings();
         $project_cat   = $settings["project_category"];
         $project_count = $settings["project_count"];
         $show_readmore = $settings["show_readmore"];
         $project_style = $settings["project_style"];
         $show_filter   = $settings["show_filter"];
       
        
         $args = array(
            'numberposts'    => $project_count,
            'orderby'        => 'post_date',
            'order'          => 'DESC',
            'post_type'      => 'ts-projects',
            'post_status'    => 'publish',
            'tax_query'      => [],
          
        );
     
        if($project_cat!='all'){
            $args["tax_query"]  = array(
                array(
                    'taxonomy' => 'ts-project-cat',
                    'field'    => 'slug',
                    'terms'    => array($project_cat)
                )
            );
        }  
    
        $project_list = get_posts( $args );

       ?>
       <?php if($project_style=="style1"): ?>
         <div class="container">
            <div class="row">
                <div class="col-lg-12">
                   <?php if($show_filter=="yes"): ?>
                        <div class="recent-folio-menu">
                           <ul>
                              <?php foreach($this->getCategories() as $key=>$category): ?>
                                 <?php if($key=="all"): ?>
                                    <li class="active filter" data-filter="all"> <?php echo esc_html__('All Projects','buildbench'); ?> </li>
                                 <?php else: ?>
                                    <li class="filter" data-filter="<?php echo esc_attr('.'.$key); ?>"><?php echo esc_html($category[0]); ?></li>
                                 <?php endif; ?>
                              
                              <?php endforeach; ?>
                           </ul>
                        </div>
                    <?php endif; ?>
                </div>
            </div><!-- row end-->
            <div class="row ts-mix-projects mixcontent" id="mixcontent" >
                 <?php foreach($project_list as $project): ?>  
                     <?php  
                        $terms = get_the_terms( $project->ID, 'ts-project-cat' );
                        $cat = '';
                            if(is_array($terms)):
                                foreach($terms as $term):
                                  $cat.= $term->slug.' ';
                                endforeach;
                           endif;  
                         
                     ?>
                  <div class="col-lg-3 mix col-sm-6 ts-mb-10 <?php echo trim($cat); ?> ">
                     <a href="<?php echo esc_url(get_permalink($project->ID)); ?>">
                        <div class="single-recent-work">
                            <img class="img-fluid"  src="<?php echo esc_url(get_the_post_thumbnail_url( $project->ID, 'large' )); ?>" alt="<?php echo esc_html($project->post_title); ?>">
                            <div class="recet-work-footer">
                                <i class="icon-Our_service_3"></i>
                                <h4 class="ts-project-el-title"> <?php echo esc_html($project->post_title); ?> 
                                    <span class="ts-project-el-zone"><?php  echo buildbench_meta_option($project->ID,'project_zone',''); ?></span>
                                </h4>
                                
                            </div>
                            <?php if($show_readmore=="yes"): ?>
                                <div class="btn-wrap">
                                    <span class="link-more"><i class="icon icon-right-arrow2"></i></span>
                                </div>
                            <?php endif; ?>
                        </div>
                     </a>
                  </div>
                  <?php endforeach; ?>
               </div><!-- row end-->
         </div><!-- .container end -->
       <?php endif; ?>  

       <?php if($project_style=="style2"): ?>
       <div class="row mixcontent" id="mixcontent" >
            <?php foreach($project_list as $project): ?>  
                <div class="col-lg-3 mix col-sm-6 ts-padding-0">
                    <a href="<?php echo esc_url(get_permalink($project->ID)); ?>">
                        <div class="single-recent-work">
                            <img class="img-fluid" alt="Projects" src="<?php echo esc_url(get_the_post_thumbnail_url( $project->ID, 'large' ) ); ?>" >
                            <div class="recet-work-footer">
                                <i class="icon-Our_service_3"></i>
                                <h4 class="ts-project-el-title">
                                    <?php echo esc_html($project->post_title); ?>
                                    <span class="ts-project-el-zone">
                                    <?php  echo buildbench_meta_option($project->ID,'project_zone',''); ?>
                                    </span>
                                </h4>
                            </div>
                            <?php if($show_readmore=="yes"): ?>
                                <div class="btn-wrap">
                                    <span class="link-more"><i class="icon icon-right-arrow2"></i></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>   
         </div>    
       <?php endif; ?>  

       <?php
      }

      public function getCategories(){
         $cat_list = [];
         if ( post_type_exists( 'ts-projects' ) ) { 
          $terms = get_terms( array(
             'taxonomy'    => 'ts-project-cat',
             'hide_empty'  => false,
             'number'      => '350', 
         ) );
            
         
         $cat_list['all']   = ['All'];
         foreach($terms as $post) {
          $cat_list[$post->slug]  = [$post->name];

         }
      }  
        return $cat_list;
     }
   }  
      
  