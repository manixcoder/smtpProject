<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($static_citysss);die;
?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <section class="content-header">
      <h1>
        Update Area
        <small>Control panel</small>
      </h1>
      <style>
			.error_location {
			color: red;
			}
	  </style>
    </section>
	
<?php echo form_open('Dashboard/updates_locations'); ?>
    <div class="panel">
        <div class="panel-body">
			<div class="form-group">
			<div class="form-group">
				<label>City</label>
				<input type="text" class="form-control" name="city" id="area" value="<?php echo $static_citysss['0']['city_name']; ?>" disabled/>
				<?php echo form_error('field name to display error'); ?>
	<input type="hidden" class="form-control" name="city_location_id" id="area" value="<?php echo $static_citysss['0']['city_location_id']; ?>" />
				<label>Area English</label>
				<input type="text" class="form-control" name="area_location" id="area" value="<?php echo $static_citysss['0']['area_location']; ?>" />
				<br>
				<label>Area Arabic</label>
				<input type="text" class="form-control" name="areaArabic" id="area" value="<?php echo $static_citysss['0']['areaArabic']; ?>" />
				<br>
			<div class="form-group">
                <input type="submit" class="btn btn-primary" value="Update Area" />
            </div>
        </div>
    </div>
	<div class="loadersss"></div>
<?php echo form_close(); ?>
<!-- /.content-wrapper -->
