<?php
/**
 * Classe per la definizione di uno widget che viene
 * richiamato dalla classe del modulo principale
 *
 * @package SZGoogle
 * @subpackage SZGoogleWidget 
 */
if (!defined('SZ_PLUGIN_GOOGLE') or !SZ_PLUGIN_GOOGLE) die();

// Prima di eseguire il caricamento della classe controllo
// se per caso esiste già una definizione con lo stesso nome

if (!class_exists('SZGoogleWidgetDriveEmbed'))
{
	/**
	 * Definizione della classe principale da utilizzare per questo
	 * modulo. La classe deve essere una extends di SZGoogleWidget
	 */
	class SZGoogleWidgetDriveEmbed extends SZGoogleWidget
	{
		/**
		 * Costruttore principale della classe widget, definizione
		 * delle opzioni legate al widget e al controllo dello stesso
		 */
		function __construct() 
		{
			parent::__construct('SZ-Google-Drive-Embed',__('SZ-Google - Drive Embed','szgoogleadmin'),array(
				'classname'   => 'sz-widget-google sz-widget-google-drive sz-widget-google-drive-embed', 
				'description' => ucfirst(__('google drive embed.','szgoogleadmin'))
			));
		}

		/**
		 * Generazione del codice HTML del widget per la 
		 * visualizzazione completa nella sidebar di appartenenza
		 */
		function widget($args,$instance) 
		{
			// Controllo se esistono le variabili che servono durante l'elaborazione
			// dello script e assegno dei valori di default nel caso non fossero specificati

			$options = $this->common_empty(array(
				'title'        => '', // valore predefinito
				'type'         => '', // valore predefinito
				'id'           => '', // valore predefinito
				'width'        => '', // valore predefinito
				'height'       => '', // valore predefinito
				'folderview'   => '', // valore predefinito
				'single'       => '', // valore predefinito
				'gid'          => '', // valore predefinito
				'range'        => '', // valore predefinito
				'start'        => '', // valore predefinito
				'loop'         => '', // valore predefinito
				'delay'        => '', // valore predefinito
				'margintop'    => '', // valore predefinito
				'marginright'  => '', // valore predefinito
				'marginbottom' => '', // valore predefinito
				'marginleft'   => '', // valore predefinito
				'marginunit'   => '', // valore predefinito
			),$instance);

			// Definizione delle variabili di controllo del widget, questi valori non
			// interessano le opzioni della funzione base ma incidono su alcuni aspetti

			$controls = $this->common_empty(array(
				'width_auto'  => '', // valore predefinito
				'height_auto' => '', // valore predefinito
			),$instance);

			// Correzione del valore di dimensione nel caso venga
			// specificata la maniera automatica e quindi usare javascript

			if ($controls['width_auto']  == '1') $options['width']  = 'auto';
			if ($controls['height_auto'] == '1') $options['height'] = 'auto';

			// Creazione del codice HTML per il widget attuale richiamando la
			// funzione base che viene richiamata anche dallo shortcode corrispondente

			$OBJC = new SZGoogleActionDriveEmbed();
			$HTML = $OBJC->getHTMLCode($options);

			// Output del codice HTML legato al widget da visualizzare
			// chiamata alla funzione generale per wrap standard

			echo $this->common_widget($args,$instance,$HTML);
		}

		/**
		 * Modifica parametri collegati al FORM del widget con la
		 * memorizzazione dei valori direttamente nel database wordpress
		 */
		function update($new_instance,$old_instance) 
		{
			// Esecuzione operazioni aggiuntive sui campi presenti
			// nel form widget prima della memorizzazione database

			return $this->common_update(array(
				'title'       => '0', // esecuzione strip_tags
				'type'        => '1', // esecuzione strip_tags
				'id'          => '1', // esecuzione strip_tags
				'folderview'  => '1', // esecuzione strip_tags
				'single'      => '1', // esecuzione strip_tags
				'gid'         => '1', // esecuzione strip_tags
				'range'       => '1', // esecuzione strip_tags
				'start'       => '1', // esecuzione strip_tags
				'loop'        => '1', // esecuzione strip_tags
				'delay'       => '1', // esecuzione strip_tags
				'width'       => '1', // esecuzione strip_tags
				'width_auto'  => '1', // esecuzione strip_tags
				'height'      => '1', // esecuzione strip_tags
				'height_auto' => '1', // esecuzione strip_tags
			),$new_instance,$old_instance);
		}

		/**
		 * Visualizzazione FORM del widget presente nella gestione 
		 * delle sidebar nel pannello di amministrazione di wordpress
		 */		
		function form($instance) 
		{
			// Creazione array per elenco campi che devono essere 
			// presenti nel form prima di richiamare wp_parse_args()

			$array = array(
				'title'       => '', // valore predefinito
				'type'        => '', // valore predefinito
				'id'          => '', // valore predefinito
				'folderview'  => '', // valore predefinito
				'single'      => '', // valore predefinito
				'gid'         => '', // valore predefinito
				'range'       => '', // valore predefinito
				'start'       => '', // valore predefinito
				'loop'        => '', // valore predefinito
				'delay'       => '', // valore predefinito
				'width'       => '', // valore predefinito
				'width_auto'  => '', // valore predefinito
				'height'      => '', // valore predefinito
				'height_auto' => '', // valore predefinito
			);

			// Creazione array per elenco campi da recuperare su FORM e
			// caricamento del file con il template HTML da visualizzare

			extract(wp_parse_args($instance,$array),EXTR_OVERWRITE);

			// Lettura delle opzioni per il controllo dei valori di default
			// da assegnare al widget nel momento che viene inserito in sidebar

			if ($object = SZGoogleModule::getObject('SZGoogleModuleDrive')) 
			{
				$options = (object) $object->getOptions();

				if (!ctype_digit($width)  and $width  != 'auto') $width  = $options->drive_embed_w_width;
				if (!ctype_digit($height) and $height != 'auto') $height = $options->drive_embed_w_height;
			}

			// Impostazione eventuale di parametri di default per i
			// campi che contengono dei valori non validi o non coerenti 

			$DEFAULT = include(dirname(SZ_PLUGIN_GOOGLE_MAIN)."/options/sz_google_options_drive.php");

			if (!ctype_digit($width)  or $width  == 0) { $width  = $DEFAULT['drive_embed_w_width']['value'];  $width_auto  = '1'; }
			if (!ctype_digit($height) or $height == 0) { $height = $DEFAULT['drive_embed_w_height']['value']; $height_auto = '1'; }

			// Richiamo il template per la visualizzazione della
			// parte che riguarda il pannello di amministrazione

			@require(dirname(SZ_PLUGIN_GOOGLE_MAIN).'/admin/widgets/SZGoogleWidget.php');
			@require(dirname(SZ_PLUGIN_GOOGLE_MAIN).'/admin/widgets/' .__CLASS__.'.php');
		}
	}
}