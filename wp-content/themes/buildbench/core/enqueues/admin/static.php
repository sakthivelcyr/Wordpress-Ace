<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * enqueue static files: javascript and css for backend
 */

wp_enqueue_style('buildbench-custom-iconfont', BUILDBENCH_CSS . '/iconfont.css', null, BUILDBENCH_VERSION);
wp_enqueue_style('buildbench-admin', BUILDBENCH_CSS . '/buildbench-admin.css', null, BUILDBENCH_VERSION);

wp_enqueue_script('buildbench-admin', BUILDBENCH_JS . '/buildbench-admin.js', array('jquery'), BUILDBENCH_VERSION, true);