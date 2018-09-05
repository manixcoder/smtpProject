<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//echo "<pre>";print_r($user_code);
//echo "<pre>";print_r($code);die;
?>

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <!-- Main content -->
            <section class="content">
                <br>
                <?php echo $this->session->flashdata('success_msg'); ?>
                    <br>
                    <p id="demo_current_statussssssssssss"></p>

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
                                    <p class="statusMsg"></p>
                                    <form role="form" id="signupForm1">
                                        <div class="form-group">
                                            <label for="inputMessage">Select User</label>
                                            <select name="Select_User" id="Select_Users">
                                                <option value="volvo">All User</option>
                                                <option value="Select_User">Select User</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="user_id">
                                            <label for="inputName">User</label>
                                            <br> Check All:
                                            <input type='checkbox' value='0' id="select">
                                            <?php
                                                    foreach($user_code as $user_code) 
                                                    { 
                                                    echo $user_code->name;
                                                     ?>
                                                <input id='select_all_id' type='checkbox' class="check" value=<?php echo $user_code->user_id; ?> name="
                                                <?php echo $user_code->user_id; ?>">
                                                    <?php 
                                                    }
                                                    ?>
                                        </div>
                                        <p id="select__boxxxxxx"></p>
                                        <link href="http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet" type="text/css" />
                                        <script type="text/javascript" src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
                                        <div class="form-group">
                                            <label for="inputMessage">Expire Date</label>
                                            <input class="form-control" type="text" id="datepicker">
                                            <p id="demo_datepicker"></p>
                                        </div>
                                        <script language="javascript">
                                            $(document).ready(function() {
                                                $("#datepicker").datepicker({
                                                    minDate: 0
                                                });
                                            });
                                        </script>
                                        <div class="form-group">
                                            <label for="inputMessage">Discount(%)</label>
                                            <input type='text' class="form-control" id="inputPrice" placeholder="Enter your discount" required></input>
                                            <p id="demo_inputPrice"></p>
                                            <p class="Price_error" id="Price_error" style="margin: 0; display: none;">Price is unavailable</p>
                                        </div>

                                        <div class="form-group">
                                            <label for="inputMessage">Promo Code</label>
                                            <input type='text' class="form-control" id="promo_code" placeholder="Enter your promo code" required></input>
                                            <p id="demo_promo_code"></p>
                                            <p class="promo_code_error" id="promo_code_error" style="margin: 0; display: none;">Promo Code is unavailable</p>
                                        </div>
                                </div>
                                <!-- Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" id="clear_all_data">Close</button>
                                    <button type="button" class="btn btn-primary submitBtn" id="submitContactForm" data-dismiss="modal">SUBMIT</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </section>
            <script>
                $(document).ready(function() {
                    $('#select').on('click', function() {
                        if (this.checked) {
                            $('.check').each(function() {
                                this.checked = true;
                            });
                        } else {
                            $('.check').each(function() {
                                this.checked = false;
                            });
                        }
                    });

                    $('#checkAll').on('click', function() {
                        if (this.checked) {
                            $('.checkboxs').each(function() {
                                this.checked = true;
                            });
                        } else {
                            $('.checkboxs').each(function() {
                                this.checked = false;
                            });
                        }
                    });

                });
            </script>
            <script>
                $(document).ready(function() {
                    $("#user_id").hide()
                    $("#Select_Users").change(function() {
                        var Select_Users = $('#Select_Users :selected').val();
                        if (Select_Users == 'Select_User') {
                            $("#user_id").show()
                        }
                        if (Select_Users == 'volvo') {
                            $("#user_id").hide()
                        }
                    })
                    $("#submitContactForm").click(function() {
                        var selectedValues = "";
                        $checkedCheckboxes = $(".check:checkbox:checked");
                        $checkedCheckboxes.each(function() {
                            selectedValues += $(this).val() + ",";
                        });
                        var selectedValuess = "";
                        $checkedCheckboxes = $(".checkboxs:checkbox:checked");
                        $checkedCheckboxes.each(function() {
                            selectedValuess += $(this).val() + ",";
                        });
                        //demo_promo_code_demo_inputPrice    demo_promo_code      /////////////////////
                        var location = selectedValues;
                        var inputPrice = $('#inputPrice').val();
                        var Select_Users = $('#Select_Users').val();
                        var expire_date = $('#datepicker').val();
                        var promo_code = $('#promo_code').val();

                        if (Select_Users == "Select_User" && location == "") {
                            text_demo_select__boxxxxxx = '<span class="error"> Please select User' + '</span>';
                            document.getElementById("select__boxxxxxx").innerHTML = text_demo_select__boxxxxxx;
                            return false;
                        } else {
                            text_demo_select__boxxxxxx = '';
                            document.getElementById("select__boxxxxxx").innerHTML = text_demo_select__boxxxxxx;
                        }

                        if (expire_date == "") {
                            text_demo_expire_date = '<span class="error"> Please select date' + '</span>';
                            document.getElementById("demo_datepicker").innerHTML = text_demo_expire_date;
                            return false;
                        } else {
                            text_demo_expire_date = '';
                            document.getElementById("demo_datepicker").innerHTML = text_demo_expire_date;
                        }
                        if (inputPrice == "") {
                            text_demo_site = '<span class="error"> Please enter discount(%)' + '</span>';
                            document.getElementById("demo_inputPrice").innerHTML = text_demo_site;
                            return false;
                        } else if (parseInt(inputPrice) > 100) {
                            text_demo_site = '<span class="error"> Please enter discount bellow 100%' + '</span>';
                            document.getElementById("demo_inputPrice").innerHTML = text_demo_site;
                            return false;
                        } else if (inputPrice != parseFloat(inputPrice)) {
                            text_demo_site = '<span class="error"> Please enter integer value' + '</span>';
                            document.getElementById("demo_inputPrice").innerHTML = text_demo_site;
                            return false;
                        } else {
                            text_demo_site = '';
                            document.getElementById("demo_inputPrice").innerHTML = text_demo_site;
                        }

                        if (promo_code == "") {
                            demo_promo_codes = '<span class="error"> Please enter promo code' + '</span>';
                            document.getElementById("demo_promo_code").innerHTML = demo_promo_codes;
                            return false;
                        } else if (promo_code.indexOf(' ') >= 0) {
                            demo_promo_codes = '<span class="error"> Please remove space' + '</span>';
                            document.getElementById("demo_promo_code").innerHTML = demo_promo_codes;
                            return false;
                        }

                        var dataString = "location=" + location + "&price=" + inputPrice + "&promo_code=" + promo_code + "&expire_date=" + expire_date;
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo base_url('/'); ?>Dashboard/insert_prompcode",
                            data: dataString,
                            success: function(responce) {
                                // alert(responce);
                                if (responce) {
                                    window.location.href = "<?php echo base_url('Dashboard/Promo_Code'); ?>";
                                    text_demo_Status = '<div class="alert alert-success text-center"><strong>Success </strong> New promo code successfully created. </div>';
                                    document.getElementById("demo_current_statussssssssssss").innerHTML = text_demo_Status;
                                    $('#demo_current_statussssssssssss').fadeOut(5000);

                                }
                            }
                        })
                    });
                    //
                    $('#clear_all_data').click(function() {
                        $('#select').each(function() {
                            this.checked = false;
                        });
                        $('.check').each(function() {
                            this.checked = false;
                        });
                        $("#user_id").hide();
                        $('#inputPrice').val('');
                        $('#Select_Users').val('volvo');
                        $('#datepicker').val('');
                        $('#promo_code').val('');
                    })
                });
            </script>
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
        // echo '<pre>';
        // print_r($code);
    ?>
                <table id="example" class="table table-striped table-bordered" align='center' border='2' width='100%'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Promo Code</th>
                            <th>Discount</th>
                            <th>ExpireDate</th>
                            <th>Is active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                            <?php foreach($code as $value) { ?>
                                <tr>
                           <?php 
                            $active = $value->is_deactive;
                            $expireDate = $value->expireDate;
                            $expireDates = date("m/d/Y", strtotime($expireDate));
                            $current_dates = date("m/d/Y");
                                if($current_dates > $expireDates)
                                {
                                    $actives = 'no';
                                }
                                else
                                {
                                    $actives = 'yes';
                                }
                            ?>
                                        <td>
                                            <?php echo $i;$i++; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->promoCode; ?>
                                        </td>
                                        <td>
                                            <?php echo $value->promo_discount; ?>
                                        </td>
                                        <td>
                                            <?php echo $expireDate; ?>
                                        </td>
                                        <td>
                                            <?php echo $actives; ?>
                                        </td>
                                        <td><a href="javascript:void(0)" onclick="ConfirmDeletepromocode('<?php echo $value->promoCode_id;?>')">Delete</a>/<a href="javascript:void(0)" onclick="ConfirmDelete('<?php echo $value->promoCode;?>')">Forever</a></td>
                                </tr>
                                <?php } ?>
                                    <script>
                                        var url = "<?php echo base_url();?>";

                                        function ConfirmDelete(promoCode) {
                                            var x = confirm("Are you sure you want to delete?");
                                            if (x) {
                                                // alert(promoCode);
                                                window.location = url + "Dashboard/deletepromocode/" + promoCode;
                                            } else {

                                                return false;
                                            }
                                        }

                                        function ConfirmDeletepromocode(promoCode_id) {
                                            var x = confirm("Are you sure you want to delete?");
                                            if (x) {
                                                // alert(promoCode);
                                                window.location = url + "Dashboard/deletepromocode_user/" + promoCode_id;
                                            } else {

                                                return false;
                                            }
                                        }
                                    </script>
                    </tbody>
                </table>