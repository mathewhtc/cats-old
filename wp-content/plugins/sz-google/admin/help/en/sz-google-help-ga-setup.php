<?php
/**
 * Controllo se il file viene richiamato direttamente senza
 * essere incluso dalla procedura standard del plugin.
 *
 * @package SZGoogle
 */
if (!defined('SZ_PLUGIN_GOOGLE') or !SZ_PLUGIN_GOOGLE) die(); 

/**
 * Definizione variabili per calcolare percorsi, immagini
 * e qualsiasi risorsa che debba essere specificata in EOD
 */
$IMAGE1 = plugin_dir_url(SZ_PLUGIN_GOOGLE_MAIN).'admin/files/images/others/sz-google-analytics.jpg';

/**
 * Definizione variabile HTML per la preparazione della stringa
 * che contiene la documentazione di questa funzionalità
 */
$HTML = <<<EOD

<h2>Documentation</h2>

<p>Google Analytics is a free service made ​​available by Google to control access statistics that relate to a website, this tool is 
specially used by web marketers and webmasters who use the service by adding a small HTML code to your web pages, which allows 
him monitoring and collection of information related to visitors.</p>

<p>Through this module present in the SZ-plugin Google can do the same thing without knowing any aspect of programming that covers 
HTML or PHP. In fact, just enter the required information and the code will be entered manually on your web pages. Obviously you 
already have a valid account on google analytics. See <a target="_blank" href="http://www.google.com/analytics/">http://www.google.com/analytics/</a>.</p>

<h2>Module activation</h2>

<p>Once you verified you have got a valid Google Analytics account you can go on activating the specific module into plugin’s 
general section and you can insert the monitoring related UA code. Double check your options to choose when the plugin should put 
the monitoring on, do you need it only in front-end pages or into administration panel too? You can also exclude administrators 
access or logged users access from monitoring in order not to have them counted into your statistics and falsify your results.</p>

<h2>Tracking code</h2>

<p>By default the code is written into the &lt;head&gt; section of your HTML page, in the exact position recommended by Google, 
anyway you can modify this feature and decide to put it on the bottom of page or manually using a PHP function you can insert 
anywhere in your page code, even adding some custom PHP conditions to include or exclude monitoring. Manual insert can be made 
using <b>szgoogle_analytics_get_code()</b> function; it doesn’t need parameters and can be invoked anywhere in your theme.</p>

<pre>
if (function_exists('szgoogle_analytics_get_code')) {
  echo szgoogle_analytics_get_code();
}
</pre>

<h2>Universal Analytics</h2>

<p>Google has released a new tracking code called the Universal Analytics, which introduces a number of features that change the way 
in which data are collected and organized in your Google Analytics account, so you can get a better understanding of online content. 
For all the websites that have been configured in the old method is the need for a conversion that is made directly from the admin 
panel of the GA. Only after this conversion can activate the option of Universal Analytics on plugin SZ-Google which in any case 
automatically manages both the old and the new code.</p>

<h2>Screenshot</h2>

<p>I am attaching a screen that shows some graphs found on google analytics, an indispensable tool for all website owners and even 
more to webmasters who run them. Visit official site <a target="_blank" href="http://www.google.com/analytics/">http://www.google.com/analytics/</a>.</p>

<img class="screen" src="$IMAGE1" alt=""/>

<h2>Warnings</h2>

<p>The plugin <b>SZ-Google</b> has been developed with a technique of loading individual modules to optimize overall performance, 
so before you use a shortcode, a widget, or a PHP function you should check that the module general and the specific option appears 
enabled via the field dedicated option that you find in the admin panel.</p>

EOD;

/**
 * Richiamo della funzione per la creazione della pagina di 
 * documentazione standard in base al contenuto della variabile HTML
 */
$this->moduleCommonFormHelp(__('analytics setup','szgoogleadmin'),NULL,NULL,false,$HTML,basename(__FILE__));