<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<label class="hidden" for="s"><?php _e('Search for:'); ?></label>
<div><input name="s" type="text" id="s" value="Search... Enter" onblur="this.value=(this.value=='') ? 'Search... Enter' : this.value;" onfocus="this.value=(this.value=='Search... Enter') ? '' : this.value;" maxlength="150"/>
</div>
</form>
