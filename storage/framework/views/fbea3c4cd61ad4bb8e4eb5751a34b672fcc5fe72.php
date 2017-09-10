<?php $__env->startSection('page_title','Medicine'); ?>
<?php $__env->startSection('page_header','Medicine'); ?>
<?php $__env->startSection('page_breadcrumb'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('home/dashboard')); ?>">Dashboard</a></li>
        <li class="active">Medicine</li>
    </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_content'); ?>
    <?php 
    $bn_digits = array('০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯');
     ?>
    <div class="col-sm-12">
        <div class="white-box">
            <div class="row">
                <div class="col-md-6 form-group">
                    <a href="<?php echo e(url('medicine/add')); ?>">
                        <button class="btn btn-success btn-rounded">
                            <span class="fa fa-plus-circle" style=""></span>Add Medicine
                        </button>
                    </a>
                </div>
                <div class="col-md-6 form-group">
                    <form action="<?php echo e(url('medicine/getExcel')); ?>" method="post" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <input required type="file" name="file" class="col-md-6">
                        <button class="btn btn-info btn-rounded">Add Medicine with excel</button>
                    </form>
                </div>
            </div>
            <hr>
            <?php if(Session::has('message')): ?>
                <div class="alert alert-info"><?php echo e(Session::get('message')); ?></div>
            <?php endif; ?>
            <div class="table-responsive">
                <table id="myTable" class="table color-bordered-table success-bordered-table table-striped  no-footer">
                    <thead>
                    <tr>
                        <th><span data-toggle="tooltip" title="&nbsp;&nbsp;S.L">#</span></th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Power</th>
                        <th>Brand</th>
                        <th style="width: 12%;">Status</th>
                        <th style="text-align: center; width: 10%;">
                            <span data-toggle="tooltip" title="Action" class="fa fa-wrench"
                                  style="color: darkseagreen"></span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $i=1;  ?>
                    <?php $__currentLoopData = $medicine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($p->code); ?></td>
                            <td><?php echo e($p->name); ?></td>
                            <td><?php echo e($p->power); ?></td>
                            <td><?php echo e($p->brand->name); ?></td>
                            <td>
                                <?php
                                if($p->status == 1){ ?>
                                <a href="<?php echo e(url('medicine/status_cahnge/'.$p->id)); ?>" data-toggle="tooltip"
                                   title="Status Change" style="cursor: pointer;">
                                    <span class="label label-success"><?php echo e('Active'); ?></span>
                                </a>
                                <?php }else{?>
                                <a href="<?php echo e(url('medicine/status_cahnge/'.$p->id)); ?>" data-toggle="tooltip"
                                   title="Status Change" style="cursor: pointer;">
                                    <span class="label label-danger"><?php echo e('Block'); ?></span>
                                </a>
                                <?php }
                                ?>
                            </td>
                            <td style="width: 10%; text-align: center;">
                                <a href="<?php echo e(url('medicine/edit/'.$p->id)); ?>" data-toggle="tooltip" title="Edit Info"
                                   style="cursor: pointer;">
                                    <span class="glyphicon glyphicon-edit" style="color: peru"></span>&nbsp;
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--View Product Modal -->
    <div id="product_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header label-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center" id="name" style="color:#fff"></h4>
                </div>
                <div class="modal-body" style="overflow: hidden;">
                    <div id="p_table" class="col-sm-12 col-md-7">
                        <table class="table table-striped table-bordered">

                            <tr>
                                <td style="width: 20%">Code</td>
                                <td>
                                    <span id="code"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>Category</td>
                                <td>
                                    <span id="cat"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Sub Category</td>
                                <td>
                                    <span id="sub_cat"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Unit</td>
                                <td>
                                    <span id="unit"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Buy Price</td>
                                <td>
                                    <span id="buy_price"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Retail Price</td>
                                <td>
                                    <span id="sell_price"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Stock Alert</td>
                                <td>
                                    <span id="dangerAlert"></span>
                                </td>
                            </tr>

                            <tr>
                                <td>Whole Sell Price</td>
                                <td>
                                    <span id="product_discount"></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <img style="width:100%;height: 150px;" id="image" src="" alt="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function show_product(id) {
            $.ajax({
                url: base_url + '/get_product/' + id,
                method: 'get',
                dataType: 'json',
                success: function (result) {
                    $.each(result, function (i, v) {
                        //console.log(v);
                        $('#image').attr('src', base_url + '/public/images/' + v['image']);
                        document.getElementById('code').innerText = v['code'];
                        document.getElementById('name').innerText = v['name'];

                        if (v['cat_id'] == 0) {
                            document.getElementById('cat').innerText = 'Not available';
                        } else {
                            document.getElementById('cat').innerText = v['category']['name'];
                        }
                        if (v['sub_cat_id'] == 0) {
                            document.getElementById('sub_cat').innerText = 'Not available';
                        } else {
                            document.getElementById('sub_cat').innerText = v['sub_category']['name'];
                        }

                        if (v['product_discount'] == null || v['product_discount'] == '') {
                            document.getElementById('product_discount').innerText = 'No Discount';
                        } else {
                            document.getElementById('product_discount').innerText = v['product_discount'];
                        }

                        document.getElementById('unit').innerText = v['units']['name'];
                        document.getElementById('buy_price').innerText = (v['buy_price'] + '') + ' ৳';
                        document.getElementById('sell_price').innerText = (v['sell_price'] + '') + ' ৳';
                        document.getElementById('dangerAlert').innerText = (v['danger_alert_qty'] + '') + ' ' + v['units']['name'];
                    });
                }
            });
            $('#product_modal').modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pos.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>