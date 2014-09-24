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

<h2>Descrizione</h2>

<p>Il plugin <b>SZ-Google</b> mette a disposizione delle funzioni per inserire automaticamente il codice di monitoraggio nel proprio tema,
però se per qualche esigenza particolare volete utilizzare l'inserimento del codice manualmente sul vostro sito ma continuando ad
utilizzare il pannello di amministrazione per i parametri relativi all'account, potete utilizzare le funzioni PHP messe a
disposizione del plugin e implementarle con il vostro codice. Le funzioni messe a disposizione sono le seguenti:</p>

<ul>
<li><b>szgoogle_analytics_get_ID()</b></li>
<li><b>szgoogle_analytics_get_code()</b></li>
</ul>

<p>Ad esempio se volessimo inserire il codice nel nostro tema e prendere solo le opzioni che riguardano l'account potremmo utilizzare
un codice PHP simile al seguente dove viene utilizzata la funzione <b>szgoogle_analytics_get_ID()</b>.</p>
<pre>
&lt;script&gt;

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create',&lt;?php echo szgoogle_analytics_get_ID() ?&gt;,'dominio.com');
  ga('send','pageview');

&lt;/script&gt;
</pre>

<p>Se invece volessimo inserire il codice generato automaticamente dal plugin ma in una posizione ben definita del nostro tema possiamo
utilizzare la funzione PHP <b>szgoogle_analytics_get_code()</b> e inserirla nel punto preciso che desideriamo.</p>

<pre>
&lt;head&gt;
  if (function_exists('szgoogle_analytics_get_code')) {
    echo szgoogle_analytics_get_code();
  }
&lt;/head&gt;
</pre>

<h2>Schermata</h2>

<p>Vi allego una schermata che riporta alcuni grafici presenti su google analytics, uno strumento indispensabile per tutti i
proprietari di siti web e ancora di più per i webmaster che li gestiscono.</p>

<img class="screen" src="$IMAGE1" alt=""/>

<h2>Avvertenze</h2>

<p>Il plugin <b>SZ-Google</b> è stato sviluppato con una tecnica di caricamento moduli singoli per ottimizzare le performance generali, 
quindi prima di utilizzare uno shortcode, un widget o una funzione PHP bisogna controllare che il modulo generale e l'opzione specifica 
risulti attivata tramite il campo opzione dedicato che trovate nel pannello di amministrazione.</p>

EOD;

/**
 * Richiamo della funzione per la creazione della pagina di 
 * documentazione standard in base al contenuto della variabile HTML
 */
$this->moduleCommonFormHelp(__('analytics PHP functions','szgoogleadmin'),NULL,NULL,false,$HTML,basename(__FILE__));