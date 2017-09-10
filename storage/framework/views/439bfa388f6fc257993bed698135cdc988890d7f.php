<nav class="navbar navbar-default navbar-static-top m-b-0">
    <div class="navbar-header">
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
           data-target=".navbar-collapse">
            <i class="ti-menu"></i>
        </a>
        <div class="top-left-part">
            <a class="logo" href="<?php echo e(url('home/dashboard')); ?>">
                <b>
                    <img style="height: 60px; width:60px;" src="<?php echo e(url('public/images/')); ?>/<?=$company_info[0]->logo;?>" alt="Logo"/>
                </b>
                <span class="hidden-xs">
                   <?=$company_info[0]->title;?>
                    
                </span>
            </a>
        </div>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown"><a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <i
                            class="fa fa-user"></i>&nbsp<b class="hidden-xs"> <?php echo e($reg_info[0]->reg->name); ?></b> </a>
                <ul class="dropdown-menu dropdown-user scale-up">
                    <li><a href="#" data-toggle="modal" data-target="#myModal_view"><i class="ti-user"></i> Profile </a>
                    </li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal_edit"><i class="ti-wallet"></i> Edit profile</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" data-toggle="modal" data-target="#myModal_pass"><i class="ti-settings"></i>Change password</a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo e(url('auth/logout')); ?>"></i>Log-out</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="modal fade" id="myModal_view" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profile</h4>
            </div>
            <div class="modal-body">
                <div>
                    <table class="table table-bordered ">
                        <tr>
                            <td>Name</td>
                            <td><?php echo e($reg_info[0]->reg->name); ?></td>
                        </tr>
                        <tr>
                            <td>Designation</td>
                            <td><?php echo e($reg_info[0]->reg->designation); ?></td>
                        </tr>
                        <tr>
                            <td>Phone</td>
                            <td><?php echo e($reg_info[0]->reg->phone); ?></td>
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
<div class="modal fade" id="myModal_edit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Profile Info</h4>
            </div>
            <form data-toggle="validator" action="<?php echo e(url('home/update_profile_info')); ?>" method="post">
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="name" class="col-md-3 control-label" style="text-align: right">Name</label>
                            <div class="col-md-9">
                                <input name="name" value="<?php echo e($reg_info[0]->reg->name); ?>" type="text"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="name" class="col-md-3 control-label" style="text-align: right">Phone</label>
                            <div class="col-md-9">
                                <input name="phone" value="<?php echo e($reg_info[0]->reg->phone); ?>" type="text"
                                       class="form-control">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="edit_id" value="<?php echo e($reg_info[0]['id']); ?>">
                    <div class=" form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal_pass" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Password Change</h4>
            </div>
            <div class="modal-body">
                <form data-toggle="validator" action="<?php echo e(url('home/update_password')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="name" class="col-md-3 control-label" style="text-align: right">Old password</label>
                            <div class="col-md-9">
                                <input name="old_password" required type="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="name" class="col-md-3 control-label" style="text-align: right">New password</label>
                            <div class="col-md-9">
                                <input name="new_pass" required type="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group col-md-12 col-md-offset-0">
                            <label for="name" class="col-md-3 control-label" style="text-align: right">Repeat password</label>
                            <div class="col-md-9">
                                <input name="new_pass_confirm" required type="password" class="form-control">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="old_pass" value="<?php echo e($reg_info[0]->password); ?>">
                    <input type="hidden" name="reg_id" value="<?php echo e($reg_info[0]->reg_id); ?>">
                    <div class=" form-group" style="text-align: center;">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
