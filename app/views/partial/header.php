<!DOCTYPE html>
<html class='no-js' lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <title><?php echo $page_title;?></title>
    <meta content='codeMe' name='author'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=515">
    <link href='<?php echo find_url("css", "application-a07755f5.css");?>' rel="stylesheet" type="text/css" />
    <link href='<?php echo find_url("css", "jq_ui/jquery-ui.css");?>' rel="stylesheet" type="text/css" />
    <link href='<?php echo find_url("css", "font-awesome/css/font-awesome.min.css");?>' rel="stylesheet" type="text/css" />
    <!-- <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='<?php echo find_url("images", "favicon.ico");?>' rel="icon" type="image/ico" />
    <!-- <link href='<?php echo find_url("css", "bootstrap.min.css");?>' rel="stylesheet" type="text/css" /> -->
    <link href='<?php echo find_url("css", "custom.css");?>' rel="stylesheet" type="text/css" />
    <?php if ($page_title == 'Dashboard'): ?>
    <?php endif?>
    <script src='<?php echo find_url("js", "jquery-1.11.3.js");?>' type="text/javascript"></script>
<?php if ($page_title == 'Dashboard'): ?>
    <link href='<?php echo find_url("css", "dashboard.css");?>' rel="stylesheet" type="text/css" />
<?php endif?>
<?php if ($page_title == 'Order'): ?>
    <link href='<?php echo find_url("css", "checkbox.css");?>' rel="stylesheet" type="text/css" />
<?php endif?>
  </head>
  <body class='main page'>
    <!-- Navbar -->
    <div class='navbar navbar-default' id='navbar'>
      <a class='navbar-brand' href='#'>
        <img src="<?php echo find_url('images', 'logo.png');?>" alt="logo" style="height: 38px;">
        <?php echo 'Smart Tailor'?>
      </a>
      <ul class='nav navbar-nav pull-right'>
        <li class='dropdown'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-cog'></i>
            Settings
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href='#'>Invoice Setting</a>
            </li>
            <li>
              <a href='#'>Suit Rate</a>
            </li>
            <li>
              <a href='<?php echo base_url("currency")?>'>currency</a>
            </li>
            <li>
              <a href='#'>Setting 4</a>
            </li>
          </ul>
        </li>
        <li class='dropdown user'>
          <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
            <i class='icon-user'></i>
            <strong><?php echo $user_name;?></strong>
            <img class="img-rounded" src="<?php echo find_url('images', 'logo.png');?>" />
            <b class='caret'></b>
          </a>
          <ul class='dropdown-menu'>
            <li>
              <a href="<?php echo base_url('auth/edit_user/' . $user_id);?>">Edit Profile</a>
            </li>
            <li class='divider'></li>
            <li>
              <a href="<?php echo base_url('auth/logout');?>">Sign out</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
    <div id='wrapper'>
      <!-- Sidebar -->
      <section id='sidebar'>
        <i class='icon-align-justify icon-large' id='toggle'></i>
        <ul id='dock'>
          <li class="<?php echo ($page_title == 'Dashboard') ? 'active launcher' : 'launcher';?>">
            <i class='icon-dashboard'></i>
            <a href="<?php echo base_url('dashboard');?>">Dashboard</a>
          </li>
          <li class="<?php echo ($page_title == 'Clients') ? 'active launcher' : 'launcher';?>">
            <i class='icon-user'></i>
            <a href="<?php echo base_url('client');?>">Clients</a>
          </li>
          <li class="<?php echo ($page_title == 'Order') ? 'active launcher' : 'launcher';?>">
            <i class='icon-tags'></i>
            <a href="<?php echo base_url('order');?>">Order</a>
          </li>
          <li class="<?php echo ($page_title == 'Products') ? 'active launcher' : 'launcher';?>">
            <i class='icon-star'></i>
            <a href="<?php echo base_url('products');?>">Products</a>
          </li>
          <li class='launcher dropdown hover'>
            <i class='icon-print'></i>
            <a href='#'>Reports</a>
            <ul class='dropdown-menu'>
              <li class='dropdown-header'>Select Option</li>
              <li>
                <a href='#'>Daily</a>
              </li>
              <li>
                <a href='#'>Weekly</a>
              </li>
              <li>
                <a href='#'>Monthly</a>
              </li>
              <li>
                <a href='#'>Yearly</a>
              </li>
            </ul>
          </li>
          <li class="<?php echo ($page_title == 'Invoice') ? 'active launcher' : 'launcher';?>">
            <i class='icon-file-text-alt'></i>
            <a href='<?php echo base_url("invoice");?>'>Invoice</a>
          </li>
          <li class="<?php echo ($page_title == 'Settings') ? 'active launcher' : 'launcher';?>">
            <i class='icon-cog'></i>
            <a href='#'>Settings</a>
          </li>
          <li class="<?php echo ($page_title == 'Feedback') ? 'active launcher' : 'launcher';?>">
            <i class='icon-bug'></i>
            <a href='<?php echo base_url('customer_care/feedback');?>'>Feedback</a>
          </li>
        </ul>
        <div data-toggle='tooltip' id='beaker' title='Made by CodeME'></div>
      </section>
      <!-- Tools -->
      <section id='tools'>
        <ul class='breadcrumb' id='breadcrumb'>
          <li class='title active'><?php echo $page_title;?></li>
        </ul>
        <div id='toolbar'>
          <div class='btn-group'>
            <a class='btn' data-toggle='toolbar-tooltip' href='<?php echo base_url('client/add');?>' title='add client'>
              <i class='icon-plus'></i> Add Client
            </a>
            <a class='btn' data-toggle='toolbar-tooltip' href='<?php echo base_url("dashboard")?>' title='Search Client'>
              <i class='icon-search'></i> Search
            </a>
          </div>
        </div>
      </section>
      <div id="content">