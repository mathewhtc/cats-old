<?php
/**
 * DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE
 * DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE
 * DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE - DEVELOPER PHP CODE
 */
if (!defined('SZ_PLUGIN_GOOGLE') or !SZ_PLUGIN_GOOGLE) die();

// Funzione PHP per inserimento bottone per avvio hangout con
// possibilità di scegliere un'applicazione personalizzata da avviare

if (!function_exists('szgoogle_hangouts_get_code_start')) {
	function szgoogle_hangouts_get_code_start($options=array()) {
		if (!$object = new SZGoogleActionHangoutsStart()) return false;
			else return $object->getHTMLCode($options);
	}
}