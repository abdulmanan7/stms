<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
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
		<?php if ($tool): ?>
			<div class='panel-tools'>
				<div class='btn-group'>
					<a class='btn' href='#'>
						<i class='icon-wrench'></i>
						Settings
					</a>
					<a class='btn' href='#'>
						<i class='icon-filter'></i>
						Filters
					</a>
					<a class='btn' data-toggle='toolbar-tooltip' href='<?php echo $refresh_url;?>' title='Reload'>
						<i class='icon-refresh'></i>
					</a>
				</div>
				<div class='badge'><?php echo $count = ($count) ? $count : 0;?> records</div>
			</div>
		<?php endif?>
	</div>
	<div class='panel-body filters'>
		<div class='row'>
			<div class='col-md-9'>
				<?php echo anchor($add_link, lang('btn_add'), 'class="btn btn-info btn-sm"')?>
			</div>
			<form action="<?php echo $search_url;?>" >
				<div class='col-md-3'>
					<div class='input-group'>
						<input class='search form-control' name='search' placeholder='Enter Cellphone...' type='text'>
						<span class='input-group-btn'>
							<button class='btn' type='submit'>
								<i class='icon-search'></i>
							</button>
						</span>
					</div>
				</div><!--col-md-3 end -->
			</form>
		</div>
	</div>
