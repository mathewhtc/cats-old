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
$IMAGE1 = plugin_dir_url(SZ_PLUGIN_GOOGLE_MAIN).'admin/files/images/others/sz-google-drive-embed.jpg';

/**
 * Definizione variabile HTML per la preparazione della stringa
 * che contiene la documentazione di questa funzionalità
 */
$HTML = <<<EOD

<h2>Descrizione</h2>

<p>Tramite il componente <b>Google Drive Embed</b> presente nel plugin <b>SZ-Google</b> è possibile inserire in una pagina web di wordpress
la visualizzazione di un documento presente su google drive. Possiamo inserire in embed una presentazione, uno spreadsheet, il contenuto 
di una cartella, etc,etc. La cosa importante è che il documento sia memorizzato su google drive è che sia pubblicato, quindi prima di
utilizzare questo componente entrate nel documento e scegliete dal menu File l'opzione "Pubblica sul WEB".</p>

<p>Per inserire questo componente dovete usare lo shortcode <b>[sz-drive-embed]</b>, se invece desiderate utilizzarlo
in una sidebar allora dovete utilizzare il widget sviluppato per questa funzione che trovate nel menu aspetto -> widgets. Per i più 
esigenti esiste anche un'altra possibilità, infatti basta utilizzare una funzione PHP messa a disposizione dal plugin 
<b>szgoogle_drive_get_embed(\$options)</b>.</p>

<h2>Personalizzazione</h2>

<p>A prescindere dalla forma che utilizzerete, il componente potrà essere personalizzato in diverse maniere, basterà usare i parametri
messi a disposizione elencati nella tabella a seguire. Per quanto riguarda il widget i parametri vengono richiesti
direttamente dall'interfaccia grafica, mentre se utilizzate lo shortcode o la funzione PHP dovete specificarli manualmente nel 
formato opzione="valore". Se volete avere delle informazioni aggiuntive potete visitare la pagina ufficiale
<a target="_blank" href="https://support.google.com/drive/topic/2811739?hl=en&ref_topic=2799627">Use Docs, Sheets, and Slides</a>.</p>

<h2>Parametri e opzioni</h2>

<table>
	<tr><th>Parametro</th>    <th>Descrizione</th>              <th>Valori ammessi</th>         <th>Default</th></tr>
	<tr><td>type</td>         <td>tipo documento</td>           <td>document,folder,spreadsheet,<br/>presentation,forms,pdf,video</td> <td>document</td></tr>
	<tr><td>id</td>           <td>id univoco documento</td>     <td>stringa</td>                <td>nessuno</td></tr>
	<tr><td>width</td>        <td>larghezza</td>                <td>valore</td>                 <td>configurazione</td></tr>
	<tr><td>height</td>       <td>altezza</td>                  <td>valore</td>                 <td>configurazione</td></tr>
	<tr><td>single</td>       <td>spreadsheet singolo</td>      <td>true,false</td>             <td>false</td></tr>
	<tr><td>gid</td>          <td>spreadsheet id</td>           <td>0,1,2,3,4,5,6 etc</td>      <td>0</td></tr>
	<tr><td>range</td>        <td>spreadsheet range</td>        <td>stringa</td>                <td>nessuno</td></tr>
	<tr><td>start</td>        <td>presentazione avvio</td>      <td>true,false</td>             <td>false</td></tr>
	<tr><td>loop</td>         <td>presentazione loop</td>       <td>true.false</td>             <td>false</td></tr>
	<tr><td>delay</td>        <td>presentazione attesa sec</td> <td>1,2,3,4,5,10,15,30,60</td>  <td>3</td></tr>
	<tr><td>folderview</td>   <td>tipo elenco folder</td>       <td>list,grid</td>              <td>list</td></tr>
	<tr><td>margintop</td>    <td>margine alto</td>             <td>valore,none</td>            <td>none</td></tr>
	<tr><td>marginrigh</td>   <td>margine destro</td>           <td>valore,none</td>            <td>none</td></tr>
	<tr><td>marginbottom</td> <td>margine basso</td>            <td>valore,none</td>            <td>1</td></tr>
	<tr><td>marginleft</td>   <td>margine sinistro</td>         <td>valore,none</td>            <td>none</td></tr>
	<tr><td>marginunit</td>   <td>misura per margine</td>       <td>em,pt,px</td>               <td>em</td></tr>
</table>

<h2>Esempio shortcode</h2>

<p>Gli shortcode sono delle macro che vengono inserite nei post per richiede alcune elaborazioni aggiuntive che sono state messe a 
disposizione dai plugin, dai temi o direttamente dal core. Anche il plugin <b>SZ-Google</b> mette a disposizione parecchi shortcode che
possono esseri utilizzati nella forma classica e con le opzioni di personalizzazione permesse. Per inserire uno shortcode nel nostro 
post dobbiamo utilizzare il codice in questa forma:</p>

<pre>[sz-drive-embed type="document" id="1nIKhA_U41fGLC_99hp_uB8lM6Ef0IffspkwTp2Sk_eI"/]</pre>

<h2>Esempio codice PHP</h2>

<p>Se volete utilizzare le funzioni PHP messe a disposizione dal plugin dovete accertarvi che il modulo corrispondente sia attivo, una 
volta verificato inserite nel punto desiderato del vostro tema un codice simile al seguente esempio, quindi preparate un array con le
opzioni desiderate e richiamate la funzione richiesta. É consigliabile utilizzare prima della funzione il controllo se questa esista,
in questa maniera non si avranno errori PHP in caso di plugin disattivato o disinstallato.</p> 

<pre>
\$options = array(
  'type'   => 'presentation',
  'id'     => 'bJr41NtMdfvD5pOZL9ZeNfeUvK8Gg4gZFyeqM8',
  'width'  => 'auto',
  'height' => '300',
  'delay'  => '5',
  'start'  => 'true',
  'loop'   => 'false',
);

if (function_exists('szgoogle_drive_get_embed')) {
  echo szgoogle_drive_get_embed(\$options);
}
</pre>

<h2>Formati supportati</h2>

<p>Al momento questi sono i formati supportati dal plugin per eseguire un codice embed da google drive alla pagina web, vi lascio
qui di seguito alcuni shortcode che potete provare per controllare il corretto funzionamento.</p>

<pre>
[sz-drive-embed type="document" id="1nIKhA_U41fGLC_99hp_uB8lM6Ef0IffspkwTp2Sk_eI"/]
[sz-drive-embed type="spreadsheet" id="0AsB1V5PwB8NjdGdLRm1MYW9SSUNWRWNrVXdqQ2hKTmc"/]
[sz-drive-embed type="presentation" id="1BS67-bJr41NtMdfvD5pOZL9ZeNfeUvK8Gg4gZFyeqM8"/]
[sz-drive-embed type="forms" id="1XK4lmkJ1_DPrrxhF8zY7QCpyfX7Ux2_W_DBkgbMTzeo"/]
[sz-drive-embed type="pdf" id="0B8B1V5PwB8NjTDhMckQ5MlVENjQ"/]
[sz-drive-embed type="video" id="0B8B1V5PwB8NjZFpNNG0tS3dmNTQ" height="300"/]
[sz-drive-embed type="folder" id="0B8B1V5PwB8NjdHpXR0dhck1EaW8" folderview="list"/]
</pre>

<h2>Schermata</h2>

<p>In questa immagine potete vedere il risultato finale di questa funzionalità. Viene visualizzato un documento di esempio
presente in google drive tramite lo shortcode utilizzato prima nella sezione "esempio shortcode".</p>

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
$this->moduleCommonFormHelp(__('drive embed','szgoogleadmin'),NULL,NULL,false,$HTML,basename(__FILE__));