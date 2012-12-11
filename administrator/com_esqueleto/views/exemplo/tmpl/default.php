<?php defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');
jimport('joomla.application.component.helper');

$helper = JApplicationHelper::getPath('helper');
dump($helper,"helper");
require_once $helper;

if ($this->params->get( 'show_page_title', 1)) : ?>
<script language="JavaScript"> 
 
</script>
<div
	class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php echo $this->escape($this->params->get('page_title')); ?>
</div>
	<?php
	endif;

	 

	?>

<div class="bgdiv" style="display: inline-block;">
	 
</div>
