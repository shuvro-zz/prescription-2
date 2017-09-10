<?php $__env->startSection('page_title','Edit Doctor'); ?>
<?php $__env->startSection('page_header','Edit Doctor'); ?>
<?php $__env->startSection('page_breadcrumb'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('home/dashboard')); ?>">Dashboard</a></li>
        <li><a href="<?php echo e(url('doctor/show')); ?>">Doctor</a></li>
        <li class="active">Edit Doctor</li>
    </ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page_content'); ?>
    <div class="col-sm-12">
        <div class="white-box">
            <form data-toggle="validator" enctype="multipart/form-data" action="<?php echo e(url('doctor/update')); ?>"
                  method="post" class="form-material">
                <?php echo e(csrf_field()); ?>


                        <!--name,unit -->
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="name"
                               value="<?php echo e($all_info[0]['name']); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Address</label>
                        <input type="text" class="form-control" name="address" placeholder="address"
                               value="<?php echo e($all_info[0]['address']); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Phone"
                               value="<?php echo e($all_info[0]['phone']); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Age</label>
                        <input type="text" class="form-control" name="age" placeholder="Age"
                               value="<?php echo e($all_info[0]['age']); ?>">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Gender</label>
                        <div>
                            <input type="radio" name="gender" value="1" <?php if($all_info[0]['gender']==1){ echo 'checked';}?>> Male &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="2" <?php if($all_info[0]['gender']==2){ echo 'checked';}?>> Female &nbsp;&nbsp;&nbsp;
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="name" class="control-label">Degree</label>
                        <textarea name="degree" id="degree" rows="5" class="form-control"><?php echo e($all_info[0]['degree']); ?></textarea>
                    </div>
                </div>

                <input type="hidden" name="edit_id" value="<?php echo e($all_info[0]['id']); ?>">

                <div class=" form-group">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pos.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>