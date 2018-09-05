<div class="content-wrapper">
	<h1>
        Order Tracking
        <small>Control panel</small>
      </h1>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
        "aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]]
    });
		} );
	</script>
	<table id="example" class="table table-striped table-bordered" align='center' border='2' width='100%'>

	<thead>

	<tr><th>Id</th><th>Order Id</th><th>Tracking order </th><th>Order Status</th></tr>

	</thead>

	<tbody>

		<?php $i=1; ?>

		<?php foreach($Order_Tracking as $value) { ?>

			<tr>

			<td><?php echo $i;$i++; ?></td>

			<td><?php echo $value['order_id']; ?></td>
			
			<td><?php echo $value['name']; ?></td>
			

			<td><?php echo $value['orderStatus_text']; ?></td>

			</tr>

			<?php } ?>	

			</tbody></table>
  </div>