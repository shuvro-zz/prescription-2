<?php $__env->startSection('page_title','Edit Medicine'); ?>
<?php $__env->startSection('page_header','Edit Medicine'); ?>
<?php $__env->startSection('page_breadcrumb'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('/')); ?>">Dashboard</a></li>
        <li><a href="<?php echo e(url('medicine/show')); ?>">Medicine</a></li>
        <li class="active">Edit Medicine</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="col-sm-12">
        <div class="white-box">
            <form onsubmit="product_add()" data-toggle="validator" enctype="multipart/form-data"
                  action="<?php echo e(url('medicine/edit_post')); ?>" method="post" class="form-material">
                <input type="hidden" name="p_id" id="p_id" value="<?php echo e($medicine_info[0]->id); ?>">
                <?php echo e(csrf_field()); ?>


                        <!--image-->
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="control-label col-md-3">Image</label>
                        <input type="hidden" id="img_add" name="img_add" value="0">
                        <input onclick="add_image()" type="file" id="input-file-now-custom-1"
                               class="dropify" name="image" data-show-remove="false"
                               data-default-file="<?php echo e(url('public/images/'.$medicine_info[0]->image)); ?>">
                        <span style="color: peru;">Image should be less than 1 mb and png/jpg format.
                        </span>
                        <span id="name_err" style="color: red;"><br>
                            <?php if($errors->has('img')): ?><?php echo e('Image should be less than 1 mb and png/jpg format.'); ?><?php endif; ?>
                        </span>
                    </div>
                </div>

                <!--name,brand -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Name</label>
                        <input onblur="check_text_field('name','name_err')"
                               type="text" required class="form-control"
                               name="name" id="name" placeholder="Name"
                               value="<?php echo e($medicine_info[0]->name); ?>">
                            <span id="name_err" style="color: red;">
                                <?php if($errors->has('name')): ?><?php echo e('Name should be minimum 3 latter'); ?><?php endif; ?>
                        </span>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="dept_id" class="control-label">Brand</label>
                        <select onchange="add_unit()" class="form-control select2" name="unit_id"
                                id="unit_id" required>
                            <option value="0">Choose Brand</option>
                            <?php $__currentLoopData = $brand; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <?php if($medicine_info[0]->brand_id==$u->id): ?>
                                    <option selected value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
                                <?php else: ?>
                                    <option value="<?php echo e($u->id); ?>"><?php echo e($u->name); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </select>
                        <span id="dept_id_err" style="color: red; ">
                             <?php if($errors->has('unit_id')): ?><?php echo e('required'); ?><?php endif; ?>
                        </span>

                    </div>
                </div>
                <!--Power ,-->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="buy_price" class="control-label">Power</label>
                        <input onblur="check_num_field('power','power_err')"
                               onkeyup="check_num_field('power','power_err')"
                               type="text" required class="form-control"
                               name="power" id="power" placeholder="power"
                               value="<?php echo e(str_replace(range(0,9),$bn_digits,$medicine_info[0]->power)); ?>">
                            <span id="buy_price_err" style="color: red;">
                                 <?php if($errors->has('power_eng')): ?><?php echo e('Required'); ?><?php endif; ?>
                            </span>
                    </div>
                </div>

                <div class=" form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="<?php echo e(url('medicine/show')); ?>">
                        <button type="button" class="btn btn-default">Back</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<script>
    //..............on submit function....
    function product_add() {


    }


    function add_image() {
        document.getElementById('img_add').value = 1;
    }
</script>
<?php echo $__env->make('pos.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>