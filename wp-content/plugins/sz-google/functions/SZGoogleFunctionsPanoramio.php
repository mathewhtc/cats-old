<?php
/**
 * DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE
 * DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE
 * DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE
 */
if (!defined('SZ_PLUGIN_GOOGLE') or !SZ_PLUGIN_GOOGLE) die();

// Funzone PHP per inserimento widget di panoramio con diversi
// layout e sliders con le fotografie selezionate tramite query

if (!function_exists('szgoogle_panoramio_get_code')) {
	function szgoogle_panoramio_get_code($options=array()) {
		if (!$object = new SZGoogleActionPanoramio()) return false;
			else return $object->getHTMLCode($options);
	}
}