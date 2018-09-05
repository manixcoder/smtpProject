 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Location
        <small>Control panel</small>
      </h1>
      <style>
			.error_location {
			color: red;
			}
	  </style>
    </section>
	<?php echo $this->session->flashdata('success_msg'); ?>
	<?php echo $this->session->flashdata('error_msg'); ?>
		  
<?php echo form_open('Dashboard/insert_add_location_area'); ?>
<?php
// echo '<pre>';
	// print_r($static_citys);
?>
    <div class="panel">
        <div class="panel-body">
			<div class="form-group">
			<div class="form-group">
				<label>City</label>
				<select class="form-control" name="city">
				<option value="">Choose City</option>
				<?php
				 foreach($static_citys as $static_city) 
				{ 
					?>
				<option value="<?php echo $static_city->AI_cityId; ?>"><?php echo $static_city->city_name; ?></option>
				 <?php 
				}
				 ?>
				</select>
				<?php echo form_error('city'); ?>
				<label>Area English</label>
                <input class="form-control" type="text" name="area" placeholder="area English" value="<?php echo set_value('area'); ?>"/>
                <label>Area Arabic</label>
                <input class="form-control" type="text" name="areaArabic" placeholder="areaArabic" value="<?php echo set_value('areaArabic'); ?>"/>
				<?php echo form_error('area'); ?>
            </div>
			<div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add city" />
            </div>
        </div>
    </div>
	<?php
		// echo '<pre>';
	// print_r($location);
	?>
<?php echo form_close(); ?>
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
        "aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]]
    });
		} );
	</script>
	<?php
	// echo '<pre>';
	// print_r($location);
	// die;
	?>
	<table id="example" class="table table-striped table-bordered"  align='center' border='2' style="width:100%">
	 <thead>
<tr><th>Id</th><th>City</th><th>Area English</th><th>Area Arabic</th><th>Action</th></tr>
 </thead>
	 <tbody>
	 <?php $i=1; ?>
				<?php foreach($location as $value) 
				{ ?>
			<tr>
			<td><?php echo $i;$i++; ?></td>
			<td><?php echo $value['city_name']; ?></td>
			<td><?php echo $value['area_location']; ?></td>
			<td><?php echo $value['areaArabic']; ?></td>
			<td><a href='javascript:void(0)' onclick="deletelocation('<?php echo $value['city_location_id']; ?>')">delete</a>|<a href="<?php echo base_url()."Dashboard/edits_locations/".$value['city_location_id']; ?>">Edit</a></td>
			</tr>
			<?php } ?>	
			</tbody>
</table>
				<script>
				var url="<?php echo base_url();?>";
			function deletelocation(city_location_id)
				{
				  var x = confirm("Are you sure you want to delete?");
				  if (x)
				  {
					// alert(city_location_id)
				  window.location = url+"Dashboard/delete_add_location_area/"+city_location_id;
				  }else{
				  
					return false;
					}
				}
				</script>
</div>
<!-- /.content-wrapper -->
