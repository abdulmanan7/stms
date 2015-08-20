<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php if (null !== $this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
}
?>
<?php if (!empty($message)): ?>
	<?php echo $message;?>
<?php endif?>
<div class='panel panel-default'>
	<div class='panel-heading'>
		<i class='icon-plus icon-large'></i>
		<?php echo $heading;?>
	</div>
	<div class='panel-body'>