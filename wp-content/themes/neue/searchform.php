<form role="search" class="vw-search-form" action="<?php echo home_url(); ?>/" method="get">
	<input type="text" id="s" name="s" value="<?php _e('Search', 'envirra') ?>" onfocus="if(this.value=='<?php _e('Search', 'envirra') ?>')this.value='';" onblur="if(this.value=='')this.value='<?php _e('Search', 'envirra') ?>';" autocomplete="off" />
	<a class="vw-search-icon" onclick="jQuery(this).closest('form').submit();"><i class="icon-entypo-search"></i></a>
</form>