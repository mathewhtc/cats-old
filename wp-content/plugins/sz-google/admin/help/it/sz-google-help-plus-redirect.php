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
$IMAGE1 = plugin_dir_url(SZ_PLUGIN_GOOGLE_MAIN).'admin/files/images/others/sz-google-plus-redirect.jpg';

/**
 * Definizione variabile HTML per la preparazione della stringa
 * che contiene la documentazione di questa funzionalità
 */
$HTML = <<<EOD

<h2>Descrizione</h2>

<p>Il formato degli URL utilizzato da Google+ per identificare le sue pagine non è sicuramente un friendly url, infatti vengono
utilizzati degli id numerici molto lunghi che rendono la stringa URL impossibile da ricordare o memorizzare. Per questo motivo G+
ha messo a disposizione per i profili e le pagine un URL personalizzato da associare al proprio profilo o pagina. Purtroppo però
il sistema adottato non è sempre efficace, infatti specialmente nelle pagine vengono richiesti dei caratteri aggiuntivi che molti
siti web non apprezzano perchè non coerenti con il proprio nome originale. Ad esempio un'azienda che si chiama <b>skydrive</b> non
accetta volentieri di stampare su un materiale pubblicitario un'indirizzo tipo <b>https://plus.google.com/+skydrive9876</b>.</p>

<h2>Redirect da dominio</h2>

<p>Il plugin <b>SZ-Google</b> mette a disposizione un feature di redirect dal nome del proprio dominio per risolvere questo problema, 
infatti se ad esempio il plugin è installato sul sito che abbiamo preso come esempio <b>skydrive.com</b> è possibile creare un URL 
personalizzato del tipo <b>https://skydrive.com/+</b> che vi porterà direttamente sulla pagina di google+, sicuramente una forma più 
elegante e personale che può essere utilizzata senza problemi su materiale pubblicitario o gadgets vari.</p>

<pre>
Google+ URL ==> https://plus.google.com/123456789012345
Google+ URL ==> https://plus.google.com/+skydrive9876
Plugin+ URL ==> https://skydrive.com/+
</pre>

<p>Nella sezione di configurazione Google+ Redirect presente nel pannello di amministrazione troverete anche la possibilità di identificare
un redirect per la stringa <b>/plus</b> e per una di vostra scelta. Ad esempio se avete una community collegata alla vostra pagina potreste
utilizzare la stringa <b>community/+</b> per un redirect diretto sulla community di google+.</p>

<pre>
Plugin+ URL ==> https://skydrive.com/+
Plugin+ URL ==> https://skydrive.com/plus
Plugin+ URL ==> https://skydrive.com/community/+
</pre>

<h2>Schermata</h2>

<p>In questa immagine potete vedere il risultato finale di questa funzionalità. Potete usare il vostrro domino con un segno di + 
per creare un collegamento alla vostra business page presente su google plus.</p>

<img class="screen" src="$IMAGE1" alt=""/>

<h2>Avvertenze</h2>

<p>Il plugin <b>SZ-Google</b> è stato sviluppato con una tecnica di caricamento moduli singoli per ottimizzare le performance generali, quindi prima di 
utilizzare uno shortcode, un widget o una funzione PHP bisogna controllare che il modulo generale e l'opzione specifica risulti 
attivata tramite il campo opzione dedicato che trovate nel pannello di amministrazione.</p>

EOD;

/**
 * Richiamo della funzione per la creazione della pagina di 
 * documentazione standard in base al contenuto della variabile HTML
 */
$this->moduleCommonFormHelp(__('google+ redirect','szgoogleadmin'),NULL,NULL,false,$HTML,basename(__FILE__));