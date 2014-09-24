<?php
/**
 * Definizione di una classe che identifica un'azione richiamata dal
 * modulo principale in base alle opzioni che sono state attivate
 * nel pannello di amministrazione o nella configurazione del plugin
 *
 * @package SZGoogle
 * @subpackage SZGoogleActions
 */
if (!defined('SZ_PLUGIN_GOOGLE') or !SZ_PLUGIN_GOOGLE) die();

// Prima di eseguire il caricamento della classe controllo
// se per caso esiste già una definizione con lo stesso nome

if (!class_exists('SZGoogleActionPanoramio'))
{
	/**
	 * Definizione della classe principale da utilizzare per questa
	 * azione. La classe deve essere una extends di SZGoogleAction
	 */
	class SZGoogleActionPanoramio extends SZGoogleAction
	{
		/**
		 * Funzione per shortcode per widget panoramio che permette di
		 * eseguire un codice embed per il prodotto google panoramio
		 *
		 * @return string
		 */
		function getShortcode($atts,$content=null) 
		{
			return $this->getHTMLCode(shortcode_atts(array(
				'template'    => '', // valore predefinito
				'user'        => '', // valore predefinito
				'group'       => '', // valore predefinito
				'tag'         => '', // valore predefinito
				'set'         => '', // valore predefinito
				'width'       => '', // valore predefinito
				'height'      => '', // valore predefinito
				'bgcolor'     => '', // valore predefinito
				'delay'       => '', // valore predefinito
				'columns'     => '', // valore predefinito
				'rows'        => '', // valore predefinito
				'orientation' => '', // valore predefinito
				'listsize'    => '', // valore predefinito
				'position'    => '', // valore predefinito
				'paragraph'   => '', // valore predefinito
				'action'      => 'shortcode',
			),$atts),$content);
		}

		/**
		 * Creazione codice HTML per il componente richiamato che
		 * deve essere usato in comune sia per widget che shortcode
		 *
		 * @return string
		 */
		function getHTMLCode($atts=array(),$content=null)
		{
			if (!is_array($atts)) $atts = array();

			// Estrazione dei valori specificati nello shortcode, i valori ritornati
			// sono contenuti nei nomi di variabili corrispondenti alla chiave

			extract(shortcode_atts(array(
				'template'       => '', // valore predefinito
				'user'           => '', // valore predefinito
				'group'          => '', // valore predefinito
				'tag'            => '', // valore predefinito
				'set'            => '', // valore predefinito
				'width'          => '', // valore predefinito
				'height'         => '', // valore predefinito
				'bgcolor'        => '', // valore predefinito
				'delay'          => '', // valore predefinito
				'columns'        => '', // valore predefinito
				'rows'           => '', // valore predefinito
				'orientation'    => '', // valore predefinito
				'listsize'       => '', // valore predefinito
				'position'       => '', // valore predefinito
				'paragraph'      => '', // valore predefinito
				'action'         => '', // valore predefinito
			),$atts));

			// Controllo le variabili che devono avere obbligatorio il valore 
			// di true o false, in caso diverso prendo il valore di default specificato 

			$user      = trim($user);
			$group     = trim($group);
			$tag       = trim($tag);
			$set       = strtolower(trim($set));
			$template  = strtolower(trim($template));
			$width     = strtolower(trim($width));
			$height    = strtolower(trim($height));
			$bgcolor   = strtolower(trim($bgcolor));
			$delay     = strtolower(trim($delay));
			$columns   = strtolower(trim($columns));
			$rows      = strtolower(trim($rows));
			$listsize  = strtolower(trim($listsize));
			$position  = strtolower(trim($position));
			$paragraph = strtolower(trim($paragraph));
			$action    = strtolower(trim($action));

			// Caricamento opzioni per le variabili di configurazione che 
			// contengono i valori di default per shortcode e widgets

			$options = $this->getModuleOptions('SZGoogleModulePanoramio');

			// Lettura delle opzioni per la definzione di parametri che non hanno
			// specificato nessun valore e che saranno sostituiti con quelli di default

			if ($action == 'widget') 
			{
				$DEFAULT_TEMPLATE    = $options['panoramio_w_template'];
				$DEFAULT_WIDTH       = $options['panoramio_w_width'];
				$DEFAULT_HEIGHT      = $options['panoramio_w_height'];
				$DEFAULT_LIST_SIZE   = $options['panoramio_w_list_size'];
				$DEFAULT_POSITION    = $options['panoramio_w_position'];
				$DEFAULT_ORIENTATION = $options['panoramio_w_orientation'];
				$DEFAULT_PARAGRAPH   = $options['panoramio_w_paragraph'];
				$DEFAULT_DELAY       = $options['panoramio_w_delay'];
				$DEFAULT_SET         = $options['panoramio_w_set'];
				$DEFAULT_COLUMNS     = $options['panoramio_w_columns'];
				$DEFAULT_ROWS        = $options['panoramio_w_rows'];

			} else {

				$DEFAULT_TEMPLATE    = $options['panoramio_s_template'];
				$DEFAULT_WIDTH       = $options['panoramio_s_width'];
				$DEFAULT_HEIGHT      = $options['panoramio_s_height'];
				$DEFAULT_LIST_SIZE   = $options['panoramio_s_list_size'];
				$DEFAULT_POSITION    = $options['panoramio_s_position'];
				$DEFAULT_ORIENTATION = $options['panoramio_s_orientation'];
				$DEFAULT_PARAGRAPH   = $options['panoramio_s_paragraph'];
				$DEFAULT_DELAY       = $options['panoramio_s_delay'];
				$DEFAULT_SET         = $options['panoramio_s_set'];
				$DEFAULT_COLUMNS     = $options['panoramio_s_columns'];
				$DEFAULT_ROWS        = $options['panoramio_s_rows'];
			}

			// Controllo la variabile che controlla il paragrafo vuoto da aggiungere
			// dopo il blocco di codice (shortocde) per compatibilità al post di wordpress

			if ($paragraph == 'true')  $paragraph = '1';
			if ($paragraph == 'false') $paragraph = '0';

			if (!in_array($paragraph,array('1','0'))) $paragraph = $DEFAULT_PARAGRAPH;

			// Controllo la coerenza delle opzioni di elaborazione modulo e 
			// sostituzione con valori di default quando presentano dei problemi

			if (!in_array($template   ,array('photo','slideshow','list','photo_list'))) $template    = $DEFAULT_TEMPLATE;
			if (!in_array($set        ,array('all','public','recent')))                 $set         = $DEFAULT_SET;
			if (!in_array($orientation,array('horizontal','vertical')))                 $orientation = $DEFAULT_ORIENTATION;
			if (!in_array($position   ,array('left','top','right','bottom')))           $position    = $DEFAULT_POSITION;

 			if (!ctype_xdigit(str_replace("#","",$bgcolor))) $bgcolor = '';
			if (!is_numeric($delay) or $delay < 0) $delay = $DEFAULT_DELAY; 

			if (!ctype_digit($columns))  $columns  = $DEFAULT_COLUMNS; 
			if (!ctype_digit($rows))     $rows     = $DEFAULT_ROWS;
			if (!ctype_digit($listsize)) $listsize = $DEFAULT_LIST_SIZE; 

			// Controllo i valori passati in array che specificano la dimensione del widget
			// in caso contrario imposto il valore su quello specificato nelle opzioni

			if (!is_numeric($width)  and $width  != 'auto') $width  = $DEFAULT_WIDTH;
			if (!is_numeric($height) and $height != 'auto') $height = $DEFAULT_HEIGHT;

			// Controllo la dimensione del widget e controllo formale dei valori numerici
			// se trovo qualche incongruenza applico i valori di default prestabiliti

			if ($width  == '')     $width  = "'+w+'";
			if ($width  == 'auto') $width  = "'+w+'";

			if ($height == '')     $height = '300';
			if ($height == 'auto') $height = '300';

			// Creazione identificativo univoco per riconoscere il codice embed 
			// nel caso la funzioine venga richiamata più volte nella stessa pagina

			$unique = md5(uniqid(),false);
			$keyIDs = 'sz-google-panoramio-'.$unique;

			// Creazione codice HTML per inserimento javascript di google 

			$HTML  = '<div class="sz-google-panoramio">';
			$HTML .= '<div class="sz-google-panoramio-wrap">';
			$HTML .= '<div class="sz-google-panoramio-iframe" id="'.$keyIDs.'">';

			$HTML .= '<script type="text/javascript">';
			$HTML .= "var w=document.getElementById('".$keyIDs."').offsetWidth;";
			$HTML .= "var h='<'+'";

			$HTML .= 'iframe src="https://ssl.panoramio.com/wapi/template/'.$template.'.html?';
			$HTML .= 'width='       .$width;
			$HTML .= '&height='     .$height;
			$HTML .= '&bgcolor='    .rawurlencode($bgcolor);
			$HTML .= '&delay='      .rawurlencode($delay);
			$HTML .= '&columns='    .rawurlencode($columns);
			$HTML .= '&rows='       .rawurlencode($rows);
			$HTML .= '&orientation='.rawurlencode($orientation);
			$HTML .= '&list_size='  .rawurlencode($listsize);
			$HTML .= '&position='   .rawurlencode($position);

			if ($user  != '') $HTML .= '&user=' .rawurlencode($user);
			if ($group != '') $HTML .= '&group='.rawurlencode($group);
			if ($tag   != '') $HTML .= '&tag='  .rawurlencode($tag);

			if ($user  == '' and $group == '' and $tag == '') {
				if ($set != '') $HTML .= '&set='.rawurlencode($set);
			}

			$HTML .= '" ';
			$HTML .= 'scrolling="no" frameborder="0" marginwidth="0" marginheight="0" ';
 			$HTML .= 'width="'.$width.'" ';
			$HTML .= 'height="'.$height.'"';
			$HTML .= "></'+'iframe'+'>';";
			$HTML .= "document.write(h);";
			$HTML .= '</script>';

			$HTML .= '</div>';
			$HTML .= '</div>';
			$HTML .= '</div>';

			if ($action != 'widget' and $paragraph == '1') {
				$HTML .= '<p></p>';
			}

			// Ritorno per la funzione con tutta la stringa contenente
			// il codice HTML per l'inserimento del codice nella pagina

			return $HTML;
		}
	}
}