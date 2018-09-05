 <!-- Content Wrapper. Contains page content -->  
 <div class="content-wrapper">    
 <!-- Content Header (Page header) -->    
 <section class="content-header">      
	<h1>        User Detail        <small>Control panel</small>      </h1>          
	</section>	<?php //echo $this->session->flashdata('success_msg'); ?>	
	<?php echo $this->session->flashdata('success_msg'); ?>		 
	   
	<div class="panel">        
	<div class="panel-body">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable({
        "aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]]
    });
		} );
	</script>
	<table id="example" class="table table-striped table-bordered"  align='center' border='2' style="width:100%">
	 <thead>
<tr><th>Id</th><th>Name</th><th>Email</th><th>Mobile</th><th>User Image</th><th>Action</th></tr>
 </thead>
	 <tbody>
	 <?php foreach($user_detail as $value) { ?>
	 <tr>
	 <td><?php echo $value->user_id; ?></td>
	 <td><?php echo $value->name; ?></td>
	 <td><?php echo $value->email; ?></td>
	 <td><?php echo $value->mobile; ?></td>
	 <td><img src="<?php echo base_url()."/".$value->profile_image; ?>"/ height='100' width='100'></td>
	 <td><a href='javascript:void(0)' onclick="deleteuser('<?php echo $value->user_id; ?>')">delete</a>|<a href='javascript:void(0)' data-toggle="modal" data-target="#modalForm" onclick="ConfirmDelete(<?php echo $value->user_id;?>)">Detail</a></td>
	 
	 <?php } ?>
	 </tbody>
	 </table>
			
				<div class="modal fade" id="modalForm" role="dialog">
			<div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form" id="signupForm1">
				<div class="form-group">
                       <script>
				 var url="<?php echo base_url();?>";
				function ConfirmDelete(user_id)
				{
				var dataString = "user_id="+user_id;
				 $.ajax({
				 type:'POST',
				url:'<?php echo base_url() ?>Dashboard/user_detail_full',
				data:dataString,
				success:function(responce)
				{
				// alert(responce);
					$('#Order_management_detail_html').html(responce)
				}
				 })
				}
			</script>
                    </div>
					<div class="form-group">
					<div id="Order_management_detail_html">
					</div>
					</div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
			</form>
        </div>
    </div>
</div>
			
			
			
			
			
	 <script>
			
				var url="<?php echo base_url();?>";
			function deleteuser(user_id)
				{
				  var x = confirm("Are you sure you want to delete?");
				  if (x)
				  {
					// alert(url)
				  window.location = url+"Dashboard/delete_Userdetail/"+user_id;
				  }else{
				  
					return false;
					}
				}
				</script>
 </div>
 </div>
 