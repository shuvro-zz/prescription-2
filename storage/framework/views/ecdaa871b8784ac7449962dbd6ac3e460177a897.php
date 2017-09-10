<?php $__env->startSection('page_title','Prescription'); ?>
<?php $__env->startSection('page_header','Prescription'); ?>
<?php $__env->startSection('page_breadcrumb'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('home/dashboard')); ?>">Dashboard</a></li>
        <li class="active">Prescription List</li>
    </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_content'); ?>    
    <div class="col-sm-12">
        <div class="white-box">
            <div>
                <a href="<?php echo e(url('prescription/add')); ?>">
                    <button class="btn btn-success btn-rounded">
                        <span class="fa fa-plus-circle" style=""></span> New Prescription
                    </button>
                </a>
            </div>
            <hr>
            <div class="table-responsive">
                <table id="myTable" class="table color-bordered-table success-bordered-table table-striped  no-footer">
                    <thead>
                    <tr>
                        <th><span data-toggle="tooltip" title="&nbsp;&nbsp;S.L">#</span></th>
                        <th>Date</th>
                        <th>Code</th>
                        <th>Patient</th>
                        <th>Phone</th>
                        <th>Age</th>
                        <th style="text-align: center; width: 10%;">
                            <span data-toggle="tooltip" title="Action" class="fa fa-wrench"
                                  style="color: darkseagreen"></span>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  $i=1;  ?>
                    <?php $__currentLoopData = $prescription; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e(explode(' ',$p->created_at)[0]); ?></td>
                            <td><?php echo e($p->code); ?></td>
                            <td><a href="<?php echo e(url('patient/details/'.$p->client->id)); ?>"><?php echo e($p->client->name); ?></a></td>
                            <td><?php echo e($p->client->phone); ?></td>
                            <td><?php echo e($p->client->age); ?></td>
                            <td style="width: 10%; text-align: center;">
                                <a href="<?php echo e(url('prescription/details/'.$p->id)); ?>" data-toggle="tooltip" title="View Details"
                                   style="cursor: pointer;">
                                    <span class="glyphicon glyphicon-eye-open" style="color: peru"></span>&nbsp;
                                </a>
                                <a href="<?php echo e(url('prescription/edit_data/'.$p->id)); ?>" data-toggle="tooltip" title="Edit Info"
                                   style="cursor: pointer;">
                                    <span class="glyphicon glyphicon-edit" style="color: peru"></span>&nbsp;
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                </table>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <!--View Product Modal -->
    <div id="product_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header label-success">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center">Product All Info</h4>
                </div>
                <div class="modal-body">
                    <div id="p_table">
                        <table class="table table-striped table-bordered" >
                            <tr>
                                <td colspan="2">
                                    <img style="height: 150px;" id="image" src="" alt="">
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 20%">Code</td>
                                <td>
                                    <span id="code"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>
                                    <span id="name"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>
                                    <span id="cat"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Sub-category</td>
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
                                <td>Purchase price</td>
                                <td>
                                    <span id="buy_price"></span>
                                </td>
                            </tr>
                            <tr>
                                <td>Sell price</td>
                                <td>
                                    <span id="sell_price"></span>
                                </td>
                            </tr>
                        </table>
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
                url:base_url+'/get_product/'+id,
                method:'get',
                dataType:'json',
                success:function (result) {
                    $.each(result,function (i,v) {
                        //console.log(v);
                        $('#image').attr('src',base_url+'/public/images/'+v['image']);
                        document.getElementById('code').innerText=v['code'];
                        document.getElementById('name').innerText=v['name'];
                        if(v['cat_id']==0){
                            document.getElementById('cat').innerText='Not available';
                        }else{
                            document.getElementById('cat').innerText=v['category']['name'];
                        }
                        if(v['sub_cat_id']==0){
                            document.getElementById('sub_cat').innerText='Not available';
                        }else{
                            document.getElementById('sub_cat').innerText=v['sub_category']['name'];
                        }

                        document.getElementById('unit').innerText=v['units']['name'];
                        document.getElementById('buy_price').innerText=(v['buy_price']+'').getDigitBanglaFromEnglish()+' &#x9f3';
                        document.getElementById('sell_price').innerText=(v['sell_price']+'').getDigitBanglaFromEnglish()+' &#x9f3';
                    });
                }
            });
            $('#product_modal').modal('show');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('pos.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>