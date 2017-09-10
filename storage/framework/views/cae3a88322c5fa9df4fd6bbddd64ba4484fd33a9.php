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
    .ftable{

    }
    .ftable tr td{
    padding: 2px;
    width:100%;
    }

    .scndtable{
    border:1px solid black;
    width:100%;
    }
    .scndtable tr td{
    padding: 2px;
    padding-left:5px;
    }
    .prsDIV > div {
    min-height: 400px;
    }
    .prsDIV > div.medicine {
    border-left: 1px solid #aaa;
    }
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="col-sm-12">
        <div class="white-box">
            <!--Doctor , patient -->
            <form onsubmit="return check()" data-toggle="validator" action="<?php echo e(url('prescription/update_data')); ?>"
                  method="post">
                <?php echo e(csrf_field()); ?>

                <div class="row">
                    <div class="col-md-12">
                        <p class="pull-right"><a href="<?php echo e(url('prescription/pdf/'.$prescription[0]->id)); ?>"
                                                 style="padding-right: 25px; font-size: 20px; cursor: pointer"
                                                 data-toggle="tooltip" title="print"><span
                                        class="glyphicon glyphicon-print"></span></a></p>
                    </div>
                    <div class="col-md-12 table-responsive">
                        <table class="ftable">
                            <tr>
                                <td><?php echo e($prescription[0]->doctor->name); ?></td>
                                <td><?php echo e($company_info[0]->name); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e($prescription[0]->doctor->degree); ?></td>
                                <td><?php echo e($company_info[0]->address); ?></td>
                            </tr>
                            <tr>
                                <td><?php echo e($prescription[0]->doctor->phone); ?></td>
                                <td><?php echo e($company_info[0]->contact); ?></td>
                            </tr>
                        </table>
                    </div>


                    <div class="col-md-12 table-responsive">
                        <table class="scndtable">
                            <tr>
                                <td style="width: 76%">Reg No : <?php echo e($prescription[0]->code); ?></td>
                                <td style="width: 24%">Date : <?php echo e(explode(' ',$prescription[0]->created_at)[0]); ?></td>
                            </tr>
                            <tr>
                                <td>Patient Name : <?php echo e($prescription[0]->client->name); ?></td>
                                <td>Patient Age : <?php echo e($prescription[0]->client->age); ?> years</td>
                            </tr>
                            <tr>
                                <td>Patient Gender :
                                    <?php if($prescription[0]->client->gender==1): ?>
                                        <?php echo e('Male'); ?>

                                    <?php elseif($prescription[0]->client->gender==2): ?>
                                        <?php echo e('Female'); ?>

                                    <?php else: ?>
                                        <?php echo e($prescription[0]->client->gender); ?>

                                    <?php endif; ?>
                                </td>
                                <td>Patient Phone : <?php echo e($prescription[0]->client->phone); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!--product-->
                <div class="row">
                    <div class="form-group col-md-12 col-xs-12 col-lg-12 col-sm-12">
                        <div class="panel panel-success">
                            <div class="panel-wrapper" aria-expanded="true">
                                <div style=" padding-top: 25px;" class="panel-body table-responsive">
                                    <table id="prescription_table" class="table table-bordered table-responsive"
                                           style="margin-bottom: 0px;">
                                        <tr>
                                            <td style="width: 30%">

                                                <?php $__currentLoopData = $prescription[0]->note_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$n): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <div id="noteDIV_<?php echo e($k); ?>" style="padding: 2px; margin-bottom: 2px">
                                                        <div style="border: 1px dotted gray">
                                                            <div style="padding: 5px">
                                                                <p>
                                                                    <b>Note</b>
                                                                    <!-- <button onclick="delete_row('noteDIV_99')" class="btn btn-danger btn-rounded pull-right">X</button> -->
                                                                </p>
                                                            </div>
                                                            <div onclick="getEditor('editControls_<?php echo e($k); ?>')"
                                                                 id="editControls_<?php echo e($k); ?>" class="editControls">
                                                                <div class="noteCss">
                                                                    <a data-role="bold" href="javascript:void(0)"><i
                                                                                class="fa fa-bold"></i></a>
                                                                    <a data-role="italic" href="javascript:void(0)"><i
                                                                                class="fa fa-italic"></i></a>
                                                                    <a data-role="underline"
                                                                       href="javascript:void(0)"><i
                                                                                class="fa fa-underline"></i></a>
                                                                    <a data-role="indent" href="javascript:void(0)"><i
                                                                                class="fa fa-indent"></i></a>
                                                                    <a data-role="outdent" href="javascript:void(0)"><i
                                                                                class="fa fa-outdent"></i></a>
                                                                    <a data-role="insertUnorderedList"
                                                                       href="javascript:void(0)"><i
                                                                                class="fa fa-list-ul"></i></a>
                                                                    <a data-role="insertOrderedList"
                                                                       href="javascript:void(0)"><i
                                                                                class="fa fa-list-ol"></i></a>
                                                                    <a data-role="p" href="javascript:void(0)">p</a>
                                                                </div>
                                                            </div>
                                                            <div onkeyup="getEDITOR2('editor_<?php echo e($k); ?>')"
                                                                 onblur="getEDITOR2('editor_<?php echo e($k); ?>')"
                                                                 onmouseleave="getEDITOR2('editor_<?php echo e($k); ?>')"
                                                                 onmouseup="getEDITOR2('editor_<?php echo e($k); ?>')"
                                                                 id="editor_<?php echo e($k); ?>"
                                                                 contenteditable="" class="editor">
                                                                <p><?=$n->details?></p>
                                                            </div>
                                                        <textarea id="output_<?php echo e($k); ?>" style="display: none"
                                                                  name="details[]"><?php echo e($n->details); ?></textarea>
                                                            <input type="hidden" name="details_id[]" value="<?php echo e($n->id); ?>">
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>

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
                                                <input type="hidden" name="pres_id" value="<?php echo e($prescription[0]->id); ?>">
                                                <?php  $i=1;  ?>
                                                <?php $__currentLoopData = $prescription[0]->medicini_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kk=>$m): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <input type="hidden" name="p_mdcn_lst_id[]" value="<?php echo e($m->id); ?>">
                                                    <div id="div_<?php echo e($kk); ?>" style="border: 1px dotted gray; padding: 5px; margin-bottom: 5px;" >
                                                        <div class="row">
                                                            <div class="form-group col-md-12"
                                                                 style="margin-bottom: 5px; text-align: right; padding-right: 15px;">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label for="medicine" class="control-label col-md-3"
                                                                       style="padding-top: 8px;">Medicine</label>
                                                                <div class="col-md-9">
                                                                    <select name="p_medicine_id[]"
                                                                            class="form-control select2" required>
                                                                        <?php $__currentLoopData = $medicine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                                            <option <?php if ($m->medicine_id == $row->id) {
                                                                                echo "selected";
                                                                            }?> value="<?php echo e($row->id); ?>"><?php echo e($row->name); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                <span id="" style="color: red;"></span>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="duration" class="control-label col-md-3"
                                                                       style="padding-top: 8px;">Duration</label>
                                                                <div class="col-md-9">
                                                                    <input type="text" name="p_duration[]" value="<?php echo e($m->duration); ?>"
                                                                           class="form-control" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <div class="col-md-12">
                                                                    <input type="text" name="p_medicine_time[]"
                                                                           value="<?php echo e($m->medicine_taken); ?>"
                                                                           class="form-control" required>
                                                                </div>
                                                                <span style="color:peru; font-size:12px; padding-left:5px;">How many times medicine will be taken.e.g.1 + 0 + 1</span><br>
                                                                <span style="color: red;"></span>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <div class="col-md-12" style="padding-top: 8px;">
                                                                    <input type="radio" name="p_before_meal[<?php echo e($kk); ?>]" required
                                                                           value="1" <?php if ($m->before_meal == 1) {
                                                                        echo "checked";
                                                                    }?> > Before Meal&nbsp;&nbsp;&nbsp;&nbsp;
                                                                    <input type="radio" name="p_before_meal[<?php echo e($kk); ?>]" required
                                                                           value="2" <?php if ($m->before_meal == 2) {
                                                                        echo "checked";
                                                                    }?> > After Meal
                                                                </div>
                                                                <span style="color: red;"></span>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-12"
                                                                 style="margin-bottom: 2px;">
                                                                <label for="comment" class="control-label col-md-2"
                                                                       style="padding-top: 8px;"> Comment </label>
                                                                <div class="col-md-10">
                                                                <textarea name="p_comment[]"
                                                                          class="form-control"><?php echo e($m->comment); ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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
                                        <div class="form-group col-md-6" style="margin-bottom: 5px;">
                                            <label for="ref" class="control-label">Add Note</label>

                                            <select name="known_case[]" class="select2 m-b-10 select2-multiple"
                                                    multiple="multiple" data-placeholder="Choose" required>
                                                <?php $__currentLoopData = $known_case; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <option <?php foreach($prescription[0]->known_case_list as $kc){ if($kc->known_case_id==$n->id){ echo 'selected'; }}?> value="<?php echo e($n->id); ?>"><?php echo e($n->title); ?></option>
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
    <?php $__env->stopSection(); ?>

    <?php $__env->startSection('postJquery'); ?>
            <!-- addMedicine(); -->
    <!-- addNote(); -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('postJquery2'); ?>
    <script>
        var rowNum = <?= sizeof($prescription[0]->medicini_list)?>;
        var rowNote = <?= sizeof($prescription[0]->note_list)?>;
        function check() {
            var flag = true;

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
            console.log('i m id: '+id);
            var getID = id.split('_')[1];
            $('#' + id).val($('#editor_' + getID).html());
        }


    </script>
    <?php $__env->stopSection(); ?>
            <!--page script-->

<?php echo $__env->make('pos.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>