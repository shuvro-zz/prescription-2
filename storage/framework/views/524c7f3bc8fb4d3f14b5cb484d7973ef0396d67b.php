<?php $__env->startSection('page_title','Test'); ?>
<?php $__env->startSection('page_header','Test'); ?>
<?php $__env->startSection('page_breadcrumb'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('home/dashboard')); ?>">Dashboard</a></li>
        <li class="active">Test</li>
    </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_content'); ?>
    <div class="col-sm-12">
        <div class="white-box col-md-12">

            <div class="table-responsive col-md-6 pull-left">
                <table id="myTable"
                       class="table color-bordered-table success-bordered-table table-striped  no-footer">
                    <thead>
                    <tr>
                        <th><span data-toggle="tooltip" title="S.L">#</span></th>
                        <th>Title</th>
                        <th style="text-align: center; width: 10%;">
                            <span data-toggle="tooltip" title="Action" class="fa fa-wrench"
                                  style="color: darkseagreen"></span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $i=1;  ?>
                    <?php $__currentLoopData = $note_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($row->title); ?></td>
                            <td style="width: 10%; text-align: center;">
                                <a href="<?php echo e(url('/update_test/'.$row->id)); ?>" data-toggle="modal" class="pull-left"
                                   data-target="#myModal<?php echo e($row->id); ?>"
                                   data-toggle="tooltip"
                                   title="Edit Details" style="cursor: pointer;">
                                    <span class="glyphicon glyphicon-edit" style="color: peru"></span>
                                </a>
                                <a href="<?php echo e(url('/delete_test/'.$row->id)); ?>" data-toggle="tooltip"
                                   title="Delete Note" class="delete"
                                   style="cursor: pointer;">
                                    <span class="glyphicon glyphicon-remove" style="color: peru"></span>&nbsp;
                                </a>
                            </td>
                        </tr>

                        <div class="container">
                            <div class="modal fade" id="myModal<?php echo e($row->id); ?>" role="dialog">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <form action="<?php echo e(url('/update_test')); ?>" method="post"><?php echo e(csrf_field()); ?>

                                            <div class="modal-header">
                                                <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Edit Test</h4>
                                            </div>
                                            <div class="modal-body">
                                                <label>Title</label>
                                                <p><input class="form-control" type="text" name="title"
                                                          value="<?php echo e($row->title); ?>"></p>
                                            </div>
                                            <div class="modal-footer" style="text-align:center">
                                                <input type="submit" class="btn btn-success" value="submit">
                                                <input type="hidden" name="id" value="<?php echo e($row->id); ?>">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <form onsubmit="return check()" data-toggle="validator" action="<?php echo e(url('/add_test_post')); ?>"
                      method="post"><?php echo e(csrf_field()); ?>

                    <div class="col-md-6 pull-right">
                        <div class="panel panel-success">
                            <div class="panel-wrapper" aria-expanded="true">
                                <div class="panel-body table-responsive">
                                    <table id="add_test" class="table table-bordered table-responsive">
                                        <tr>
                                            <td style="width:30%">
                                                <div class="row" style="padding-top: 8px;" onclick="add_new_test()"
                                                     id="add_new_test">
                                                    <div class="form-group"
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
                        <div class=" form-group" style="text-align: center;">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('postJquery'); ?>
            add_new_test();
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('postJquery2'); ?>
            <script>
                $(document).ready(function () {
                    $("a.delete").click(function (e) {
                        if (!confirm('Are you sure?')) {
                            e.preventDefault();
                            return false;
                        }
                        return true;
                    });
                });
                var rowTest = 0;
                function check() {
                }
                function add_new_test() {
                    rowTest++;
                    var ttest = '<div id="noteDIV_' + rowTest + '" style="padding: 2px; margin-bottom: 2px">'
                            + '<div class="col-md-12 form-group">'
                            + '<div class="row">'
                            + '<div class="col-md-3 form-group">'
                            + '<p><b>Test Name</b></p>'
                            + '</div>'
                            + '<div class="col-md-8 form-group">'
                            + '<input id="a' + rowTest + '" type="text" name="title[]" class="form-control" required>'
                            + '</div>';
                        if (rowTest != 1) {
                        ttest += '<div class="col-md-1 form-group">'
                                + '<button onclick="delete_row(\'noteDIV_' + rowTest + '\')" class="btn btn-danger btn-rounded pull-right" >X</button>'
                                + '</div>';
                    }


                    ttest += '</div>'
                            + '</div>'
                            + '</div>'
                            + '</div>';
                    $('#add_new_test').before(ttest);
                    //$('#notediv_' + rowNote).summernote();
                }
                function delete_row(rowNo) {
                    $('#' + rowNo).remove();
                }
            </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pos.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>