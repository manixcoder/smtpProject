<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($selected_category);die;
?>
<?php //echo "<pre>";print_r($data);die; ?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<br>
	<?php echo $this->session->flashdata('success_msg'); ?>
    <section class="content-header">
	 <h1>
        Add Price
        <small>Control panel</small>
      </h1>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Main content -->
    <section class="content">
     
<button class="btn btn-success btn-lg" data-toggle="modal" data-target="#modalForm">
    Add New
</button>
<!-- Modal -->
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
            
            <!-- Modal Body -->
            <div class="modal-body">
			<?php
			// echo '<pre>';
			// print_r($locat);
			?>
                <p class="statusMsg"><?php echo $this->session->flashdata('success_msg'); ?></p>
                <form role="form">
                    <div class="form-group">
                        <label for="inputName">Location</label><br>
						<?php
						// echo '<pre>';
						// print_r($locat);
						?>
						Check All: <input type='checkbox' value ='0' id="select"> 
                        <?php  foreach($locat as $location) { ?>
						<?php echo $location->city_name.' '.$location->area; ?>
						<input id='select_all_id' type='checkbox' class="check" value =<?php echo $location->adminAddress_id; ?> name="<?php echo $location->adminAddress_id; ?>"> 
						<?php } ?>
                    </div>
					<p id="demo_location"></p>
                    <div class="form-group">
                    	<br>
                        <label for="inputEmail">Subcategory</label>
            Check All: <input type='checkbox' value ='0' id="checkAll"> 
             <?php  
             foreach($selected_category as $category) 
             { 
        
              	if (!empty($category->sub[0]->s_Id)) 
              	{
              		
              		echo "<h3>". ucfirst($category->category_name)."</h3>";
              		foreach($category->sub as $sub) 
             		{

						echo "".ucfirst($sub->sub_Category)."";
						
						?>

						<input id='select_all_ids' type='checkbox' class="checkboxs" value =<?php echo $sub->s_Id ?> name="test_ids[]"> 
					<?php
             		} 
              		
              	}
              	else
              	{
              	
              	}


             	?>
				<?php //echo $category->sub_Category; ?>
				<!--input id='select_all_ids' type='checkbox' class="checkboxs" value =<?php echo $category->id; ?> name="test_ids[]"--> 

			<?php } ?>
			</div>
			<p id="demo_category"></p>
					<script>
					$(document).ready(function(){
					$('#select').on('click',function(){
						if(this.checked){
							$('.check').each(function(){
								this.checked = true;
							});
						}else{
							 $('.check').each(function(){
								this.checked = false;
							});
						}
					});
					
					$('#checkAll').on('click',function(){
						if(this.checked){
							$('.checkboxs').each(function(){
								this.checked = true;
							});
						}else{
							 $('.checkboxs').each(function(){
								this.checked = false;
							});
						}
					});
					
					});
				</script>
					<div class="form-group">
                        <label for="inputMessage">Price</label>
                        <input type='text' class="form-control" id="inputPrice" placeholder="Enter your Price" ></input>
                    </div>
					<p id="demo_datepicker"></p>
                </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" id='unchackall_from_price'>Close</button>
                <button type="button" class="btn btn-primary submitBtn" id="submitContactForm" data-dismiss="modal">SUBMIT</button>
            </div>
        </div>
    </div>
</div>
    </section>
	<script>
		$(document).ready(function(){
			$("#submitContactForm").click(function(){

			 var selectedValues ="";
			 $checkedCheckboxes = $(".check:checkbox:checked");
			  $checkedCheckboxes.each(function () {
			  selectedValues +=  $(this).val() +",";
				});
			var selectedValuess="";
			 $checkedCheckboxes = $(".checkboxs:checkbox:checked");
			  $checkedCheckboxes.each(function () {
			  selectedValuess +=  $(this).val() +",";
				});
			//demo_category
				var location = selectedValues;
				var category = selectedValuess;
				var inputPrice = $('#inputPrice').val();
				if(location == ""){
				text_demo_location = '<span class="error"> Please select location' + '</span>';
				document.getElementById("demo_location").innerHTML = text_demo_location;
				return false;
				}else{
				text_demo_location = '';
				document.getElementById("demo_location").innerHTML = text_demo_location;
				}
				
				if(category == ""){
				text_demo_category = '<span class="error"> Please select category' + '</span>';
				document.getElementById("demo_category").innerHTML = text_demo_category;
				return false;
				}else{
				text_demo_location = '';
				document.getElementById("demo_category").innerHTML = text_demo_location;
				}
				
				if(inputPrice == ""){
				text_demo_inputPrice = '<span class="error"> Please enter price' + '</span>';
				document.getElementById("demo_datepicker").innerHTML = text_demo_inputPrice;
				return false;
				}else if(inputPrice.match(/^[a-zA-Z]+$/))
				{
				text_demo_inputPrice = '<span class="error"> Please enter Integer price' + '</span>';
				document.getElementById("demo_datepicker").innerHTML = text_demo_inputPrice;
				return false;
				}else{
				text_demo_location = '';
				document.getElementById("demo_datepicker").innerHTML = text_demo_location;
				}
			var dataString = "location="+location+"&category="+category+"&price="+inputPrice;
			$.ajax({
            type:'POST',
            url:"<?php echo base_url('/'); ?>Dashboard/insert_full_category",
            data:dataString,
            success: function(responce) {
			// print_r();
				window.location.href = "<?php echo base_url('Dashboard/pricedashboard'); ?>";
				}
			})
			});
		});
			$(document).ready(function(){
					$('#unchackall_from_price').click(function(){
							 $('.check').each(function(){
								this.checked = false;
							});
							 $('.checkboxs').each(function(){
								this.checked = false;
							});
						 $('#checkAll').each(function(){
								this.checked = false;
							});
							 $('#select').each(function(){
								this.checked = false;
							});
							$('#inputPrice').val('');
					});
					});
	</script>
	<script>
		$(document).ready(function(){
			$('#example').DataTable({
        	"aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]]
   			 });
		});
	</script>
		<?php //print_r($data); ?>
	<table id="example" class="table table-striped table-bordered" align='center' border='2' width='100%'>
	<thead>
	<tr><th>Id</th><th>Location</th><th>Sub Category</th><th>Category</th><th>Price</th><th>Action</th></tr>
	</thead>
	<tbody>
		<?php $i=1; ?>
		<?php
		 foreach($data as $value) {  ?>
			<tr>
			<td><?php echo $i;$i++; ?></td>
			<td><?php echo $value->area; ?></td>
			<td><?php echo $value->sub_Category; ?></td>
			<td><?php echo $value->category_name; ?></td>
			<td><?php echo $value->price; ?></td>			
			<td><a href="javascript:void(0)" onclick="ConfirmDelete(<?php echo $value->Id;?>)">Delete</a>
			|<a href="<?php echo base_url('Dashboard/edit_pricedashboard/'.$value->Id); ?>">Edit</a></td>
			</tr>
			<?php } ?>	
			</tbody>
</table>
	<script>
				var url="<?php echo base_url();?>";
				function ConfirmDelete(Id)
				{
					var x = confirm("Are you sure you want to delete?");
					if (x)
				  {
				  window.location = url+"Dashboard/delete_pricedashboard/"+Id;
				  }else{
					return false;
					}
				}
	</script>
  </div>