<?php
   // defined('BASEPATH') OR exit('No direct script access allowed');
   // $admin_session = $this->session->userdata('admin_session');
   // if(!is_array($admin_session[0]) && $admin_session[0]=='')
   // {
     // header("location:" . base_url() . "admin");
   // } 
   ?>
<style>
   .lst-icon 
   {
   color:#ff0000; 
   } 
   .error 
   {
   color:#ff0000;font-weight: bold;
   }
   .abc_test_for 
   {
      width: 100%;
      overflow: scroll;
   }
</style>
<style>
   .sus > div 
   {
      background: rgba(7, 128, 0, 0.4) none repeat scroll 0 0;
      border: 1px solid rgb(4, 128, 0);
      border-radius: 3px;
      font-family: "Source Sans Pro",sans-serif!important;
      font-size: 14px!important;
      margin: 23px auto;
      padding: 10px;
      text-align: center;
      width: 92%;
   }
   /*responsive table add scrolll bar*/
   @media screen and (max-width: 1157px) 
   {
   .responsive .col-sm-12 
   {
   overflow: auto;
   }
   }  
</style>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>i-washy</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/bootstrap/css/bootstrap.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/skins/_all-skins.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/flat/blue.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/morris/morris.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/datepicker/datepicker3.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/daterangepicker/daterangepicker.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/dist/css/AdminLTE.min.css">
      
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
      <header class="main-header">
         <a href="<?php echo base_url()?>" class="logo">
         <span class="logo-mini">i-W</span>
         <span class="logo-lg"><b>i-</b>Washy</span>
         </a>
         <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <img src="<?php echo base_url();?>assets/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                     <span class="hidden-xs"><?php //echo $admin_session[0]['email']; ?></span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="user-header">
                           <img src="<?php echo base_url();?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                           <p>
                              Web Admin
                              <small>Member since Dec. 2017</small>
                           </p>
                        </li>
                        <li class="user-body">
                           <div class="row">
                           </div>
                        </li>
                        <li class="user-footer">
                           <div class="pull-left">
                              <a href="<?php echo base_url()?>Dashboard/edit_admin_profile" class="btn btn-default btn-flat">Profile</a>
                           </div>
                           <div class="pull-right">
                              <a href="<?php echo base_url('Welcome/sign_out');?>" class="btn btn-default btn-flat">Sign out</a>
                           </div>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <aside class="main-sidebar">
         <section class="sidebar">
            <div class="user-panel">
               <div class="pull-left image">
                  <img src="<?php echo base_url();?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
               </div>
               <div class="pull-left info">
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
               </div>
            </div>
            <ul class="sidebar-menu">
               <li class="header">MAIN NAVIGATION</li>
               <li class="<?php echo (isset($nav) && $nav =='dashboard')? 'active' : "";  ?> treeview">
                  <a href="<?php echo base_url('Dashboard');?>">      
                  <i></i>
                  <span>Dashboard</span> 
                  </a> 
               </li>  
               <li class="treeview">
                  <a href="<?php  echo base_url('Dashboard/addCategory');?>">
                  <i></i> <span>Add Main Category</span> 
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/add_category');?>">
                  <i></i> <span>Add Sub Category</span> 
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/add_location_area');?>">
                  <i></i><span>Add Location</span>
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/add_location');?>">
                  <i></i><span>Time Management</span> 
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/pricedashboard');?>">
                  <i></i><span>Price</span> 
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/Promo_Code');?>">
                  <i></i><span>Promo Code</span> 
                  </a>              
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/Order_management');?>">
                  <i></i><span>Order Management</span> 
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/Order_Tracking');?>">
                  <i></i><span>Order Tracking</span> 
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/Feedback');?>">
                  <i></i><span>Feedback</span> 
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/Userdetail');?>">
                  <i></i><span>User</span> 
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/contact_to_admin');?>">
                  <i></i><span>Admin Feedback</span>
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/slider_Images');?>">
                  <i></i><span>Slider Images</span>
                  </a>
               </li>
               <li class="treeview">
                  <a href="<?php echo base_url('Dashboard/Order_Place_Message');?>">
                  <i></i><span>Order Place Message</span>
                  </a>
               </li>
            </ul>
         </section>
         <!--/.sidebar -->
      </aside>