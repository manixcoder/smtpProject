<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  //echo "<pre>";print_r($Category);die;
?>
<div class="content-wrapper" style="min-height: 946px;">
  <section class="content-header">
    <h1>
      Add Main Category
      <small>Preview</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Category List</a></li>
      <li class="active">Add Main Category</li>
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
          <form  method="Post" role="form" action="" lpformnum="131" enctype = "multipart/form-data" name="conversion">
            <div class="box-body">
              <div class="form-group">
                <label for="categoryName">Category Name English</label>
                <input class="form-control" id="categoryName" name="categoryName" placeholder="Enter Category Name"  type="text" required />
              </div>
              <div class="form-group Arabic-Section">
                <label for="categoryName">Category Name Arabic</label>
                <input class="form-control" id="categoryNameArabic" name="categoryNameArabic" placeholder="Enter Category Name Arabic"  type="text" required />
              
                  <!--textarea name="saisie" id="bar"  onKeyUp="transcrire()" placeholder="Enter Category Name Arabic" rows="4" class="cadr" required></textarea-->
               
                
              </div>
              <!--div class="form-group">
                <label for="custLastName">Category Name</label>
                <input class="form-control" id="custLastName" name="custLastName" placeholder="Enter Last Name" onkeyup="nospaces(this)" type="text" required />
              </div--> 
              <div class="box-footer">
                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
              </div>
            </div>
          </form>

          

        </div>
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Category Data Table</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row rest-list">
                <div class="col-sm-12 my-table">
                  <center>
                    <h3></h3>
                  </center>
                  <div class="responsive">
                    <div id="" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="dataTables_length" id="User_listingTable1_length">
                            <!--label>
                              Show 
                              <select name="User_listingTable1_length" aria-controls="User_listingTable1" class="form-control input-sm">
                                <option value="10">100</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                              </select>
                              entries
                            </label-->
                          </div>
                        </div>                       
                      </div>
                      <div class="row">
                        <div class="col-sm-12">
                         <table id="example1" class="table table-bordered table-hover dataTable" >
                            <thead>
                              <tr role="row"><th>Sr.No</th><th>Category Name Eng</th><th>Category Name Arabic</th><th>Action</th></tr>
                            </thead>
                            <tbody>
                              <?php 
                                $i=1;
                                foreach($Category as $value){ ?>
                                <tr role="row" class="odd">
                                  <td><?php echo $i++; ?></td>
                                  <td><?php echo $value->category_name; ?></td>
                                  <td><?php echo $value->categoryNameArabic; ?></td>
                                  <td><a href="javascript:void(0)" onClick="deleteCategory('<?php echo $value->cat_id; ?>')"><i class="fa fa-fw fa-trash-o"></i></a>|<a href="<?php echo base_url('Dashboard/editCategory/'.$value->cat_id); ?>">Edit</a></td> 
                                </tr>
                              <?php } ?>              
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="row">                      
                        <!--div class="col-sm-7">
                          <div class="dataTables_paginate paging_simple_numbers" id="User_listingTable1_paginate">
                            <ul class="pagination">
                              <li class="paginate_button previous disabled" id="User_listingTable1_previous"><a href="#" aria-controls="User_listingTable1" data-dt-idx="0" tabindex="0">Previous</a></li>
                              <li class="paginate_button active"><a href="#" aria-controls="User_listingTable1" data-dt-idx="1" tabindex="0">1</a></li>
                              <li class="paginate_button "><a href="#" aria-controls="User_listingTable1" data-dt-idx="2" tabindex="0">2</a></li>
                              <li class="paginate_button next" id="User_listingTable1_next"><a href="#" aria-controls="User_listingTable1" data-dt-idx="3" tabindex="0">Next</a></li>
                            </ul>
                          </div>
                        </div-->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
  function deleteCategory(id)
  {
    if(id)
    {
      var x = confirm("Are you sure you want to delete ?");
      
      if (x){
        window.location.href="<?php echo base_url(); ?>Dashboard/deleteCategory/"+id;
      }
      
      else {
        return false;
      }
    }
    
  }
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

  
