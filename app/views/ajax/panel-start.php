<?php if (null !== $this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
}
?>
<?php if (!empty($message)): ?>
	<?php echo $message;?>
<?php endif?>
<div class='panel panel-default grid'>
	<div class='panel-heading'>
		<i class='icon-table icon-large'></i>
		<?php echo $heading;?>
	</div>
	<div class='panel-body filters'>
		<div class='row'>
<?php echo set_message(" Found Record !", 'notify');?>
		</div>
	</div>
