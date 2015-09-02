<?php if (null !== $this->session->flashdata('message')) {
	$message = $this->session->flashdata('message');
}
?>
<div class="container">
  <div class="row">
    <?php echo $message?>
    <hr class="featurette-divider hidden-lg">
    <section id="pricing">
    <div class="row">
      <div class="section-title text-center wow fadeInUp">
        <h2><?php echo lang('heading_pricing');?></h2>
        <p><?php echo lang('sub_heading');?></p>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp">
        <div class="pricing-table text-center basic">
          <div class="price">
            <span class="plan">Basic Free</span>
            <span class="value"><small>Rs</small><strong>0</strong>/Year</span>
          </div>
          <ul class="text-center">
            <li><?php echo lang('label_view_record')?></li>
            <li>Unlimited Clients</li>
            <li>0 Orders</li>
            <li>0 invoices</li>
          </ul>
        </div>
          <div class="basic-label">
          You can only save and retrive client data.
          </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.3s">
        <div class="pricing-table text-center bronze">
          <div class="price">
            <span class="plan">Bronze</span>
            <span class="value"><small>Rs</small><strong>999</strong>/Year</span>
          </div>
          <ul class="text-center">
            <li><?php echo lang('label_view_record')?></li>
            <li>Unlimited clients</li>
            <li>1100 orders</li>
            <li>1200 invoices</li>
          </ul>
        </div>
         <div class="btn-subs">
          <a href="#"  data-toggle="modal" data-target="#confirmation" data-id="1" class="btn btn-success center"><?php echo lang('btn_subscribe');?></a>
      </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.6s">
        <div class="pricing-table text-center silver">
          <div class="price">
            <span class="plan">Silver</span>
            <span class="value"><small>Rs</small><strong>1999</strong>/year</span>
          </div>
          <ul class="text-center">
            <li><?php echo lang('label_view_record')?></li>
            <li>Unlimited clients</li>
            <li>6000 orders</li>
            <li>8000 Invoices</li>
          </ul>
        </div>
        <div class="btn-subs">
          <a href="#" data-toggle="modal" data-target="#confirmation" data-id="2"  class="btn btn-info"><?php echo lang('btn_subscribe');?></a>
        </div>
      </div>
      <div class="col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.9s">
        <div class="pricing-table text-center golden">
          <div class="price">
            <span class="plan">Gold</span>
            <span class="value"><small>Rs</small><strong>4999</strong>/Year</span>
          </div>
          <ul class="text-center">
            <li><?php echo lang('label_view_record')?></li>
            <li>Unlimited Orders</li>
            <li>Unlimited Clients</li>
            <li>Unlimited Invoices</li>
          </ul>
        </div>
        <div class="btn-subs">
          <a href="#" data-toggle="modal" data-target="#confirmation" data-id="3"  class="btn btn-warning"><?php echo lang('btn_subscribe');?></a>
        </div>
      </div>
       <!-- <div class="col-md-12 wow fadeInUp">
         <div class="special-plan text-center">
           <p><?php echo lang('special_plan_msg')?></p>
         </div>
       </div> -->
        </div>
      </section>
      <!--
      End #pricing
      ========================== -->
      <!--
      #contact
      ========================== -->
<section id="contact">
  <div class="row">
 <div class="section-title text-center wow fadeInDown">
   <h2><?php echo lang('heading_contact');?></h2>
   <p>Contact us 24/7 ,our team will help you.</p>
 </div>
    <div class="col-md-8 col-sm-9 wow fadeInLeft">
      <div class="contact-form clearfix">
        <form action="<?php echo base_url('customer_care/contact_save')?>" method="post">
          <div class="input-field">
            <input type="text" class="form-control" name="name" placeholder="Your Name" required="">
          </div>
          <div class="input-field">
            <input type="email" class="form-control" name="email" placeholder="Your Email [optional]">
          </div>
          <div class="input-field">
            <input type="phone" class="form-control" name="phone" placeholder="Your your phone no here..." required="">
          </div>
          <div class="input-field message">
            <textarea name="message" class="form-control" placeholder="Your Message" required=""></textarea>
          </div>
          <input type="submit" class="btn btn-price pull-right" value="SEND MESSAGE" id="msg-submit">
        </form>
        </div> <!-- end .contact-form -->
        </div> <!-- .col-md-8 -->
        <div class="col-md-4 col-sm-3 wow fadeInRight">
          <div class="contact-details">
            <span>Contact Information</span>
            <p>+9233-9145915 <br> <br> +92302-5945265</p>
          </div>
          </div> <!-- .col-md-4 -->
        </div>
      </section>
                <!--
                End #contact
                ========================== -->
              </div>
            </div>
            <?php $this->load->view('customer_care/model/subscriber_confirmation');?>