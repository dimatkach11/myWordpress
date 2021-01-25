<?php
namespace Tonik\Theme\App\Structure;

/*
|-----------------------------------------------------------
| Theme Sidebars
|-----------------------------------------------------------
|
| This file is for registering your theme sidebars,
| Creates widgetized areas, which an administrator
| of the site can customize and assign widgets.
|
*/

use function Tonik\Theme\App\config;

/**
 * Registers the widget areas.
 *
 * @return void
 */
function register_widget_areas()
{
    register_sidebar([
        'id' => 'sidebar',
        'name' => __('Sidebar', config('textdomain')),
        'description' => __('Website sidebar', config('textdomain')),
        'before_widget' => '<div  class="widget %2$s">',
		    'after_widget'  => "</div>\n",
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => "</h5>\n"
    ]);
    
    register_sidebar([
        'id' => 'test',
        'name' => 'Test',
        'description' => 'Test Sidebar',
        'before_widget' => '<div  class="widget %2$s">',
		    'after_widget'  => "</div>\n",
        'before_title'  => '<h5 class="widget-title">',
        'after_title'   => "</h5>\n"
    ]);
}
add_action('widgets_init', 'Tonik\Theme\App\Structure\register_widget_areas');
