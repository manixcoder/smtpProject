 <!-- Content Wrapper. Contains page content -->  
 <div class="content-wrapper">    
 <!-- Content Header (Page header) -->    
 <section class="content-header">      
	<h1>        Order Place Message        <small>Control panel</small>      </h1>          
	</section>	<?php //echo $this->session->flashdata('success_msg'); ?>	
	<?php echo $this->session->flashdata('success_msg'); ?>		 
	<?php echo $this->session->flashdata('error_msg'); ?>		 
	   
	<div class="panel">        
	<div class="panel-body">
<?php echo form_open('Dashboard/insert_Order_Place_Message'); ?> 	
	<div class="form-group">				
	<label>Place Message English</label>                
	<input class="form-control" type="text" name="place_message"/>	
	<label>Place Message Arabic</label>                
	<input class="form-control" type="text" name="adminPlaceMessage"/>			
	<?php echo form_error('place_message'); ?>            
	</div>						
	<div class="form-group">                
	<input type="submit" class="btn btn-primary" value="Add" />            
 </div>        
	<?php echo form_close(); ?>
	
 </div>
			<table id="example" class="table table-striped table-bordered"  align='center' border='2' style="width:100%">
	 <thead>
			<tr><th>Id</th><th>Place Message</th><th>Place Message Arabic</th></tr>
			
 </thead>
	 <tbody>
		<tr>
			<th><?php echo $Place_Message[0]['message_Id']; ?></th>
			<th><?php echo $Place_Message[0]['admin_place_message']; ?></th>
			<th><?php echo $Place_Message[0]['adminPlaceMessage']; ?></th>
		</tr>
	 </tbody>
	 </table>
 <?php                
			// echo '<pre>';
			// print_r($Place_Message);
			?>	
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