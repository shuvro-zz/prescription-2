<!DOCTYPE html>
<html lang="en">
<!-- Mirrored from eliteadmin.themedesigner.in/demos/eliteadmin-material/inbox.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 24 Sep 2016 09:18:31 GMT -->
<!--headlink-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{url('public/images/')}}/<?=$company_info[0]->logo;?>">
    <title>New Prescription</title>
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{url('resources/assets/pos/')}}/compiled/flipclock.css">
    <link href="{{url('resources/assets/pos/')}}/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-table/dist/bootstrap-table.min.css" rel="stylesheet" type="text/css" />
    <!--datatable-->
    <link href="{{url('resources/assets/pos/')}}/bower_components/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{url('resources/assets/pos/')}}/www/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Menu CSS -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('resources/assets/pos/')}}/bower_components/dropify/dist/css/dropify.min.css">
    <!-- Page plugins css -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">
    <!-- Color picker plugins css -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/jquery-asColorPicker-master/css/asColorPicker.css" rel="stylesheet">
    <!-- Date picker plugins css -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker plugins css -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/timepicker/bootstrap-timepicker.min.css" rel="stylesheet">
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- summernotes CSS -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/summernote/dist/summernote.css" rel="stylesheet" />
    <!-- page CSS -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="{{url('resources/assets/pos/')}}/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css" />
    <link href="{{url('resources/assets/pos/')}}/bower_components/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="{{url('resources/assets/pos/')}}/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="{{url('resources/assets/pos/')}}/bower_components/multiselect/css/multi-select.css"  rel="stylesheet" type="text/css" />

    <!-- toast CSS -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="{{url('resources/assets/pos/')}}/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="{{url('resources/assets/pos/')}}/css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{url('resources/assets/pos/')}}/css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{url('resources/assets/pos/')}}/css/colors/default.css" id="theme" rel="stylesheet">

    <link rel="stylesheet" href="{{url('resources/assets/pos/')}}/css/simplebar.css" />
    <link rel="stylesheet" href="{{url('resources/assets/pos/')}}/css/demo.css" />


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <style>
        @media screen and (min-width: 320px) {
            .flip-clock-meridium {
                margin: 3em 4em !important;
            }
            .flip-clock-wrapper {
                text-align: center;
                position: relative;
                width: 80%;
                margin: 1em;
            }
            .clock-text {
                text-align: center;
                font-size: 2em;
            }
            .clock-text2 {
                text-align: center;
                font-size: 2em;
            }
        }

        @media screen and (min-width: 380px) {
            .flip-clock-meridium {
                margin: 3em 3.5em !important;
            }
            .flip-clock-wrapper {
                text-align: center;
                position: relative;
                width: 100%;
                margin: 1em;
            }
            .clock-text {
                margin-top: 2em;
            }
        }

        @media screen and (min-width: 480px) {
            .clock-text {
                text-align: right;
                font-size: 3em;
            }
            .clock-text2 {
                text-align: right;
            }
        }

        @media screen and (min-width: 680px) {
            .clock-text {
                margin-top: -2em;
                text-align: right;
                font-size: 3em;
            }
            .clock-text2 {
                text-align: right;
                font-size: 3em;
            }
        }

        @media screen and (min-width: 768px) {
            .clock-text {
                margin-top: 2em;
                text-align: right;
                font-size: 3em;
            }
            .clock-text2 {
                text-align: right;
                font-size: 3em;
            }
        }

        @media screen and (min-width: 1200px) {
            .clock-text {
                margin-top: 2.81em;
                text-align: center;
                font-size: 3em;
            }
            .clock-text2 {
                text-align: center;
                font-size: 3em;
            }
        }

        @media screen and (min-width: 1280px) {
            .clock {
                margin: 4em 3em;
            }
            .clock-text {
                margin-top: 2em;
                text-align: center;
                font-size: 3em;
            }
            .clock-text2 {
                margin-bottom: 1.55em;
                text-align: center;
                font-size: 3em;
            }
        }
        body{
            background-image: url('public/images/shop.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100% 100%;
        }
        html{
            background-image: url('public/images/shop.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: 100% 100%;
        }

    </style>
</head>


<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="{{url('resources/assets/pos/')}}/note_style.css" />
<link rel="stylesheet" href="{{url('resources/assets/pos/')}}/jquery.notebook.css" />

<body>

<input type="hidden" name="base_url" id="base_url" value="{{url('/')}}">

<!-- Preloader -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
    </svg>
</div>
<div id="loadingDiv" style="position: fixed;z-index: 10000;top: 20%;left: 50%;"><img src="{{url('public/images/loading.gif')}}" alt=""></div>
<div id="wrapper">
    @include('pos.layout.top_nav')
    @include('pos.layout.left_side_nav')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title">New Prescription</h4>
                </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <ol class="breadcrumb">
                        <li><a href="{{url('home/dashboard')}}">Dashboard</a></li>
                        <li><a href="{{url('prescription/show')}}">Prescription</a></li>
                        <li class="active">New Prescription</li>
                    </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <form onsubmit="return check()" data-toggle="validator" action="{{url('prescription/post')}}" method="post">
                            {{csrf_field()}}
                                    <!--Doctor , patient -->
                            <div class="row">
                                <div class="form-group col-md-6" style="margin-bottom: 5px;">
                                    <label for="ref" class="control-label">Doctor</label>
                                    <select name="doctor_id" id="doctor_id" class="form-control" required>
                                        @foreach($doctor as $d)
                                            <option value="{{$d->id}}">{{$d->name}}</option>
                                        @endforeach
                                    </select>
                        <span id="doctor_id_err" style="color: red; ">
                             @if($errors->has('doctor_id')){{'Required'}}@endif
                        </span>
                                </div>
                                <div class="form-group col-md-6" style="margin-bottom: 5px;">
                                    <label for="client_id" class="control-label">Patient</label>
                                    <select required class="form-control select2" name="client_id"
                                            id="client_id">
                                        <option value="0">Choose a Patient</option>
                                        @foreach($client as $u)
                                            @if(old('client_id')==$u->id)
                                                <option selected value="{{$u->id}}">{{$u->name.'('.$u->phone.')'}}</option>
                                            @else()
                                                <option value="{{$u->id}}">{{$u->name.'('.$u->phone.')'}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                        <span style='font-size: 12px;'>For add new Patient <a onclick="add_client()"
                                                                              style="cursor: pointer; color: blue; font-size: 13px;">Cliek
                                here</a></span><br>
                        <span id="client_id_err" style="color: red; ">
                             @if($errors->has('client_id')){{'Required'}}@endif
                        </span>
                                </div>
                            </div>

                            <!--product-->
                            <div class="row">
                                <div class="form-group col-md-12 col-xs-12 col-lg-12 col-sm-12">
                                    <div class="panel panel-success">
                                        <div class="panel-wrapper" aria-expanded="true">
                                            <div class="panel-body table-responsive">
                                                <table id="prescription_table" class="table table-bordered table-responsive"
                                                       style="margin-bottom: 0px;">
                                                    <tr>
                                                        <td style="width: 30%">
                                                            <div class="editor">
                                                                <h1>JQUERY NOTEBOOK DEMO</h1>
                                                                <p>A simple, clean and elegant text editor. Inspired by the
                                                                    awesomeness of <a href="http://medium.com" target="_blank">Medium</a>.
                                                                </p>
                                                                <p>This jQuery plugin is released under the MIT license. You can
                                                                    check out the project and see how extremely simple it is to use
                                                                    this editor on your application by clicking on the Github ribbon
                                                                    on the top corner of this page. Feel free to contribute with
                                                                    this project by registering any bug that you may encounter as an
                                                                    issue on Github, and working on the issues that are already
                                                                    there. I'm looking forward to seeing your pull request!</p>
                                                                <p>Now, just take a time to test the editor. Yes, <b>this div is the
                                                                        editor</b>. Try to edit this text, select a part of this
                                                                    text and don't forget to try the basic text editor keyboard
                                                                    shortcuts.</p>
                                                            </div>
                                                        </td>
                                                        <td style="width: 69%">
                                                            <div class="row" style="padding-top: 8px;" onclick="addMedicine()"
                                                                 id="addBTN">
                                                                <div class="form-group col-md-12"
                                                                     style="text-align: center; margin-bottom: 2px;">
                                                                    <button type="button" class="btn btn-info btn-rounded">Add
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class=" form-group" style="text-align: center;">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--add client modal-->
                <div class="modal fade" id="add_client_modal" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header label-success">
                                <button type="button" class="close" data-dismiss="modal"></button>
                                <h4 style="text-align: center;" class="modal-title">New Patient</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-md-offset-0">
                                        <label for="name" class="col-md-3 control-label" style="text-align: right">Name</label>
                                        <div class="col-md-9">
                                            <input onblur="check_text_field('name','name_err')" name="name"
                                                   type="text" id="name" class="form-control" required>
                                            <span id="name_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-md-offset-0">
                                        <label for="address" class="col-md-3 control-label"
                                               style="text-align: right">Address</label>
                                        <div class="col-md-9">
                                            <input onblur="check_text_field('address','address_err')" name="address"
                                                   type="text" id="address" class="form-control" required>
                                            <span id="address_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-md-offset-0">
                                        <label for="phone" class="col-md-3 control-label" style="text-align: right">Phone</label>
                                        <div class="col-md-9">
                                            <input onblur="check_text_field('phone','phone_err')" name="phone"
                                                   data-mask="+8801999999999"
                                                   type="text" id="phone" class="form-control" required>
                                            <span style="color: peru;">+8801*********</span>
                                            <span id="phone_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12 col-md-offset-0">
                                        <label for="age" class="col-md-3 control-label" style="text-align: right">Age</label>
                                        <div class="col-md-9">
                                            <input onblur="check_text_field('age','age_err')" name="phone"
                                                   type="text" id="age" class="form-control" required>
                                            <span id="age_err" style="color: red;"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button onclick="add_client_post()" type="button" class="btn btn-success btn-rounded">Submit
                                </button>
                                <button type="button" class="btn btn-danger btn-rounded" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer text-center">2016 &copy; All right reserved by <a style="color:#EF9" target="_blank" href="http://geeksntechnology.com/">Geeksntechnology Ltd</a></footer>
    </div>
</div>
<!--footerlink-->
<script>
    var base_url=$('#base_url').val();
    $(document).ready(function () {
        addMedicine();
        $('.editor').notebook({
            autoFocus: true,
            placeholder: 'Type something awesome...'
        });
    });

    var rowNum = 0;
    function check() {
        var flag = true;
        var client = $('#client_id').val();
        if (client == 0 || client == null || client == '') {
            flag = false;
            document.getElementById('client_id_err').innerText = "Required";
            $("#err_msg_client").show();
        } else {
            document.getElementById('client_id_err').innerText = "";
            $("#err_msg_client").hide();
        }
        var bank = document.getElementById('check_payment_bank').checked;
        var cash = document.getElementById('check_payment_cash').checked;
        if (bank == false && cash == false) {
            $("#err_msg_payment").show();
            flag = false;
        } else {
            $("#err_msg_payment").hide();
        }
        if (bank == true) {
            var bank_id = $('#bank_id').val();
            if (bank_id == 0 || bank_id == null || bank_id == '') {
                flag = false;
                $("#err_msg_bank").show();
            } else {
                $("#err_msg_bank").hide();
            }
        }

        return flag;
    }

    function addMedicine() {
        rowNum++;
        console.log('addMedicine');
        $.ajax({
            url: base_url + '/medicine/get_medicine',
            method: 'get',
            dataType: 'json'
            ,
            success: function (result) {
                var tDiv = '<div style="border: 1px dotted gray; padding: 5px; margin-bottom: 5px;" id="div_' + rowNum + '">'
                        + '<div class="row">'
                        + '<div class="form-group col-md-12" style="margin-bottom: 5px; text-align: right; padding-right: 15px;">'
                        + '<button onclick="delete_row(\'div_' + rowNum + '\')" class="btn btn-danger btn-rounded">Delete</button>'
                        + '</div>'
                        + '</div>'
                        + '<div class="row">'
                        + '<div class="form-group col-md-6">'
                        + '<label for="medicine" class="control-label col-md-3" style="padding-top: 8px;">Medicine</label>'
                        + '<div class="col-md-9">'
                        + '<select name = "medicine_id[]" id ="medicine_id_' + rowNum + '" class = "form-control select2" required >';
                $.each(result, function (i, v) {
                    tDiv += '<option value = "' + v['id'] + '">' + v['name'] + ' (' + v['power'] + ')</option >';
                });
                tDiv += '</select>';
                tDiv += '</div>';
                tDiv += '<span id = "medicine_id_' + rowNum + '_err" style = "color: red;"></span>';
                tDiv += '</div>';
                tDiv += '<div class="form-group col-md-6">';
                tDiv += '<label for= "duration" class="control-label col-md-3" style = "padding-top: 8px;">Duration</label>';
                tDiv += '<div class="col-md-9">';
                tDiv += '<input type="text" name = "duration[]" id="duration_' + rowNum + '" class="form-control" required>';
                tDiv += '</div>';
                tDiv += '<span id="duration_' + rowNum + '_err" style="color: red;"></span>';
                tDiv += '</div>';
                tDiv += '</div>';
                tDiv += '<div class="row">';
                tDiv += '<div class="form-group col-md-6">';
                tDiv += '<div class="col-md-12">';
                tDiv += '<input type = "text" name="medicine_time[]" id="medicine_time_' + rowNum + '" class="form-control" required >';
                tDiv += '</div>';
                tDiv += '<span style="color:peru; font-size:12px; padding-left:5px;">How many times medicine will be taken.e.g.1 + 0 + 1</span><br>';
                tDiv += '<span id="medicine_time_' + rowNum + '_err" style = "color: red;"></span>';
                tDiv += '</div>';
                tDiv += '<div class= "form-group col-md-6" >';
                tDiv += '<div class= "col-md-12" style = "padding-top: 8px;">';
                tDiv += '<input type = "radio" name = "before_meal[]" required value = "1" > Before Meal&nbsp;&nbsp;&nbsp;&nbsp;';
                tDiv += '<input type = "radio" name = "before_meal[]" required value = "2" > After Meal';
                tDiv += '</div>';
                tDiv += '<span style = "color: red; " ></span>';
                tDiv += '</div>';
                tDiv += '</div>';
                tDiv += '<div class="row" >';
                tDiv += '<div class= "form-group col-md-12" style = "margin-bottom: 2px;" >';
                tDiv += '<label for= "comment" class = "control-label col-md-2" style = "padding-top: 8px;" > Comment </label>';
                tDiv += '<div class= "col-md-10" >';
                tDiv += '<textarea name="comment[]" id="comment_0" class="form-control"></textarea>';
                tDiv += '</div>';
                tDiv += '</div>';
                tDiv += '</div>';
                tDiv += '</div>';

                $('#addBTN').before(tDiv);
            }
        });
    }
    function delete_row(rowNo) {
        $('#' + rowNo).remove();
    }

    function add_client() {
        document.getElementById('name').value = '';
        document.getElementById('address').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('age').value = '';

        $('#add_client_modal').modal('show');
    }
    function add_client_post() {
        var flag = true;
        var tmp_name = $('#name').val();
        tmp_name = tmp_name.replace(/\s+/g, '');
        if (tmp_name == '' || tmp_name == null) {
            flag = false;
            var x = document.getElementById('name_err');
            x.style.color = 'red';
            x.innerText = 'Required';
        } else {
            document.getElementById('name_err').innerText = '';
        }
        var tmp_address = $('#address').val();
        tmp_address = tmp_address.replace(/\s+/g, '');
        if (tmp_address == '' || tmp_address == null) {
            flag = false;
            var x = document.getElementById('address_err');
            x.style.color = 'red';
            x.innerText = 'Required';
        } else {
            document.getElementById('address_err').innerText = '';
        }

        var tmp_phone = $('#phone').val();
        tmp_phone = tmp_phone.replace(/\s+/g, '');
        if (tmp_phone == '' || tmp_phone == null || tmp_phone.length != 14) {
            flag = false;
            var x = document.getElementById('phone_err');
            x.style.color = 'red';
            x.innerText = 'Required';
        } else {
            document.getElementById('phone_err').innerText = '';
        }

        var tmp_age = $('#age').val();
        tmp_age = tmp_age.replace(/\s+/g, '');
        if (tmp_age == '' || tmp_age == null) {
            flag = false;
            var x = document.getElementById('age_err');
            x.style.color = 'red';
            x.innerText = 'Required';
        } else {
            document.getElementById('age_err').innerText = '';
        }

        if (flag == true) {
            var tmp1_name = $('#name').val();
            var tmp1_address = $('#address').val();
            var tmp1_phone = $('#phone').val();
            var tmp1_age = $('#age').val();
            $.ajax({
                url: base_url + '/client/add',
                method: 'get',
                dataType: 'json',
                data: {
                    name: tmp1_name,
                    address: tmp1_address,
                    phone: tmp1_phone,
                    age: tmp1_age
                }, success: function (result) {
                    $('#add_client_modal').modal('hide');

                    $('#client_id option:gt(0)').remove();
                    $.each(result, function (i, v) {
                        $('#client_id').append('<option value="' + v['id'] + '">' + v['name'] + '(' + v['phone'] + ')</option>');
                    });
                }
            });
        }
    }
</script>
</body>
</html>