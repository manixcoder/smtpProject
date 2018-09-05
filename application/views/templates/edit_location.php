<?php 
/*echo "<pre>";print_r($edit_location);die;*/
?>
<div class="content-wrapper">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <section class="content-header"><h1> Update Time <small>Control panel</small></h1>
    <style>.error_location { color: red; }</style>
    </section>
    <?php echo $this->session->flashdata('success_msg'); ?>
        <?php echo $this->session->flashdata('error_msg'); ?>
            <?php
            $time_fir12 = $edit_location[0]->time_from;
            $time_sec12 = $edit_location[0]->time_to;
            $time_fir = date("g:i a", strtotime($time_fir12));
            $time_sec = date("g:i a", strtotime($time_sec12));
            $time_fir = date("H:i", strtotime($time_fir));
            $time_sec = date("H:i", strtotime($time_sec));
          // echo "<pre>";
          // print_r($time_fir);
          // print_r($time_sec);
          ?>
                <?php echo form_open('Dashboard/update_location'); ?>
                    <div class="panel">
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control" name="city" id="area" value="<?php echo $edit_location[0]->city_name; ?>" disabled/>

                                    <?php echo form_error('field name to display error'); ?>
                                        <label>Area English</label>
                                        <input type="text" class="form-control" name="city" id="area" value="<?php echo $edit_location[0]->area; ?>" disabled/>
                                        <label>Area Arabic</label>
                                        <input type="text" class="form-control" name="city" id="area" value="<?php echo $edit_location[0]->areaArabic; ?>" disabled/>
                                        <input class="form-control" type="hidden" name="adminAddress_id" value="<?php echo $edit_location[0]->adminAddress_id; ?>" required/>
                                        <div id="area_selected"></div>
                                        <label>Time</label>
                                        <br> From :
                                        <input type="time" id="timepicker-12-hr-clearable" name="time_to" class="-12-hr-clearable" value="<?php echo $time_fir ?>" required> &nbsp; &nbsp; &nbsp; &nbsp; to :&nbsp; &nbsp;
                                        <input type="time" id="timepicker-13-hr-clearable" name="time_from" class="-12-hr-clearable" value="<?php echo $time_sec ?>" required>
                                        <?php echo form_error('time_to'); ?>
                                        <?php echo form_error('time_from'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Update time" />
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
                                background: url('http://a1professionals.net/i-washy/assets/loder/giphy.gif') 50% 50% no-repeat rgb(249, 249, 249);
                                opacity: .8;
                                display: none;
                            }
                        </style>
<script>
    $(document).ready(function() {
        $('#myselectcity').change(function() {
            var Id = $("#myselectcity").val();
            dataString = 'location_city_id=' + Id;
            $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>Dashboard/get_area_from_city',
                data: dataString,
                success: function(responce) {
                    $('#area').hide()
                    $('#area_selected').html(responce)
                }
            })
            $(".loadersss").fadeIn();
            $(".loadersss").fadeOut("slow");
        })

    // loder/giphy.gif
    // $('#area').click(function(){
    // alert('please select city first');
    // })
    })
</script>
<?php echo form_close(); ?>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>