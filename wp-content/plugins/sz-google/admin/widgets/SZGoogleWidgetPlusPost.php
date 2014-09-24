<?php
/**
 * Codice HTML per il form di impostazione collegato 
 * al widget presente nella parte di amministrazione, questo
 * codice è su file separato per escluderlo dal frontend
 *
 * @package SZGoogle
 * @subpackage SZGoogleWidgets 
 */
if (!defined('SZ_PLUGIN_GOOGLE') or !SZ_PLUGIN_GOOGLE) die();
?>
<!-- WIDGETS (Tabella per contenere il FORM del widget) -->
<p><table id="SZGoogleWidgetPlusPost" class="sz-google-table-widget">

<!-- WIDGETS (Campo con inserimento del titolo widget) -->
<tr>
	<td colspan="1" class="sz-cell-keys"><label for="<?php echo $ID_title ?>"><?php echo ucfirst(__('title','szgoogleadmin')) ?>:</label></td>
	<td colspan="2" class="sz-cell-vals"><input class="widefat" id="<?php echo $ID_title ?>" name="<?php echo $NAME_title ?>" type="text" value="<?php echo $VALUE_title ?>" placeholder="<?php echo __('insert title for widget','szgoogleadmin') ?>"/></td>
</tr>

<!-- WIDGETS (Campo per inserimento URL specifico) -->
<tr>
	<td colspan="1" class="sz-cell-keys"><label for="<?php echo $ID_url ?>"><?php echo ucfirst(__('URL','szgoogleadmin')) ?>:</label></td>
	<td colspan="2" class="sz-cell-vals"><input class="widefat" id="<?php echo $ID_url ?>" name="<?php echo $NAME_url ?>" type="text" value="<?php echo $VALUE_url ?>" placeholder="<?php echo __('insert google+ post URL','szgoogleadmin') ?>"/></td>
</tr>

<!-- WIDGETS (Campo per specificare il parametro align -->
<tr>
	<td colspan="1" class="sz-cell-keys"><label for="<?php echo $ID_align ?>"><?php echo ucfirst(__('align','szgoogleadmin')) ?>:</label></td>
	<td colspan="2" class="sz-cell-vals">
		<select class="widefat" id="<?php echo $ID_align ?>" name="<?php echo $NAME_align ?>">
			<option value="none"   <?php echo selected("none"  ,$VALUE_align) ?>><?php echo __('none'  ,'szgoogleadmin') ?></option>
			<option value="left"   <?php echo selected("left"  ,$VALUE_align) ?>><?php echo __('left'  ,'szgoogleadmin') ?></option>
			<option value="center" <?php echo selected("center",$VALUE_align) ?>><?php echo __('center','szgoogleadmin') ?></option>
			<option value="right"  <?php echo selected("right" ,$VALUE_align) ?>><?php echo __('right' ,'szgoogleadmin') ?></option>
		</select>
	</td>
</tr>

<!-- WIDGETS (Chiusura tabella principale widget form) -->
</table></p>

<!-- WIDGETS (Codice javascript per funzioni UI) -->
<script type="text/javascript">
	jQuery(document).ready(function() {
		if (typeof(szgoogle_switch_hidden_onload) == 'function') { szgoogle_switch_hidden_onload('SZGoogleWidgetPlusPost'); }
	});
</script>