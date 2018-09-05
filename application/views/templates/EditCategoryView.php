<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($category);die;
?>
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content-header">
    <h1>
      Update Main Category
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Main Category List</a></li>
      <li class="active">Update Main Category</li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Main Category Form</h3>
          </div>
          <h3 class="sus"><?php echo $this->session->flashdata('message_name'); ?></h3>
          <?php $this->session->unset_userdata('message_name'); ?>
          <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data">
            <div class="box-body">
              <div class="form-group">
                <label for="categoryName">Category Name English</label>
                <input class="form-control" id="" name="categoryName" placeholder="Enter CategoryName" value="<?php echo $category[0]->category_name; ?>"  type="text" required />
              </div>
              <div class="form-group">
                <label for="categoryName">Category Name Arabic</label>
                <input class="form-control" id="" name="categoryNameArabic" placeholder="Enter CategoryName Arabic" value="<?php echo $category[0]->categoryNameArabic; ?>"  type="text" required />
              </div>
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Update">
              </div>
            </div>
          </form>
        </div>        
        </div>
      </div>
    </section>
  </div>
  <script type="text/javascript">
    function nospaces(t)
    {
      if(t.value.match(/\s/g))
      {
        alert('Sorry, you are not allowed to enter any space');
        t.value=t.value.replace(/\s+/g,'');
      }
    }
  </script>

  <script>
  function editCategory(id)
  {
    var x = confirm("Are you sure you want to block this allergy ?");
    if (x)
    {
      window.location.href="<?php echo base_url(); ?>Dashboard/editCategory/"+id;
    }
    else
    {
      return false;
    }
  }
</script>
  
