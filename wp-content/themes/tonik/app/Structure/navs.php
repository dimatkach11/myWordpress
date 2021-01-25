<?php

namespace Tonik\Theme\App\Structure;

/*
|----------------------------------------------------------------
| Theme Navigation Areas
|----------------------------------------------------------------
|
| This file is for registering your theme custom navigation areas
| where various menus can be assigned by site administrators.
|
*/

use function Tonik\Theme\App\config;

/**
 * Registers navigation areas.
 *
 * @return void
 */
function register_navigation_areas()
{
    register_nav_menus([
        'header' => 'Header',
        'footer' => 'Footer'
    ]);
}
add_action('after_setup_theme', 'Tonik\Theme\App\Structure\register_navigation_areas');
