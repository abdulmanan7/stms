<div class='panel panel-default grid'>
  <div class='panel-heading'>
    <i class='icon-table icon-large'></i>
    <span class="pull-left"><?php echo lang('index_heading');?></span><small><?php echo lang('index_subheading');?></small>
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
        <a class='btn' data-toggle='toolbar-tooltip' href='#' title='Reload'>
          <i class='icon-refresh'></i>
        </a>
      </div>
      <div class='badge'>3 record</div>
    </div>
  </div>
  <div class='panel-body filters'>
    <div class='row'>
      <div class='col-md-9'>
        <?php echo anchor('auth/create_user', lang('index_create_user_link'))?> | <?php echo anchor('auth/create_group', lang('index_create_group_link'))?>
      </div>
      <div class='col-md-3'>
        <div class='input-group'>
          <input class='form-control' placeholder='Quick search...' type='text'>
          <span class='input-group-btn'>
            <button class='btn' type='button'>
              <i class='icon-search'></i>
            </button>
          </span>
        </div>
      </div>
    </div>
  </div>
  <table class='table'>
    <thead>
      <tr>
        <th><?php echo lang('index_fname_th');?></th>
        <th><?php echo lang('index_lname_th');?></th>
        <th><?php echo lang('index_email_th');?></th>
        <th><?php echo lang('index_groups_th');?></th>
        <th><?php echo lang('index_status_th');?></th>
        <th class='actions'><?php echo lang('index_action_th');?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user): ?>
        <tr>
          <td><?php echo htmlspecialchars($user->first_name, ENT_QUOTES, 'UTF-8');?></td>
          <td><?php echo htmlspecialchars($user->last_name, ENT_QUOTES, 'UTF-8');?></td>
          <td><?php echo htmlspecialchars($user->email, ENT_QUOTES, 'UTF-8');?></td>
          <td>
            <?php foreach ($user->groups as $group): ?>
              <?php echo anchor("auth/edit_group/" . $group->id, htmlspecialchars($group->name, ENT_QUOTES, 'UTF-8'));?>
              <i class='icon-trash'></i>
            <?php endforeach?>
          </td>
          <td><?php echo ($user->active) ? anchor("auth/deactivate/" . $user->id, lang('index_active_link')) : anchor("auth/activate/" . $user->id, lang('index_inactive_link'));?>
            <i class='icon-trash'></i></td>
            <td><?php echo anchor("auth/edit_user/" . $user->id, 'Edit');?>
              <i class='icon-edit'></i></td>
            </tr>
          <?php endforeach;?>
        </tbody>
      </table>
      <div class='panel-footer'>
        <div class='pull-right'>
          Showing 1 to 10 of 32 entries
        </div>
      </div>
    </div>