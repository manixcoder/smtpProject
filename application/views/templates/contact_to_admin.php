 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Feedback
        <small>Control panel</small>
      </h1>
      <style>
			.error_location {
			color: red;
			}
	  </style>
    </section>
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
        "aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]]
    });
		} );
	</script>
	<?php
	// echo '<pre>';
	// print_r($contact);
	// die;
	?>
	<table id="example" class="table table-striped table-bordered"  align='center' border='2' style="width:100%">
	 <thead>
<tr><th>Id</th><th>name</th><th>email</th><th>Time</th><th>Date</th><th>mobile</th><th>message</th></tr>
 </thead>
	 <tbody>
	 <?php $i=1; ?>
				<?php foreach($contact as $value) { ?>
			<tr>
			<?php 
			$values = $value->user_cur_date_time;  
			$current_date = date("d/m/Y", strtotime($values));
			$current_time = date("g:i a", strtotime($values));
			?>
			<td><?php echo $i;$i++; ?></td>
			<td><?php echo $value->name; ?></td>
			<td><?php echo $value->email; ?></td>
			<td><?php echo $current_time; ?></td>
			<td><?php echo $current_date; ?></td>
			<td><?php echo $value->mobile; ?></td>
			<td><?php echo $value->message; ?></td>
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
