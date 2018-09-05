 <!-- Content Wrapper. Contains page content -->  
 <div class="content-wrapper">    
 <!-- Content Header (Page header) -->    
 <section class="content-header">      
	<h1>        Add slider Images        <small>Control panel</small>      </h1>          
	</section>	<?php //echo $this->session->flashdata('success_msg'); ?>	
	<?php echo $this->session->flashdata('success_msg'); ?>		 
	   
	<div class="panel">        
	<div class="panel-body">
<?php echo form_open_multipart('Dashboard/add_slider_Images'); ?> 	
	<div class="form-group">				
	<label>Slider Image</label>                
	<input class="form-control" type="file" name="category_image"/>				
	<?php echo form_error('subcategory'); ?>            
	</div>						
	<div class="form-group">                
	<input type="submit" class="btn btn-primary" value="Add" />            
 </div>        
	<?php echo form_close(); ?>
	
 </div>
 <?php                
			foreach ($image as $values)
			{
			$string_slider_image = str_replace(' ', '_', $values->slider_image);
			
			?><img src="<?php echo base_url(); ?>/<?php echo $string_slider_image; ?>" height="100" width="100">
			<a href="javascript:void(0)" onclick="ConfirmDelete(<?php echo $values->Id;?>)">Delete</a>
			<?php } ?>	
 </div>	
			<script>

			 var url="<?php echo base_url();?>";

			function ConfirmDelete(Id)
				{
				  var x = confirm("Are you sure you want to delete?");
				  if (x)
				  {
				  // alert('hello my world');
				  window.location = url+"Dashboard/delete_slider_Images/"+Id;
				  }else{
					return false;
					}
				}
			</script>
 </div>