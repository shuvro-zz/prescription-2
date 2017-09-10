<!DOCTYPE html>
<html lang="en">

<head>
    <!--<meta charset="utf-8">-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('public/images/')); ?>/<?=$company_info[0]->logo;?>">
    <title>Prescription Details</title>
</head>
<style>

    .mainTable {
        width: 80%;
        /*border: 1px solid black;*/
    }

    .mainTable .ftable {
        width: 100%;
        margin-bottom: 5px;
        /*border: 1px solid black;*/
    }

    .ftable tr td {
        font-size: 14px;
    }

    .scndtable {
        border: 1px solid black;
        width: 100%;
    }

    .scndtable tr td {
        padding: 2px;
        padding-left: 5px;
    }

    .thrdTble {
        /*border: 1px solid black;*/
        width: 100%;
    }

    .mainTable .thrdTble td {
        border: 1px solid black;
    }

    .mainTable .thrdTble td:last-child {
        border-left: 5px solid blue;
    }

    .lst {
        width: 100%;
    }

    .lst td {
        border: none;
    }
</style>
<body>
<table class="mainTable" align="center" style="padding-top: 70px;">
    <tr>
        <td>
            <table class="ftable">
                <tr>
                    <td style="width:30%;"><?php echo e($prescription[0]->doctor->name); ?></td>
                    <td></td>
                    <td style="width:20%;"><?php echo e($company_info[0]->name); ?></td>
                </tr>
                <tr>
                    <td><?php echo e($prescription[0]->doctor->degree); ?></td>
                    <td></td>
                    <td><?php echo e($company_info[0]->address); ?></td>
                </tr>
                <tr>
                    <td><?php echo e($prescription[0]->doctor->phone); ?></td>
                    <td></td>
                    <td><?php echo e($company_info[0]->contact); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="scndtable">
                <tr>
                    <td style="">Reg No : <?php echo e($prescription[0]->code); ?></td>
                    <td style="width: 25%">Date : <?php echo e(explode(' ',$prescription[0]->created_at)[0]); ?></td>
                </tr>
                <tr>
                    <td>Patient Name : <?php echo e($prescription[0]->client->name); ?></td>
                    <td>Patient Age : <?php echo e($prescription[0]->client->age); ?> years</td>
                </tr>
                <tr>
                    <td>Patient Phone : <?php echo e($prescription[0]->client->phone); ?></td>
                    <td>Patient Gender :
                        <?php if($prescription[0]->client->gender==1): ?>
                            <?php echo e('Male'); ?>

                        <?php elseif($prescription[0]->client->gender==2): ?>
                            <?php echo e('Female'); ?>

                        <?php else: ?>
                            <?php echo e($prescription[0]->client->gender); ?>

                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table class="thrdTble" cellspacing="0px;">
                <tr>
                    <td style="padding-top:8px;" width="30%;">
                        <label for=""><span style=""><b style="padding-top: 10px">Notes:</b></span></label>
                        <?php $__currentLoopData = $prescription[0]->note_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <p style="padding-top: 8px"><?=$n->details?></p>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        <label for=""><span style="font-weight: 700; font-size: 14px;"><b>Tests:</b></span></label>

                        <p style="padding-left: 500px !important;">
                            <?php
                            foreach ($prescription[0]->Test_lists as $key => $kc){ ?>
                                &nbsp;&nbsp;&nbsp;&nbsp;<?php echo e($key+1); ?>. <?php echo e($kc->hasTest->title); ?><br>
                            <?php }
                            ?>
                        </p>

                    </td>
                    <td style="padding-left: 8px; padding-top: 8px;">
                        <p>Rx,</p>
                        <br>
                        <table class="lst">
                            <?php $__currentLoopData = $prescription[0]->medicini_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td style="padding-left:25px">
                                        <?php echo e($m->medicine->name.'-'.$m->medicine->power); ?>

                                        <br>
                                        <?php echo e($m->duration); ?>


                                    </td>
                                    <td>
                                        <?php echo e($m->medicine_taken); ?>

                                        <br>
                                        <?php if($m->before_meal==1): ?>
                                            <?php echo e('Before Meal'); ?>

                                        <?php elseif($m->before_meal==2): ?>
                                            <?php echo e('After Meal'); ?>

                                        <?php else: ?>
                                            <?php echo e($m->before_meal==1); ?>

                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="padding-left:25px;">
                                        <?php echo e($m->comment); ?>

                                    </td>
                                    <br>
                                    <br>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td colspan="2"><b>Known Case:</b></td>
                            </tr>
                            <?php $__currentLoopData = $prescription[0]->known_case_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kc): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td style="padding-left: 15px;"><b><?php echo e($kc->hasknownCase->title); ?></b></td>
                                </tr>
                                <tr>
                                    <td style="padding-left: 30px;"><?=$kc->hasknownCase->detail?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td colspan="2" style="padding-left:25px;">
                                    <br>
                                    <br>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>