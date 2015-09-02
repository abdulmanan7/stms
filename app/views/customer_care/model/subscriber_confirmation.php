<?php
$username = $this->session->userdata('username');
$user_id = $this->session->userdata('user_id');
?>
<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&amp;times;</button>
            <h4 class="modal-title" id="myModalLabel">Please confirm your request</h4>
            </div>
            <div class="modal-body">
            <div class="help-block">Once you submit our team will contact you 12 hours or less !</div>
                <form action="<?php echo base_url('customer_care/subscribe')?>" method="POST" role="form">
                <input type="hidden" value="<?php echo $user_id;?>" name='user_id'>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" value="" class="form-control" placeholder="please enter your name" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" value="<?php echo $username;?>" class="form-control" placeholder="please enter your phone no" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Pakage</label>
                        <select name="pakage" class="form-control" id="pakage" required="required">
                            <option value="1">Bronze</option>
                            <option value="2">Silver</option>
                            <option value="3">Gold</option>
                        </select>
                    </div>
                    <p class="bronze-desc">
                        Pakage Name : <b>Brongz</b><br>
                        validatity : 1 Year</br>
                        Charges : Rs 999 only
                    </p>
                    <p class="silver-desc">
                        Pakage Name : <b>Silver</b><br>
                        validatity : 1 Year</br>
                        Charges : Rs 1999 only
                    </p>
                    <p class="gold-desc">
                        Pakage Name : <b>Gold</b><br>
                        validatity : 1 Year</br>
                        Charges : Rs 4999 only
                    </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Subscribe Now</button>
        </div>
                </form>
    </div>
  </div>
</div>
<script>
    $(document).ready(function($) {
        $('#confirmation').on('show.bs.modal', function (e) {

        pakage_id = $(e.relatedTarget).data('id');
        if (pakage_id == 1) {
          $('select').val('1');
          $('.bronze-desc').css('display', 'block');
           $('.silver-desc').css('display', 'none');
             $('.gold-desc').css('display', 'none');
      };
      if (pakage_id == 2) {
          $('select').val('2');
          $('.silver-desc').css('display', 'block');
            $('.gold-desc').css('display', 'none');
            $('.bronze-desc').css('display', 'none');
      };
      if (pakage_id==3) {
          $('select').val('3');
          $('.gold-desc').css('display', 'block');
          $('.silver-desc').css('display', 'none');
            $('.bronze-desc').css('display', 'none');

      };
});
        $('body').on('change', '#pakage', function(event) {
            pakage_id = $('select').val();
        if (pakage_id == 1) {
          $('select').val('1');
          $('.bronze-desc').css('display', 'block');
           $('.silver-desc').css('display', 'none');
             $('.gold-desc').css('display', 'none');
      };
      if (pakage_id == 2) {
          $('select').val('2');
          $('.silver-desc').css('display', 'block');
            $('.gold-desc').css('display', 'none');
            $('.bronze-desc').css('display', 'none');
      };
      if (pakage_id==3) {
          $('select').val('3');
          $('.gold-desc').css('display', 'block');
          $('.silver-desc').css('display', 'none');
            $('.bronze-desc').css('display', 'none');

      };
        });
  });
</script>