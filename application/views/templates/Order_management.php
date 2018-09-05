<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// echo '<pre>';
    // print_r($result); 
?>
<div class="content-wrapper">
    <section class="content-header">
        <p id="demo_current_statussssssssssss"></p>
        <h1>
        Order Management
        <small>Control panel</small>
      </h1>
    </section>
    <?php echo $this->session->flashdata('success_msg'); ?>      
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#example').DataTable({
                            "aLengthMenu": [
                                [100, 200, 300, -1],
                                [100, 200, 300, "All"]
                            ]
                        });
                    });
                </script>
                <?php
                $ip = $_SERVER['REMOTE_ADDR'];  
                //$_SERVER['REMOTE_ADDR'];
                // $ip = $_SERVER['REQUEST_TIME'];  //$_SERVER['REMOTE_ADDR'];
                $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
                $ipInfo = json_decode($ipInfo);
                $timezone = $ipInfo->timezone;
                date_default_timezone_set($timezone);
                $datesss = date("Y/m/d g:i a");
                $to_time = strtotime($datesss);
                // print_r($to_time);
                ?>
                    <div class='abc_test_for'>
                        <table id="example" class="table table-striped table-bordered" align='center' border='2' style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Order Id</th>
                                    <th>User</th>
                                    <th>language</th>
                                    <th>Mobile</th>
                                    <th>Pickup Time</th>
                                    <th>Pickup Date</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Special Note</th>
                                    <th>Location</th>
                                   
                                    <!--
                                    <th>Location English</th>
                                    <th>Location Arabic</th>
                                    -->
                                    <th>Promo code</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; 
                                 foreach($result as $value) 
                                 {
                                ?>
                             <tr>
                            <?php 
                            $current_date_times = $value->current_date_time;
                            $from_time = strtotime($current_date_times);
                            $unixtime = round(abs($to_time - $from_time));
                            $current_timesss = date("g:i a",$unixtime);
                            $current_date = date("d/m/Y", strtotime($current_date_times));
                            $current_times = date("g:i a", strtotime($current_date_times));
                            // $interval = date_diff($datesss, $current_times); user_adderss
                            $address = $value->user_adderss." ".$value->user_bulding_number." ".$value->user_flat_number." ".$value->user_floor_number." "." ".$value->area." ".$value->city_name; 

                            ?>
                                                <td>
                                                    <?php echo $i;$i++; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->order_id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->user_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->languageType; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->user_mobile; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->order_pickupTime; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->order_pickupDate; ?>
                                                </td>
                                                <td>
                                                    <?php echo $current_date; ?>
                                                </td>
                                                <td>
                                                    <?php echo $current_times; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->specialNote; ?>
                                                </td>
                                                <td>
                                                    <?php echo $address; ?>
                                                </td>
                                                <td>
                                                    <?php echo $value->order_promoCode; ?>
                                                </td>
                                                <td><a href='javascript:void(0)' data-toggle="modal" data-target="#modalForm" onclick="ConfirmDelete(<?php echo $value->order_id;?>)">Detail</a>|<a href='javascript:void(0)' data-toggle="modal" data-target="#modalFormmodalForm" data-name="<?php echo $value->order_id ?>" data-id="<?php echo $value->order_userId ?>" onclick="current_status(this)">Status</a></td>
                                        </tr>
                                        <?php } ?>

                                            <div class="modal fade" id="modalFormmodalForm" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">
                                                                <span aria-hidden="true">&times;</span>
                                                                <span class="sr-only">Close</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="inputMessage">Status</label>
                                                                <input type='text' class="form-control" id="current_statusss" placeholder="Enter current status" required></input>
                                                                <p id="demo_current_statusss"></p>
                                                                <p id="demo_inputPrice"></p>
                                                                <p class="Price_error" id="current_status" style="margin: 0; display: none;">Price is unavailable</p>
                                                            </div>
                                                            <button type="button" class="btn btn-default" data-dismiss="modal" id="clear_all_data">Close</button>
                                                            <button type="button" class="btn btn-primary submitBtn" id="submitContactForm" data-dismiss="modal">SUBMIT</button>
                                                        </div>
                                                        <div class="modal-footer">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                var url = "<?php echo base_url();?>";

                                                function current_status(obj) {
                                                    var id = $(obj).attr('data-id');
                                                    var order_id = $(obj).attr('data-name');
                                                    $(document).ready(function() {
                                                        $('#submitContactForm').click(function() {
                                                            var current_statussss = document.getElementById('current_statusss').value;
                                                            var dates = new Date().toLocaleDateString() + ' ' + new Date().toLocaleTimeString();
                                                            if (current_statussss == "") {
                                                                text_demo_expire_date = '<span class="error"> Please Enter Status' + '</span>';
                                                                document.getElementById("demo_current_statusss").innerHTML = text_demo_expire_date;
                                                                return false;
                                                            } else {
                                                                var dataString = 'order_id=' + order_id + '&tracking_orderId=' + id + '&orderStatus_text=' + current_statussss + '&orderStatus_date=' + dates;
                                                                $.ajax({
                                                                    type: 'POST',
                                                                    url: '<?php echo base_url() ?>Dashboard/Order_management_statusss',
                                                                    data: dataString,
                                                                    success: function(responce) {
                                                                        if (responce) {
                                                                            text_demo_Status = '<div class="alert alert-success text-center"><strong>Success </strong> New Status successfully created. </div>';
                                                                            document.getElementById("demo_current_statussssssssssss").innerHTML = text_demo_Status;
                                                                            $('#demo_current_statussssssssssss').fadeOut(5000);
                                                                            window.location.href = "<?php echo base_url('Dashboard/Order_management'); ?>";
                                                                        }
                                                                    }
                                                                })
                                                            }
                                                        })
                                                    })
                                                }
                                                $(document).ready(function() {
                                                    $("#clear_all_data").click(function() {
                                                        $('#current_statusss').val('');
                                                    })
                                                });
                                            </script>

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
                                                                        var url = "<?php echo base_url();?>";

                                                                        function ConfirmDelete(id) {
                                                                            var dataString = "id=" + id;
                                                                            $.ajax({
                                                                                type: 'POST',
                                                                                url: '<?php echo base_url() ?>Dashboard/Order_management_detail',
                                                                                data: dataString,
                                                                                success: function(responce) {
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
                            </tbody>
                        </table>

                    </div>
</div>
<!-- /.content-wrapper -->