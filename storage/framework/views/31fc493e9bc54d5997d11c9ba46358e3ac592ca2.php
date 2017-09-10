<?php $__env->startSection('page_title','Prescription Details'); ?>
<?php $__env->startSection('page_header','Prescription Details'); ?>
<?php $__env->startSection('page_breadcrumb'); ?>
    <ol class="breadcrumb">
        <li><a href="<?php echo e(url('home/dashboard')); ?>">Dashboard</a></li>
        <li><a href="<?php echo e(url('prescription/show')); ?>">Prescription List</a></li>
        <li class="active">Prescription Details</li>
    </ol>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('prescription_style'); ?>

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
    <div class="col-sm-12" id="targetDIV">
        <div class="white-box">
            <div class="row">
                <p class="pull-right"><a href="<?php echo e(url('prescription/pdf/'.$prescription[0]->id)); ?>"
                                         style="padding-right: 25px; font-size: 20px; cursor: pointer"
                                         data-toggle="tooltip" title="print"><span
                                class="glyphicon glyphicon-print"></span></a></p>
            </div>
            <div class="table-responsive">
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

            <div class="table-responsive">
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

            <div style="margin-top: 10px;">
                <div class="row prsDIV">

                    <div class="col-md-5 form-group">
                        <label for=""><span style="font-weight: 700; font-size: 14px;">Notes:</span></label>
                        <div class="row" style="padding-left: 25px;">
                        <?php $__currentLoopData = $prescription[0]->note_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>

                                <p><?=$n->details?></p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <label for=""><span style="font-weight: 700; font-size: 14px;">Tests:</span></label>
                        <div class="">
                            <?php
                            foreach ($prescription[0]->Test_lists as $key => $kc){ ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;<?php echo e($key+1); ?>. <?php echo e($kc->hasTest->title); ?><br>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <div class="col-md-7 medicine form-group">
                        <div class="row" style="padding-left: 25px;"><p style="font-size: 16px;">Rx,</p></div>
                        <?php $__currentLoopData = $prescription[0]->medicini_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div style="margin-bottom: 8px;">
                                <div class="row" style="padding-left: 30px; margin-bottom: 2px;">
                                    <div class="col-md-8 form-group" style="margin-bottom: 2px;">
                                        <?php echo e($m->medicine->name.'-'.$m->medicine->power); ?>

                                    </div>
                                    <div class="col-md-4 form-group" style="margin-bottom: 2px;">
                                        <?php echo e($m->duration); ?>

                                    </div>
                                </div>
                                <div class="row" style="padding-left: 30px;">
                                    <div class="col-md-8" style="margin-bottom: 2px;">
                                        <?php echo e($m->medicine_taken); ?>

                                    </div>
                                    <div class="col-md-4" style="margin-bottom: 2px;">
                                        <?php if($m->before_meal==1): ?>
                                            <?php echo e('Before Meal'); ?>

                                        <?php elseif($m->before_meal==2): ?>
                                            <?php echo e('After Meal'); ?>

                                        <?php else: ?>
                                            <?php echo e($m->before_meal==1); ?>

                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row" style="padding-left: 30px;">
                                    <div class="col-md-12">
                                        <?php echo e($m->comment); ?>

                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <div class="row" style="padding-left: 20px; margin-top: 25px;">
                            <div class="form-group col-md-12">
                                <label for=""><span
                                            style="font-weight: 700; font-size: 14px;">Known Case:</span></label>
                                <div class="">
                                    <?php
                                    foreach ($prescription[0]->known_case_list as $key => $kc){ ?>
                                    <label style="padding-left: 8px;"><?php echo e($kc->hasknownCase->title); ?></label>
                                    <p style="padding-left: 15px;"><?=$kc->hasknownCase->detail?></p>
                                    <?php }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('postJquery6'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('pos.layout.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>