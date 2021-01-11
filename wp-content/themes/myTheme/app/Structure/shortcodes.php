<?php

namespace Tonik\Theme\App\Structure;

/*
|--------------------------------------------------------------------------
| Custom Shortcodes
|--------------------------------------------------------------------------
|
| This file is for registering your shortcodes. Shortcodes allows to facade
| a code logic behind readable piece of text. Below you have an example
| which facilitates outputing markup with template() helper function.
|
*/

use function Tonik\Theme\App\template;

/**
 * Renders a [button] shortcode.

 * @param  array $atts
 * @param  string $content
 * @return string
 */
function render_button_shortcode($atts, $content)
{
    $attributes = shortcode_atts([
        'href' => '#'
    ], $atts);

    ob_start(); // si usa prima di un codice html per convertirlo in una stringa e retornare poi attraverso vedi return 

    template('shortcodes/button', compact('attributes', 'content')); // la funzione compact(); di PHP  raccoglie tutti gli array e le variabili assegnate in un unico array con i correspettivi  "key" => "value";

    return ob_get_clean(); // restituisce il codice convertito e salvato prima in una stringa con ob_start();
}
add_shortcode('button', 'Tonik\Theme\App\Structure\render_button_shortcode');





//----------------------------------------------------------------------------------//
// my personal Test with shortcode

//[foobar]
function foobar_func( $atts ){
	return "foo and bar";
}
add_shortcode( 'foobar', 'Tonik\Theme\App\Structure\foobar_func' );

// [bartag foo="foo-value"]
function bartag_func( $atts ) {
	extract( shortcode_atts( array(
		'foo' => 'something',
		'bar' => 'something else',
	), $atts ) );

	return "foo = {$foo} {$bar}";
}
add_shortcode( 'bartag', 'Tonik\Theme\App\Structure\bartag_func' );

// Ecco un semplice esempio di uno shortcode con contenuto:
function caption_shortcode( $atts, $content = null ) {
	return '<span class="caption">' . $content . '</span>';
}
add_shortcode( 'caption', 'Tonik\Theme\App\Structure\caption_shortcode' );

// caption_shortcode() migliorata per supportare un attributo 'class':
function caption_shortcode_with_atts( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'class' => 'caption',
	), $atts ) );

	return '<span class="' . esc_attr($class) . '">' . $content . '</span>';
}
add_shortcode( 'caption_with_atts', 'Tonik\Theme\App\Structure\caption_shortcode_with_atts' );