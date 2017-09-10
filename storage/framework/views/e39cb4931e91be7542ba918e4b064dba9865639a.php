<?php $__env->startSection('page_title','New Prescription'); ?>
<?php $__env->startSection('page_header','New Prescription'); ?>
<?php $__env->startSection('page_breadcrumb'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('home/dashboard')); ?>">Dashboard</a></li>
        <li><a href="<?php echo e(url('prescription/show')); ?>">Prescription</a></li>
        <li class="active">New Prescription</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('prescription_style'); ?>
    .editControls {
    text-align:center;
    padding:5px;
    margin:5px;
    }

    .editor {
    resize:vertical;
    overflow:auto;
    border:1px solid silver;
    border-radius:5px;
    min-height:100px;
    box-shadow: inset 0 0 10px silver;
    padding:1em;
    }

    #output {
    width:99.7%;
    height:100px
    }

    .noteCss a:link {text-decoration:none;}
    .noteCss a:visited {text-decoration:none;}
    .noteCss a:hover {text-decoration:none;}
    .noteCss a:active {text-decoration:none;}
    .noteCss a{
    color:black;
    padding:5px;
    border:1px solid silver;
    border-radius:5px;
    width:1em;
    }
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="col-sm-12">
        <div class="white-box">
            <form action="<?php echo e(url('prescription/post')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                        <!--Doctor , patient -->
                <div class="row">
                    <div class="form-group col-md-6" style="margin-bottom: 5px;">
                        <label for="ref" class="control-label">Doctor</label>
                        <select name="doctor_id" id="doctor_id" class="form-control" required>
                            <?php $__currentLoopData = $doctor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <option value="<?php echo e($d->id); ?>"><?php echo e($d->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                        <span id="doctor_id_err" style="color: red; ">
                             <?php if($errors->has('doctor_id')): ?><?php echo e('Required'); ?><?php endif; ?>
                        </span>
                    </div>
                    <div class="form-group col-md-6" style="margin-bottom: 5px;">
                        <label for="client_id" class="control-label">Patient</label>
                        <select required class="form-control select2" name="client_id"
                                id="client_id">
                            <option value="0">Choose a Patient</option>
                            <?php $__currentLoopData = $client; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if(old('client_id')==$u->id): ?>
                                    <option selected value="<?php echo e($u->id); ?>"><?php echo e($u->name.'('.$u->phone.')'); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($u->id); ?>"><?php echo e($u->name.'('.$u->phone.')'); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                        <span style='font-size: 12px;'>For add new Patient <a onclick="add_client()"
                                                                              style="cursor: pointer; color: blue; font-size: 13px;">Cliek
                                here</a></span><br>
                        <span id="client_id_err" style="color: red; ">
                             <?php if($errors->has('client_id')): ?><?php echo e('Required'); ?><?php endif; ?>
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
                                                <div class="row" style="padding-top: 8px;" onclick="addNote()"
                                                     id="addNOTE">
                                                    <div class="form-group col-md-12"
                                                         style="text-align: center; margin-bottom: 2px;">
                                                        <button type="button" class="btn btn-info btn-rounded">Add
                                                        </button>
                                                    </div>
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

                                    <div class="row" style="padding-top: 22px; padding-left: 10px;">
                                        <div class="form-group col-md-6 pull-left" style="margin-bottom: 5px;">
                                            <label for="ref" class="control-label">Add Test</label>

                                            <select name="note_info[]" class="select2 m-b-10 select2-multiple"
                                                    multiple="multiple" data-placeholder="Choose" required>
                                                <?php $__currentLoopData = $note_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo e($n->id); ?>"><?php echo e($n->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>

                                        </div>
                                        <div class="form-group col-md-6 pull-right" style="margin-bottom: 5px;">
                                            <label for="ref" class="control-label">Add Note</label>

                                            <select name="known_case[]" class="select2 m-b-10 select2-multiple"
                                                    multiple="multiple" data-placeholder="Choose" required>
                                                <?php $__currentLoopData = $known_case; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option value="<?php echo e($n->id); ?>"><?php echo e($n->title); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </select>

                                        </div>
                                    </div>
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
                                <input onblur="check_text_field('age','age_err')" name="age"
                                       type="text" id="age" class="form-control" required>
                                <span id="age_err" style="color: red;"></span>
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="gender" class="col-md-3 control-label" style="text-align: right">Gender</label>
                            <div class="col-md-9">
                                <input name="gender" id="gender1" type="radio" value="1" checked required> Male &nbsp;&nbsp;&nbsp;
                                <input name="gender" id="gender2" type="radio" value="2" required> Female
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('postJquery'); ?>
    addNote();
<?php $__env->stopSection(); ?>
<?php $__env->startSection('postJquery2'); ?>
    <script>
        var rowNum = 0;
        var rowNote = 0;
        function check() {
            var flag = true;
            var client = $('#client_id').val();
            if (client == 0 || client == null || client == '') {
                flag = false;
                document.getElementById('client_id_err').innerText = "Required";
            } else {
                document.getElementById('client_id_err').innerText = "";
            }
            var doctor = $('#doctor_id').val();
            if (doctor == 0 || doctor == null || doctor == '') {
                flag = false;
                document.getElementById('doctor_id_err').innerText = "Required";
            } else {
                document.getElementById('doctor_id_err').innerText = "";
            }

            return flag;
        }

        function addNote() {
            rowNote++;
            var tNote = '<div id="noteDIV_' + rowNote + '" style="padding: 2px; margin-bottom: 2px">'
                    + '<div style="border: 1px dotted gray">'
                    + '<div style="padding: 5px">'
                    + '<p><b>Note</b>'
                    + '<button onclick="delete_row(\'noteDIV_' + rowNote + '\')" class="btn btn-danger btn-rounded pull-right" >X</button></p>'
                    + '</div>'
                    + '<div onclick="getEditor(\'editControls_' + rowNote + '\')" id="editControls_' + rowNote + '"  class="editControls">'
                    + '<div class="noteCss">'
                    + '<a data-role="bold" href="javascript:void(0)"><i class="fa fa-bold"></i></a>'
                    + '<a data-role="italic" href="javascript:void(0)"><i class="fa fa-italic"></i></a>'
                    + '<a data-role="underline" href="javascript:void(0)"><i class="fa fa-underline"></i></a>'
                    + '<a data-role="indent" href="javascript:void(0)"><i class="fa fa-indent"></i></a>'
                    + '<a data-role="outdent" href="javascript:void(0)"><i class="fa fa-outdent"></i></a>'
                    + '<a data-role="insertUnorderedList" href="javascript:void(0)"><i class="fa fa-list-ul"></i></a>'
                    + '<a data-role="insertOrderedList" href="javascript:void(0)"><i class="fa fa-list-ol"></i></a>'
                    + '<a data-role="p" href="javascript:void(0)">p</a>'
                    + '</div>'
                    + '</div>'
                    + '<div onkeyup="getEDITOR2(\'editor_' + rowNote + '\')" onblur="getEDITOR2(\'editor_' + rowNote + '\')" onmouseleave="getEDITOR2(\'editor_' + rowNote + '\')" onmouseup="getEDITOR2(\'editor_' + rowNote + '\')" id="editor_' + rowNote + '" contenteditable class="editor">'
                    + '</div>'
                    + '<textarea id="output_' + rowNote + '" style="display: none" name="note[]"></textarea>'
                    + '</div>'
                    + '</div>';
            $('#addNOTE').before(tNote);
            //$('#notediv_' + rowNote).summernote();
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
                    tDiv += '<input type = "radio" name = "before_meal[' + rowNum + ']" required value = "1" > Before Meal&nbsp;&nbsp;&nbsp;&nbsp;';
                    tDiv += '<input type = "radio" name = "before_meal[' + rowNum + ']" required value = "2" > After Meal';
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

                    $('#medicine_id_' + rowNum).select2();
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
            var tmp1_gender = $('input[name=gender]:checked').val();

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
                        age: tmp1_age,
                        gender: tmp1_gender
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

        function getEditor(id) {
            $('#' + id + ' a').click(function (e) {
                console.log('fhd');
                switch ($(this).data('role')) {
                    case 'h1':
                    case 'h2':
                    case 'p':
                        document.execCommand('formatBlock', false, $(this).data('role'));
                        break;
                    default:
                        document.execCommand($(this).data('role'), false, null);
                        break;
                }
                var getID = id.split('_')[1];
                update_output("output_" + getID);
            });
        }
        function getEDITOR2(id) {
            var getID = id.split('_')[1];
            $('#' + id).bind('blur keyup paste copy cut mouseup', function (e) {
                update_output('output_' + getID);
            });
        }
        function update_output(id) {
            var getID = id.split('_')[1];
            $('#' + id).val($('#editor_' + getID).html());
        }


    </script>
    <?php $__env->stopSection(); ?>
            <!--page script-->

<?php echo $__env->make('pos.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>