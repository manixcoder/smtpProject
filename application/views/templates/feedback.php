 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Feedback
        <small>Control panel</small>
      </h1>
      
    </section>
	<?php echo $this->session->flashdata('success_msg'); ?>
	<?php //echo $this->session->flashdata('error_msg'); ?>
		  
<?php echo form_open('Dashboard/insert_location'); ?>
<?php
// echo '<pre>';
	// print_r($static_citys);
?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <div class="panel">
	<?php
		// echo '<pre>';
	// print_r($feed);
	?>
<?php echo form_close(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
	?>
	<table id="example" class="table table-striped table-bordered"  align='center' border='2' style="width:100%">
	 <thead>
<tr><th>Id</th><th>Name</th><th>Email</th><th>Time</th><th>Date</th><th>Mobile</th><th>AppRating</th><th>Rating Comment</th></tr>
 </thead>
	 <tbody>
	 <?php $i=1; ?>
				<?php foreach($feed as $value) { ?>
			<tr>
			<?php 
			$values = $value->current_date_time;  
			$current_date = date("d/m/Y", strtotime($values));
			$current_time = date("g:i a", strtotime($values));
			?>
			<td><?php echo $i;$i++; ?></td>
			<td><?php echo $value->name; ?></td>
			<td><?php echo $value->email; ?></td>
			<td><?php echo $current_time; ?></td>
			<td><?php echo $current_date; ?></td>
			<td><?php echo $value->mobile; ?></td>
			<td><?php echo $value->appRating; ?></td>
			<td><?php echo $value->ratingComment; ?></td>
			</tr>
			<?php } ?>	
			</tbody>
</table>
</div>
<!-- /.content-wrapper -->
