 <!-- Content Wrapper. Contains page content -->   
 <div class="content-wrapper">     
 <!-- Content Header (Page header) -->     
 <section class="content-header">       
 <h1>        Update Price <small>Control panel</small>      </h1>       
 <style>			 
 .error_location 
 {			 
 color: red;			 
 }	   
 </style>     
 </section>	 
 <?php echo $this->session->flashdata('success_msg'); ?>	 
 <?php //echo $this->session->flashdata('error_msg'); ?>		   
 <?php echo form_open('Dashboard/update_pricedashboard'); ?>  
 <?php		
 
 // print_r($edit_dash);
 ?>  
 <div class="panel">         
 <div class="panel-body">			 
 <div class="form-group">			 
 <input type="hidden" value="<?php echo $edit_dash[0]['Id'] ?>" name="time_to">			 
 <div class="form-group">				 
 <label>Location</label>								 
 <select class="form-control" name="Location">				 
 <option value="">Select Location</option>				 
 <?php  foreach($locat as $location) { ?>		 
 <option value="<?php echo $location->adminAddress_id; ?>" <?php if($location->adminAddress_id == $edit_dash[0]['location_Id']){ echo "selected";}?>>
 <?php echo $location->area; ?></option>		
 <?php } ?>				 
 </select>				 
 <?php echo form_error('field name to display error'); ?>				 
 <label>Subcategory</label>				 
 <select class="form-control" name="Category">				 
 <option value="">Select Category</option>                 
 <?php  foreach($selected_category as $category) { ?>		 
 <option value="<?php echo $category->id; ?>" <?php if($category->id == $edit_dash[0]['category_id']){ echo "selected";}?>>
 <?php echo $category->sub_Category; ?></option>			
 <?php } ?>			 
 </select>				 
 <?php echo form_error('area'); ?>                 
 <label>Price</label><br>			 
 <input type="text" class="form-control" value="<?php echo $edit_dash[0]['price'] ?>" name="Price" required>
 <?php echo form_error('time_to'); ?>
 <?php echo form_error('time_from'); ?> 
 </div>			 
 <div class="form-group"> 
 <input type="submit" class="btn btn-primary" value="Update price" />             </div></div></div>	 
 <?php		// echo '<pre>';	// print_r($location);	?> 
 <?php echo form_close(); ?>	 
 <script>		 
 $(document).ready(function() {			 
 $('#example').DataTable();		 
 } );	
 </script><!-- /.content-wrapper -->