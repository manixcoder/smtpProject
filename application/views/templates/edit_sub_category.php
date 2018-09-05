<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
 <?php  // echo "<pre>"; print_r($category);die;?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Sub Category
        <small>Control panel</small>
      </h1>
      <?php
	 /* echo "<pre>";
	  print_r($mess_post);die;*/
	  ?>
    </section>
	<p id="demo_current_statussssssssssss"></p>
	<?php //echo $this->session->flashdata('success_msg'); ?>
	<?php echo $this->session->flashdata('success_msg'); ?>
	<?php echo form_open_multipart('Dashboard/update_category'); ?>
            <!-- Modal Body -->
            <div class="modal-body">
					<div class="form-group">
				<label for="inputMessage">SubCategory Image</label> 
                <img src="<?php echo base_url().$mess_post[0]->category_image; ?>" height= "100" width="100">
					<br>
                    <br>
                        <label for="inputMessage">Sub Category</label>
             <input type='text' class="form-control" name="sub_Category" value="<?php echo $mess_post[0]->sub_Category; ?>" required></input>
              <br>
                        <label for="inputMessage">Category Name Arabic</label>
             <input type='text' class="form-control" name="categoryNameArabic" value="<?php echo $mess_post[0]->subCategoryArabic; ?>" required></input>
			 
			 <input type='hidden' class="form-control" name="s_Id" value="<?php echo $id; ?>"></input>
						<p id="category_edit"></p>
						<p class="Price_error" id="Price_error" style="margin: 0; display: none;">Price is unavailable</p>
                    </div>
					<div class="form-group">
					<label for="inputMessage">Subcategory Image</label>
					<input type='file' class="form-control" name="Category_Imagess"></input>
					</div>
					<div class="form-group">
                        <label for="inputMessage">Category</label>
                        <select name="categoryId" id="categoryId_select">
                        	<?php foreach($category as $cat)
                            {
                        		echo "<pre>";print_r($cat);
                        		?>
                        		<option value="<?php echo $cat->cat_id;?>" <?php if($mess_post[0]->categoryId == $cat->cat_id)
                                { 
                                    echo "selected";
                                }?>><?php echo $cat->category_name;?>/<?php echo $cat->categoryNameArabic;?></option>
                        		<?php
                        	} ?>
						<!--option value="1" <?php if($mess_post[0]->categoryId == '1'){ echo "selected";}?>>Laundry</option>
						<option value="2" <?php if($mess_post[0]->categoryId == '2'){ echo "selected";}?>>Men</option>
						<option value="3" <?php if($mess_post[0]->categoryId == '3'){ echo "selected";}?>>Women</option>
						<option value="4" <?php if($mess_post[0]->categoryId == '4'){ echo "selected";}?>>Household</option-->
						</select>
						<p id="demo_promo_code"></p>
						<p class="promo_code_error" id="promo_code_error" style="margin: 0; display: none;">Promo Code is unavailable</p>
                    </div>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <input type="submit" value="SUBMIT" class="btn btn-primary submitBtn" id="submitContactForm" data-dismiss="modal"></input>
            </div>
			<?php echo form_close(); ?>
        </div>
<!-- /.content-wrapper -->
