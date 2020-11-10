<?php 

function buildbench_service_settings_api_init() {

    add_settings_section(
       'buildbench_service_setting_section',
       'Buildbench Service Settings',
       null,
       'writing'
   );
 
   add_settings_field(
       'buildbench_service_setting_slug',
       'Service Slug',
       'buildbench_service_slug_setting_callback_function',
       'writing',
       'buildbench_service_setting_section'
   );

   add_settings_field(
    'buildbench_service_singular_name',
    'Service singular name',
    'buildbench_service_singular_setting_callback_function',
    'writing',
    'buildbench_service_setting_section'
   );
   
   add_settings_field(
    'buildbench_service_plural_name',
    'Service plural name',
    'buildbench_service_plural_setting_callback_function',
    'writing',
    'buildbench_service_setting_section'
   );

    register_setting( 'writing', 'buildbench_service_setting_slug' );
    register_setting( 'writing', 'buildbench_service_singular_name' );
    register_setting( 'writing', 'buildbench_service_plural_name' );
} 

add_action( 'admin_init', 'buildbench_service_settings_api_init' );


function buildbench_service_plural_setting_callback_function() {
    $name = get_option('buildbench_service_plural_name');
  
    echo '<input name="buildbench_service_plural_name" id="buildbench_service_plural_name" type="text" value="'.$name.'" />';
}

function buildbench_service_singular_setting_callback_function() {
    $sname = get_option('buildbench_service_singular_name');

    echo '<input name="buildbench_service_singular_name" id="buildbench_service_singular_name" type="text" value="'.$sname.'" />';
}

function buildbench_service_slug_setting_callback_function() {
    $slug = get_option('buildbench_service_setting_slug');
    echo '<input name="buildbench_service_setting_slug" id="buildbench_service_setting_slug" type="text" value="'.$slug.'" />';
}


// service category settings


function buildbench_service_category_settings_api_init() {
 
    add_settings_field(
        'buildbench_service_cat_setting_slug',
        'Service category slug',
        'buildbench_service_cat_slug_setting_callback_function',
        'writing',
        'buildbench_service_setting_section'
    );
 
    add_settings_field(
     'buildbench_service_cat_singular_name',
     'Service category name',
     'buildbench_service_cat_singular_setting_callback_function',
     'writing',
     'buildbench_service_setting_section'
    );
 
     register_setting( 'writing', 'buildbench_service_cat_setting_slug' );
     register_setting( 'writing', 'buildbench_service_cat_singular_name' );
 
 
 } 
 
 add_action( 'admin_init', 'buildbench_service_category_settings_api_init' );
 
 function buildbench_service_cat_singular_setting_callback_function() {
     $sname = get_option('buildbench_service_cat_singular_name');
    
     echo '<input name="buildbench_service_cat_singular_name" id="buildbench_service_cat_singular_name" type="text" value="'.$sname.'" />';
 }
 
 function buildbench_service_cat_slug_setting_callback_function() {
     $slug = get_option('buildbench_service_cat_setting_slug');
     echo '<input name="buildbench_service_cat_setting_slug" id="buildbench_service_cat_setting_slug" type="text" value="'.$slug.'" />';
 }
 





