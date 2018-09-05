 <!-- Content Wrapper. Contains page content -->  
 <style>
	.error {
    color: red;
	}
 </style>
 <div class="content-wrapper">    
 <!-- Content Header (Page header) -->    
 <section class="content-header">      
	<h1>        Change Admin Detail        <small>Control panel</small>      </h1>          
	</section>	<?php //echo $this->session->flashdata('success_msg'); ?>	
	<?php echo $this->session->flashdata('success_msg'); ?>		 
	   
	<div class="panel">        
	<div class="panel-body">
<?php echo form_open('Dashboard/update_admin_profile'); ?> 	
	<div class="form-group">				
	<label>Update Mobile No</label>                
	<input class="form-control" type="number" name="contact_no" required/>				
	<?php echo form_error('contact_no'); ?>            
	</div>
	<div class="form-group">                
	<input type="submit" class="btn btn-primary" value="Add" />            
 </div>        
	<?php echo form_close(); ?>
	<h4>Admin Mobile No. <?php  
		print_r($admin_no[0]['contact_no']);
	?></h4>
 </div>
 
	
			
 </div>	
   
 </div>