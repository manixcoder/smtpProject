<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content-header">
    <h1>
      Add Category
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Category List</a></li>
      <li class="active">Add Category</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Client Form</h3>
          </div>
          <h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3>
          <?php $this->session->unset_userdata('message_name'); ?>
          <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="referralCode">Referral Code(Optional)</label>
                <input class="form-control" id="referralCode"  name="custUsedReferralId" placeholder="Enter Referral Code"  type="number"/>
              </div> 
              <div class="form-group">
                <label for="custFirstName">First Name</label>
                <input class="form-control" id="custFirstName" name="custFirstName" placeholder="Enter First Name" onkeyup="nospaces(this)" type="text" required />
              </div> 
              <div class="form-group">
                <label for="custLastName">Last Name</label>
                <input class="form-control" id="custLastName" name="custLastName" placeholder="Enter Last Name" onkeyup="nospaces(this)" type="text" required />
              </div>
              <div class="form-group">
                <label for="custUserName">Username </label>
                <input class="form-control" id="custUserName" name="custUserName" placeholder="Enter Username" onkeyup="nospaces(this)" type="text" required/>
                <span class="error"><?php echo form_error('custUserName'); ?></span>
              </div>
              <div class="form-group">
                <label for="custEmail">Email </label>
                <input class="form-control" id="custEmail" name="custEmail" placeholder="Enter Email" onkeyup="nospaces(this)" type="email" required/>
                <span class="error"><?php echo form_error('custEmail'); ?></span> 
              </div>
              <div class="form-group">
                <label for="fourDigitPin">4 Digit Pin </label>
                <input class="form-control" id="fourDigitPin" name="fourDigitPin" placeholder="Enter 4 Digit Pin" onkeyup="nospaces(this)" type="text" maxlength="4"  onkeypress='return event.charCode >= 48 && event.charCode <= 57' required/>
              </div>              
              <div class="form-group">
                <label for="password">Password </label>
                <input class="form-control" id="password" name="custPassword" placeholder="Enter Password" onkeyup="nospaces(this)" type="password" rrequired/>
              </div>
              <div class="form-group">
                <label>Date of Birth</label>                
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" id="datepicker2" class="form-control pull-right" name="custDOB">
                </div>
              </div>               
              <div class="form-group">
                <label for="ProfileImage">Profile image </label>
                <input class="form-control" id="ProfileImage" name="custProfileImage" accept="image/x-png,image/gif,image/jpeg" type="file" />
              </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript">
    function nospaces(t)
    {
      if(t.value.match(/\s/g))
        {
          alert('Sorry, you are not allowed to enter any space');
          t.value=t.value.replace(/\s+/g,'');
        }
    }
  </script>