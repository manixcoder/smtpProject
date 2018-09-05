<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="content-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Add Time
        <small>Control panel</small>
      </h1>
        <style>
            .error_location {
                color: red;
            }
        </style>
    </section>
    <?php echo $this->session->flashdata('success_msg'); ?>
        <?php echo $this->session->flashdata('error_msg'); ?>

            <?php echo form_open('Dashboard/insert_location'); ?>
                <?php
// echo '<pre>';
	// print_r($static_citys);
?>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" name="city" id="myselectcity" required>
                                        <option value="">Choose City</option>
                                            <?php foreach($static_citys as $static_city)
                                            {
                                            ?>
                                            <option value="<?php echo $static_city->AI_cityId; ?>">
                                                <?php echo $static_city->city_name; ?>
                                            </option>
                                            <?php 
                                            }
                                            ?>
                                    </select>
                                    <?php echo form_error('field name to display error'); ?>
                                        <label>Area</label>
                                        <div id="area_selected_hide">
                                            <select class="form-control" name="area" id="myselectcity_myselectcity">
                                                <option value="">Choose area</option>
                                            </select>
                                        </div>
                                        <br>
                                        <div id="area_selected"></div>
                                        <?php echo form_error('area'); ?>
                                            <label>Time</label>
                                            <br> From :
                                            <input type="time" id="timepicker-12-hr-clearable" name="time_to" class="-12-hr-clearable" required> &nbsp; &nbsp; &nbsp; &nbsp; to :&nbsp; &nbsp;
                                            <input type="time" id="timepicker-13-hr-clearable" name="time_from" class="-12-hr-clearable" required>
                                            <?php echo form_error('time_to'); ?>
                                            <?php echo form_error('time_from'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Add Time" />
                                </div>
                            </div>
                        </div>
                        <div class="loadersss"></div>
                        <style>
                            .loadersss {
                                position: fixed;
                                left: 0px;
                                top: 0px;
                                width: 100%;
                                height: 100%;
                                z-index: 9999;
                                background: url('<?php echo base_url();?>/i-washy/assets/loder/giphy.gif') 50% 50% no-repeat rgb(249, 249, 249);
                                /*background: url('http://a1professionals.net/i-washy/assets/loder/giphy.gif') 50% 50% no-repeat rgb(249, 249, 249);*/
                                opacity: .8;
                                display: none;
                            }
                        </style>
                        <script>
                            $(document).ready(function()
                             {
                                $('#myselectcity').change(function() 
                                {
                                    var Id = $("#myselectcity").val();
                                    dataString = 'location_city_id=' + Id;
                                    $.ajax({
                                        type: 'POST',
                                        url: '<?php echo base_url() ?>Dashboard/get_area_from_city',
                                        data: dataString,
                                        success: function(responce) {
                                            $('#area_selected_hide').hide()
                                            $('#area_selected').html(responce)
                                        }
                                    })
                                    $(".loadersss").fadeIn();
                                    $(".loadersss").fadeOut("slow");
                                })

                                // loder/giphy.gif
                                $('#myselectcity_myselectcity').click(function() {
                                    alert('please select city first');
                                })
                            })
                        </script>
                        <?php
                            // echo "<pre>";
                            // print_r($location);
                        ?>
<?php echo form_close(); ?>
                                <script>
                                    $(document).ready(function() 
                                    {
                                        $('#example').DataTable({
                                            "aLengthMenu": [
                                                [100, 200, 300, -1],
                                                [100, 200, 300, "All"]
                                            ]
                                        });
                                    });
                                </script>
                                <table id="example" class="table table-striped table-bordered" align='center' border='2' style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>City</th>
                                            <th>Area English</th>
                                            <th>Area Arabic</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1; ?>
                                            <?php
                                            //echo "<pre>";print_r($location);
                                            foreach($location as $value) 
                                            { 
                                            ?>
                                                <tr>
                                                    <?php  
                                                    $time_fir12 = $value->time_from;
                                                    $time_sec12 = $value->time_to;
                                                    $time_fir = date("h:i a", strtotime($time_fir12));
                                                    $time_sec = date("h:i a", strtotime($time_sec12));
                                                    $timesss = $time_fir . " to " . $time_sec;
                                                    ?>
                                                    <td>
                                                        <?php echo $i;$i++; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value->city; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $value->area; ?>
                                                    </td>
                                                     <td>
                                                      <?php echo $value->areaArabic; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $timesss; ?>
                                                    </td>
                                                    <td>
                                                        <a href='javascript:void(0)' onclick="deletelocation('<?php echo $value->adminAddress_id; ?>')">delete</a>|
                                                        <a href='<?php echo base_url('Dashboard/edit_location/'.$value->adminAddress_id); ?>'>Edit</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                    </tbody>
                                </table>
                                <script>
                                    var url = "<?php echo base_url();?>";

                                    function deletelocation(location_id) {
                                        var x = confirm("Are you sure you want to delete?");
                                        if (x) {
                                            // alert(url)
                                            window.location = url + "Dashboard/deletelocation/" + location_id;
                                        } else {

                                            return false;
                                        }
                                    }
                                </script>
                    </div>
                    <!-- /.content-wrapper -->