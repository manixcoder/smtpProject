<?php
/*echo "<pre>";
print_r($Category);die;*/
?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
		<h1>
			Add Sub Category
			<small>Control panel</small>
		</h1>
		
	</section>
	<p id="demo_current_statussssssssssss"></p>
	<?php //echo $this->session->flashdata('success_msg'); ?>
	<?php echo $this->session->flashdata('success_msg'); ?>	
	<?php echo form_open_multipart('Dashboard/insert_category'); ?>
    <div class="panel">
        <div class="panel-body">
			<?php
				// print_r($validation);
			?>
			<div class="form-group">
				<select name="categoryId" required>
					<option value="">Select Category</option>
					<?php foreach($Category as $cat)
					{
					?>
						<option value="<?php echo $cat['cat_id'];?>">
							<?php echo $cat['category_name'];?>
							/
							<?php echo $cat['categoryNameArabic'];?>
						</option>
					<?php 
					}
					?>
				</select>
			</div>
			<div class="form-group">
                <label>Subcategory Name English</label>
                <input class="form-control" type="text" name="sub_Category" required/>
				<br>
				<div class="form-group Arabic-Section">
				 <label>Subcategory Name Arabic</label>
				 <!--textarea name="saisie" id="bar"  onKeyUp="transcrire()" placeholder="Enter Category Name Arabic" rows="4" class="cadr"></textarea-->
                <input class="form-control" type="text" name="subCategoryArabic" required/>
            </div>

            <!--div class="form-group Arabic-Section">
                <label for="categoryName">Subcategory Name Arabic</label>
                <textarea name="saisie" id="bar"  onKeyUp="transcrire()" placeholder="Enter Subcategory Name Arabic" rows="4" class="cadr" required>
                </textarea>
            </div-->
				<br>
				<label>Subcategory Image</label>
                <input class="form-control" type="file" name="category_image"/>
				<?php echo form_error('subcategory'); ?>
			</div>
			
			<div class="form-group">
                <input type="submit" class="btn btn-primary" value="Add" />
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>	
	<script src="<a class="vglnk" href="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js" rel="nofollow"></script>
	<script src="<a class="vglnk" href="https://oss.maxcdn.com/respond/1.4.2/respond.min.js" rel="nofollow"></script>
	<div class="container">
        <br />
		<table id="table" class="display" cellspacing="0" width="100%">
            <thead>
                <tr><th>Id</th><th>Sub Category</th><th>Sub Category Arabic</th><th>Category</th><th>Category Arabic</th><th>Action</th></tr>
			</thead>
            <tbody>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		var table;
		$(document).ready(function() 
		{
			table = $('#table').DataTable({
				"processing": true,
				"serverSide": true,
				"order": [],
				"aLengthMenu": [[100, 200, 300, -1], [100, 200, 300, "All"]],
				"ajax": {
					"url": "<?php echo site_url('Dashboard/ajax_list')?>",
					"type": "POST"
				},
				"columnDefs": [
				{ 
					"targets": [0],
					"orderable": false,
				},
				],
			});
		});
	</script>
	<script>
		var url="<?php echo base_url();?>";
		function ConfirmDelete(customers_id)
		{
			var x = confirm("Are you sure you want to delete?");
			if (x)
			{
				window.location = url+"Dashboard/delete_category/"+customers_id;
			}
			else
			{				
				return false;
			}
		}
	</script>
</div>
<!-- /.content-wrapper -->
